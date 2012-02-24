import subprocess, ConfigParser, logging, shutil, re, os, ctypes
from django.conf import settings

logger = logging.getLogger('console')

# performs operations on apache
class Apache:
    @staticmethod
    def restart():
        # http://code.google.com/p/modwsgi/wiki/ReloadingSourceCode#Restarting_Windows_Apache
        try:
            # when is running unser mod_wsgi
            ctypes.windll.libhttpd.ap_signal_parent(1)
        except:
            # when running on django development server
            subprocess.Popen(settings.INSTALL_DIR + '/apache/bin/httpd.exe -n "GitStack" -k restart')

class ApacheConfigParser:
    def __init__(self, repo_name):
        self.repo_name = repo_name
        self.user_list = []
        self.user_read_list = []
        self.user_write_list = []
        
    # retrieve users from config file
    def load_users(self):
        try:
            # setup config gile
            repo_config = open(settings.INSTALL_DIR + '/apache/conf/gitstack/' + self.repo_name + ".conf","r")
            added_line_matcher = re.compile('# Added user list : ')
            read_line_matcher = re.compile('# read user list : ')
            write_line_matcher = re.compile('# write user list : ')
            
            # for each line
            for line in repo_config:
                # Try to match the line
                added_match = added_line_matcher.search(line)
                read_match = read_line_matcher.search(line)
                write_match = write_line_matcher.search(line)
                # if there is a match
                if added_match or read_match or write_match:
                    # read the user string list
                    if added_match:
                        match = added_match
                    if read_match:
                        match = read_match
                    if write_match:
                        match = write_match
                    
                    all_users_str = line[match.end():].rstrip()
                    all_users_obj = []
                    # if no users
                    if(len(all_users_str) > 0):
                        all_users = all_users_str.split(' ')
                        # for each user, create a user object
                        for username in all_users:
                            user = User(username)
                            all_users_obj.append(user)
                    # depending on the match, the add user list to the correct user list (added, read or write)
                    # read the user string list
                    if added_match:
                        self.user_list = all_users_obj
                    if read_match:
                        self.user_read_list = all_users_obj
                    if write_match:
                        self.user_write_list = all_users_obj
                
        except IOError:
            pass
            #raise Exception("Could not load the configuration file")    
    
    
    
class User:
    def __unicode__(self):
        return self.username
    
    # contructor
    def __init__(self, username, password=""):
        self.username = username
        self.password = password
        
    # equality test  
    def __eq__(self, other) : 
        return self.username == other.username
      
    def __hash__(self) : 
        return hash(self.username)
    
    # representation in a list
    def __repr__(self):
        return self.__unicode__()
    
    def create(self):
        # check if the user does not already exist
        if self in User.retrieve_all():
            raise Exception("User already exist")
        # if there are no users, create a file
        if len(User.retrieve_all()) == 0:
            passord_file = open(settings.INSTALL_DIR + '/data/passwdfile', 'w')
            passord_file.write('')
            passord_file.close()
            pass
        # change directory to the password file
        os.chdir(settings.INSTALL_DIR + '/data')
        # Apache tool to create an user
        subprocess.Popen(settings.INSTALL_DIR + '/apache/bin/htpasswd.exe -b passwdfile ' + self.username + ' ' + self.password)
        
    # update user's password
    def update(self):
        if self in User.retrieve_all():
            # change directory to the password file
            os.chdir(settings.INSTALL_DIR + '/data')
            # Apache tool to create an user
            subprocess.Popen(settings.INSTALL_DIR + '/apache/bin/htpasswd.exe -b passwdfile ' + self.username + ' ' + self.password)
        else:
            raise Exception(self.username + " does not exist")
    
    # delete the user
    def delete(self):
        if self in User.retrieve_all():
            # change directory to the password file
            os.chdir(settings.INSTALL_DIR + '/data')
            # Apache tool to delete an user
            subprocess.Popen(settings.INSTALL_DIR + '/apache/bin/htpasswd.exe -D passwdfile ' + self.username)
            # Remove the user on each repository
            repository_list = Repository.retrieve_all()
            # for each repo
            for repository in repository_list:
                # get all the users
                user_list = repository.retrieve_all_users()

                # if the user exist in the repo
                if self in user_list:
                    # remove the user
                    repository.remove_user(self)
                    repository.save()
            
        else:
            raise Exception(self.username + " does not exist")
        
    @staticmethod    
    def retrieve_all():
        password_file_path = settings.INSTALL_DIR + '/data/passwdfile'
        all_users = []
        user_list_obj = []
                 
        # check if the file exist
        if os.path.isfile(password_file_path):
            # the file exist
            # open password file
            password_file = open(password_file_path,"r")
            # read the users
            all_users = map(lambda foo: foo.split(':')[0], password_file)
            password_file.close()
        else:
            # the file does not exist : no users
            all_users = []
            
        # for each user, create a user object
        for username in all_users:
            user = User(username)
            user_list_obj.append(user)

        # add the user "everyone"
        everyone = User("everyone")
        user_list_obj.append(everyone)
        return user_list_obj
        
        

