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

class User:
    def __unicode__(self):
        return self.username
    
    # contructor
    def __init__(self, username, password):
        self.username = username
        self.password = password
        
    # equality test  
    def __eq__(self, other) : 
        return self.username == other.username
    
    def create(self):
        # check if the user does not already exist
        if self.username in User.retrieve_all():
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
        if self.username in User.retrieve_all():
            # change directory to the password file
            os.chdir(settings.INSTALL_DIR + '/data')
            # Apache tool to create an user
            subprocess.Popen(settings.INSTALL_DIR + '/apache/bin/htpasswd.exe -b passwdfile ' + self.username + ' ' + self.password)
        else:
            raise Exception(self.username + " does not exist")
    
    # delete the user
    def delete(self):
        if self.username in User.retrieve_all():
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
                if self.username in user_list:
                    # remove the user
                    repository.remove_user(self.username)
            
        else:
            raise Exception(self.username + " does not exist")
        
    @staticmethod    
    def retrieve_all():
        password_file_path = settings.INSTALL_DIR + '/data/passwdfile'
        users_name = []
        
        # check if the file exist
        if os.path.isfile(password_file_path):
            # the file exist
            # open password file
            password_file = open(password_file_path,"r")
            # read the users
            users_name = map(lambda foo: foo.split(':')[0], password_file)
            password_file.close()
        else:
            # the file does not exist : no users
            users_name = []

        return users_name
        
        

class Repository:
    def __unicode__(self):
        return self.name
    
    # contructor
    def __init__(self, name):
        self.name = name
    
    # equality test  
    def __eq__(self, other) : 
        return self.name == other.name
        
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
        all_users = []
        try:
            # retrieve all the users
            repo_config = open(settings.INSTALL_DIR + '/apache/conf/gitstack/' + self.name + ".conf","r")
            user_line_matcher = re.compile('Require user ')
            for line in repo_config:
                # Try to match the line
                match = user_line_matcher.search(line)
                # if the user line is found
                if match:
                    # print all the users
                    all_users_str = line[match.end():].rstrip()
                    # if no users
                    if(len(all_users_str) == 0):
                        # return an empty list
                        return all_users
                    
                    all_users = all_users_str.split(' ')
            

                      
            repo_config.close()

        except IOError:
            # No users
            pass
        
        return all_users


    
    # Add read and write permissions to a user on the repository
    def add_user(self, username):
        # where the config file for this repo will be stored
        config_file_path = settings.INSTALL_DIR + '/apache/conf/gitstack/' + self.name + ".conf"
        # If file does not exist
        if not os.path.exists(config_file_path):
            # Create the configuration file
            self.create_config_file()
            
        # if the file exist
        # open the file
        repo_config_old = open(config_file_path,"r")
        repo_config = open(config_file_path + ".tmp","a")
        # set up the patterns
        # user line matcher
        user_line_matcher = re.compile('Require user ')
        for line in repo_config_old:
            # Try to match the line
            match = user_line_matcher.search(line)
            # if the user line is found
            if match:
                # add the new user to the line
                repo_config.write(line.rstrip() + ' ' + username + '\n')
            else:
                repo_config.write(line)
        repo_config.close()
        repo_config_old.close()
        # replace old config by new config
        os.remove(config_file_path)
        os.rename(config_file_path + ".tmp", config_file_path)
                    

        # restart apache
        Apache.restart()
    
    # remove the read/write access to an user
    def remove_user(self, username):
        config_file_path = settings.INSTALL_DIR + '/apache/conf/gitstack/' + self.name + ".conf"
        try:
            # Check the number of users
            all_users = self.retrieve_all_users()
            
            # delete the file
            os.remove(config_file_path)
            # remove the user in the list
            all_users.remove(username)
            if(len(all_users) > 0):
                # add the users again
                for user in all_users:
                    self.add_user(user)
            else:
                # just create an config file without users
                self.add_user('')
            Apache.restart()
            
        except IOError as e:
            print 'Error ' + e.strerror
    
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
        self.create_config_file()
        
        Apache.restart()
        
    # create an apache configuration file
    def create_config_file(self):
        config_file_path = settings.INSTALL_DIR + '/apache/conf/gitstack/' + self.name + ".conf"
        repo_config = open(config_file_path,"a")
        template_repo_config = open(settings.INSTALL_DIR + '/app/gitstack/config_template/repository_template.conf',"r")
        # for each line try to replace username or location
        for line in template_repo_config:
            # replace username
            line = line.replace("USER_NAME","")
            # replace repository name
            line = line.replace("REPO_NAME",self.name)
            #password file path
            line = line.replace("PASSFILE_PATH",settings.INSTALL_DIR + '/data/passwdfile')
            # write the new config file
            repo_config.write(line)
    
        # close the files
        repo_config.close()
        template_repo_config.close()
       