class Repository:
    def __unicode__(self):
        return self.name
    
    # contructor
    def __init__(self, name):
        # repo name
        self.name = name
        # user list
        self.user_list = []
        # users with read permission
        self.user_read_list = []
        # users with write permission
        self.user_write_list = []
        
        self.load()
    
    # equality test  
    def __eq__(self, other) : 
        return self.name == other.name
    
    # representation in a list
    def __repr__(self):
        return self.__unicode__()
    
    # load a repository from an apache configuration file
    def load(self):
        parser = ApacheConfigParser(self.name)
        parser.load_users()
        # retrieve the list of users
        self.user_list = parser.user_list
        self.user_read_list = parser.user_read_list
        self.user_write_list = parser.user_write_list
               
    
    # save the repository in an apache configuration file
    def save(self):
        # add info to the file
        config_file_path = settings.INSTALL_DIR + '/apache/conf/gitstack/' + self.name + ".conf"
        # remove the old configuration file
        if os.path.isfile(config_file_path):
            os.remove(config_file_path)
        
        repo_config = open(config_file_path,"a")
        template_repo_config = open(settings.INSTALL_DIR + '/app/gitstack/config_template/repository_template.conf',"r")
        # create a list of users
        str_user_read_list = ''
        str_user_write_list = ''
        str_user_list = ''

        for u in self.user_read_list:
            str_user_read_list = str_user_read_list + u.username + ' '
        for u in self.user_write_list:
            str_user_write_list = str_user_write_list + u.username + ' '
        for u in self.user_list:
            str_user_list = str_user_list + u.username + ' '
            
        # get the user everyone
        everyone = User("everyone")
            
        # for each line try to replace username or location
        for line in template_repo_config:
            # add the list of users
            # replace username   
            line = line.replace("ALL_USER_LIST",str_user_list)         
            line = line.replace("READ_USER_LIST",str_user_read_list)
            line = line.replace("WRITE_USER_LIST",str_user_write_list)
            
            if everyone in self.user_read_list:
                line = line.replace("READ_PERMISSIONS","Allow from All")
            else:
                line = line.replace("READ_PERMISSIONS","Require user " + str_user_read_list)
            
            if everyone in self.user_write_list:
                line = line.replace("WRITE_PERMISSIONS","Allow from All")
            else:
                line = line.replace("WRITE_PERMISSIONS","Require user " + str_user_write_list)
        
            # replace repository name
            line = line.replace("REPO_NAME",self.name)
            #password file path
            line = line.replace("PASSFILE_PATH",settings.INSTALL_DIR + '/data/passwdfile')
            # write the new config file
            repo_config.write(line)
    
        # close the files
        repo_config.close()
        template_repo_config.close()
        
        # restart apache
        Apache.restart()
        
    @staticmethod     
    def retrieve_all():
        # change to the repository directory
        str_repository_list = os.listdir(settings.REPOSITORIES_PATH)
        repository_list = []
        for str_repository in str_repository_list:
            repository_list.append(Repository(str_repository.replace('.git', '')))
        return repository_list
    
    # retrieve all the users of the repository
    def retrieve_all_users(self):
        # add the read and the write users
        all_users = self.user_read_list + self.user_write_list
        # remove the duplicates
        all_users = list(set(all_users))

        return all_users

    # Add the user to the repo without any read and write permission
    def add_user(self, user):
        self.user_list.append(user)

    # Add read permissions to a user on the repository
    def add_user_read(self, user):
        # check if the user is already in the user list
        if user in self.user_list:
            # if user is not already added
            if user not in self.user_read_list:
                self.user_read_list.append(user)
            else:
                raise Exception(user.username + " has already read permissions on " + self.name)

        else:
            raise Exception(user.username + " has to be added in the repository before setting read/write permissions")
        
    
    # Add write permissions to a user on the repository
    def add_user_write(self, user):
        # check if the user is already in the user list
        if user in self.user_list:
            # if user is not already added
            if user not in self.user_write_list:
                self.user_write_list.append(user)
            else:
                raise Exception(user.username + " has already write permissions on " + self.name)
        else:
            raise Exception(user.username + " has to be added in the repository before setting read/write permissions")
        
    # remove the read/write access to an user
    def remove_user(self, user):
        self.remove_user_read(user)
        self.remove_user_write(user)
        self.user_list.remove(user)

    # remove the read access to an user
    def remove_user_read(self, user):
        if user in self.user_read_list:
            self.user_read_list.remove(user)
        
    # remove the read access to an user
    def remove_user_write(self, user):
        if user in self.user_write_list:
            self.user_write_list.remove(user)
        
    
    
    
    # delete the repository
    def delete(self):
            
        is_exist = False
        repo_list = Repository.retrieve_all()
        # for each element of the list check if the repo exist
        for repo in repo_list:
            if(repo.__unicode__() == self.name):
                is_exist = True

        if is_exist:
            fullname = self.name + '.git'
            # change directory to anywhere
            os.chdir(settings.INSTALL_DIR)
            shutil.rmtree(settings.REPOSITORIES_PATH + '/' + fullname)
            
            # remove the configuration file if exist
            try:
                os.remove(settings.INSTALL_DIR + '/apache/conf/gitstack/' + self.name + ".conf")
            except Exception:
                pass
        else:
            raise Exception(self.name + " does not exist")
        
        
    # create the repository
    def create(self):
        # create the repo
        # change to the repository directory
        os.chdir(settings.REPOSITORIES_PATH)
        # Check if a repo already exsit
        if os.path.isdir(self.name + ".git") :
            raise Exception("Repository already exist")
        # create a bare repo
        subprocess.Popen(settings.GIT_PATH + " --bare init --shared " + self.name + ".git", shell=True).wait()
        
        # change directory to the git project
        os.chdir(settings.REPOSITORIES_PATH + "/" + self.name + ".git")
        # open source and destination
        new_config_file = open("output","a") 
        old_config_file = open("config","r")
        # for each line remove the tabular
        for line in old_config_file:
            line = line.replace("\t","")
            new_config_file.write(line)
        # close files
        new_config_file.close()
        old_config_file.close()
        # replace old config by new config
        os.remove("config")
        os.rename("output", "config")
        
        # add retrieve_all the rights to anonymous users
        config = ConfigParser.ConfigParser()
        config.read("config")
        config.add_section("http")
        config.set('http', 'receivepack', 'true')
        
        f = open("config", "w")
        config.write(f)
        f.close()
        
        # change to another directory
        os.chdir(settings.INSTALL_DIR)
        
        # Create an apache config file for the repository
        self.save()
        
     
