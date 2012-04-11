import subprocess, ConfigParser, logging, shutil, os, ctypes, stat
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

class RepoConfigParser:
    def __init__(self, repo_name):
        self.repo_name = repo_name
        self.user_list = []
        self.user_read_list = []
        self.user_write_list = []
        self.group_list = []
        self.group_read_list = []
        self.group_write_list = []
        
        
    # convert a list of string usernames into a list of user objects
    def str_users_list_to_obj(self, str_u_list):
        obj_u_list = []
        # check the length of the list
        if(len(str_u_list) > 0):
            # split the list
            all_users = str_u_list.split(' ')
            # create users
            for username in all_users:
                user = User(username)
                obj_u_list.append(user)
        
        # return the list of users
        return obj_u_list
    
    # convert a list of string groupnames into a list of group objects
    def str_group_list_to_obj(self, str_g_list):
        obj_g_list = []
        # check the length of the list
        if(len(str_g_list) > 0):
            # split the list
            all_groups = str_g_list.split(' ')
            # create users
            for name in all_groups:
                group = Group(name)
                obj_g_list.append(group)
        
        # return the list of users
        return obj_g_list
        
    # retrieve users from config file
    def load_users_groups(self):
        try:
            # Load the configuration file
            config = ConfigParser.ConfigParser()
            config.read(settings.REPOSITORIES_PATH + "/" + self.repo_name + ".git" + "/config")
            # load the users
            if config.has_section('gitstack'):
                self.user_read_list = self.str_users_list_to_obj(config.get('gitstack', 'readusers'))
                self.user_write_list = self.str_users_list_to_obj(config.get('gitstack', 'writeusers'))
                self.user_list = self.str_users_list_to_obj(config.get('gitstack', 'addedusers'))
                # TODO: check when there is not theses groups
                if config.has_option('gitstack', 'readgroups'):
                    self.group_read_list = self.str_group_list_to_obj(config.get('gitstack', 'readgroups'))
                if config.has_option('gitstack', 'writegroups'):
                    self.group_write_list = self.str_group_list_to_obj(config.get('gitstack', 'writegroups'))
                if config.has_option('gitstack', 'addedgroups'):
                    self.group_list = self.str_group_list_to_obj(config.get('gitstack', 'addedgroups'))

            # split each string list of username
                
        except IOError:
            pass
            #raise Exception("Could not load the configuration file")    
    
    # remove config file tabulation (make it compatible to python)
    def remove_tabs(self):
        # open source and destination
        repo_dir = settings.REPOSITORIES_PATH + "/" + self.repo_name + ".git/"
        new_config_file = open(repo_dir + "output","a") 
        old_config_file = open(repo_dir + "config","r")
        # for each line remove the tabular
        for line in old_config_file:
            line = line.replace("\t","")
            new_config_file.write(line)
        # close files
        new_config_file.close()
        old_config_file.close()
        # replace old config by new config
        os.remove(repo_dir + "config")
        os.rename(repo_dir + "output", repo_dir + "config")
        # change to another directory
        os.chdir(settings.INSTALL_DIR)
    
    
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
        if len(User.retrieve_all()) == 1:
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
                    
            # for each group
            all_groups = Group.retrieve_all()
            for group in all_groups:
                # remove the user
                logger.debug(group)
                group.remove_user(self)
                group.save()
            
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

        # add the iser everyone
        everyone = User("everyone")
        user_list_obj.append(everyone)
        return user_list_obj

# Group of users        
class Group:
    # contructor
    def __init__(self, name):
        # repo name
        self.name = name
        # member list
        self.member_list = []
        
    def __unicode__(self):
        return self.name      
        
    # representation in a list
    def __repr__(self):
        return self.__unicode__()
    
    # equality test  
    def __eq__(self, other) : 
        return self.name == other.name
      
    def __hash__(self) : 
        return hash(self.name)
    
    # load member list
    def load(self):
        # check that a groupfile  exist 
        if not os.path.isfile(settings.GROUP_FILE_PATH):
            # create an empty group file
            group_file = open(settings.GROUP_FILE_PATH, 'w')
            group_file.write('')
            group_file.close()
        
        # open the group file
        group_file = open(settings.GROUP_FILE_PATH, 'r')
        # for each line
        for line in group_file:
            # get the group name 
            group_name, user_list_str = line.split(': ')
            # if the group name is the same as the current group
            if group_name == self.name:
                # extract the users
                # trim the list
                user_list_str = user_list_str.strip()
                # split the list of users
                user_list_str = user_list_str.split(' ')
                for str_user in user_list_str:
                    if not str_user == '':
                        # create the user
                        user = User(str_user)
                        # add the user to the group
                        self.member_list.append(user)
                    
    # save the group
    def save(self):
        # read open the groupfile
        group_file = open(settings.GROUP_FILE_PATH, 'r')
        # write on the groupfilenew
        group_file_new = open(settings.GROUP_FILE_PATH + 'new', 'w')
        
        # for each line of the groupfile
        for line in group_file:
            # get the group name
            group_name = line.split(': ')[0]
            # if it is the current group
            if group_name == self.name:
                # write current group info in the groupfilenew
                group_file_new.write(self.name + ': ')
                # for each member
                for user in self.member_list:
                    group_file_new.write(user.username + ' ')
                group_file_new.write('\n')
            # else
            else:
                # copy the line on the groupfilenew
                group_file_new.write(line)
        
        # close both files
        group_file.close()
        group_file_new.close()
        
        # remove the groupfile
        if os.path.isfile(settings.GROUP_FILE_PATH):
            os.remove(settings.GROUP_FILE_PATH)
        
        # rename the groupfilenew to groupfile
        os.rename(settings.GROUP_FILE_PATH + 'new', settings.GROUP_FILE_PATH)    
    # create a new group
    def create(self):
        # check if the group does not already exist
        if self in Group.retrieve_all():
            raise Exception("Group already exist")
        
        # add a new line with the group name to the file
        group_file = open(settings.GROUP_FILE_PATH, 'a')
        # end by a line break
        group_file.write(self.name + ": \n")
        group_file.close()
        
    # delete a group
    def delete(self):
        # remove the group from each repository
        repository_list = Repository.retrieve_all()
        # for each repo
        for repository in repository_list:
            # get all the users
            group_list = repository.retrieve_all_groups()

            # if the group exist in the repo
            if self in group_list:
                # remove the group
                repository.remove_group(self)
                repository.save()
        
        # read open the groupfile
        group_file = open(settings.GROUP_FILE_PATH, 'r')
        # write on the groupfilenew
        group_file_new = open(settings.GROUP_FILE_PATH + 'new', 'w')
        
        # for each line of the groupfile
        for line in group_file:
            # get the group name
            group_name = line.split(': ')[0]
            # if it is the current group
            if not group_name == self.name:
                # copy the line on the groupfilenew
                group_file_new.write(line)
        
        # close both files
        group_file.close()
        group_file_new.close()
        
        # remove the groupfile
        if os.path.isfile(settings.GROUP_FILE_PATH):
            os.remove(settings.GROUP_FILE_PATH)
        
        # rename the groupfilenew to groupfile
        os.rename(settings.GROUP_FILE_PATH + 'new', settings.GROUP_FILE_PATH)    
        
        
    # add a user to the group
    def add_user(self, user):
        self.member_list.append(user)
        
    # remove a user from the group
    def remove_user(self, user):
        if user in self.member_list:
            self.member_list.remove(user)
        
    @staticmethod    
    def retrieve_all():
        group_list_obj = []
                 
        # check if the file exist
        if os.path.isfile(settings.GROUP_FILE_PATH):
            # the file exist
            # open group file
            group_file = open(settings.GROUP_FILE_PATH,"r")
            # read the groups names
            # for each line
            for line in group_file:
                # get the group name 
                group_name = line.split(': ')[0]
                # create a group object
                group = Group(group_name)
                # load the group
                group.load()
                group_list_obj.append(group)
                   
            group_file.close()
      
        return group_list_obj

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
        # group list
        self.group_list = []
        # user list
        self.group_read_list = []
        # write list
        self.group_write_list = []

        # bared repository (false if not imported in GitStack)
        # check if the repo is bared or not
        if os.path.isdir(settings.REPOSITORIES_PATH + "/" + self.name + ".git"):
            self.bare = True
        else:
            self.bare = False
            
        # Check that a folder for the repositories configuration files exist
        config_folder_path = settings.INSTALL_DIR + '/apache/conf/gitstack/repositories'
        if not os.path.exists(config_folder_path):
            # create a directory for the configuration files
            os.makedirs(config_folder_path) 
           
        self.load()
    
    # equality test  
    def __eq__(self, other) : 
        return self.name == other.name
    
    # representation in a list
    def __repr__(self):
        return self.__unicode__()
    
    # load a repository from an apache configuration file
    def load(self):
        parser = RepoConfigParser(self.name)
        parser.load_users_groups()
        # retrieve the list of users
        self.user_list = parser.user_list
        self.user_read_list = parser.user_read_list
        self.user_write_list = parser.user_write_list  
        self.group_list = parser.group_list
        self.group_read_list = parser.group_read_list
        self.group_write_list = parser.group_write_list   
    
    # save the repository in an apache configuration file
    def save(self):
        # add info to the file
        config_file_path = settings.INSTALL_DIR + '/apache/conf/gitstack/repositories/' + self.name + ".conf"
        # remove the old configuration file
        if os.path.isfile(config_file_path):
            os.remove(config_file_path)
        
        repo_config = open(config_file_path,"a")
        
        # check if it is a repository has anonymous read or write
        everyone = User("everyone")
        if everyone in self.user_read_list:
            template_repo_config = open(settings.INSTALL_DIR + '/app/gitstack/config_template/repository_template_anonymous_read.conf',"r")
        else:
            template_repo_config = open(settings.INSTALL_DIR + '/app/gitstack/config_template/repository_template.conf',"r")

        # create a list of users & groups
        str_user_read_list = ''
        str_user_write_list = ''
        str_user_list = ''
        str_group_read_list = ''
        str_group_write_list = ''
        str_group_list = ''
        
        # convert objects to list of strings
        for u in self.user_read_list:
            str_user_read_list = str_user_read_list + u.username + ' '
        for u in self.user_write_list:
            str_user_write_list = str_user_write_list + u.username + ' '
        for u in self.user_list:
            str_user_list = str_user_list + u.username + ' '
        for g in self.group_read_list:
            str_group_read_list = str_group_read_list + g.name + ' '
        for g in self.group_write_list:
            str_group_write_list = str_group_write_list + g.name + ' '
        for g in self.group_list:
            str_group_list = str_group_list + g.name + ' '
            
        # get the user everyone
        everyone = User("everyone")
            
        # for each line try to replace username or location
        for line in template_repo_config:
            # add the list of users
            # replace username   
            line = line.replace("ALL_USER_LIST",str_user_list)         
            line = line.replace("READ_USER_LIST",str_user_read_list)
            line = line.replace("WRITE_USER_LIST",str_user_write_list)
            
            line = line.replace("READ_PERMISSIONS","Require user " + str_user_read_list)
            
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
        
        # save in the repo configuration file
        # if has not gitstack section
        if not self.has_gitstack_section():
            # create one
            self.create_gitstack_section()
            
        config = ConfigParser.ConfigParser()
        config.read(settings.REPOSITORIES_PATH + "/" + self.name + ".git" + "/config")
        
        
        # add a gitstack section
        config.set('gitstack', 'addedusers', str_user_list)
        config.set('gitstack', 'readusers', str_user_read_list)
        config.set('gitstack', 'writeusers', str_user_write_list)
        config.set('gitstack', 'addedgroups', str_group_list)
        config.set('gitstack', 'readgroups', str_group_read_list)
        config.set('gitstack', 'writegroups', str_group_write_list)
        
      
        f = open(settings.REPOSITORIES_PATH + "/" + self.name + ".git" + "/config", "w")
        config.write(f)
        f.close()
        
        # restart apache
        Apache.restart()
        
    @staticmethod     
    def retrieve_all():
        # change to the repository directory
        str_repository_list = os.listdir(settings.REPOSITORIES_PATH)
        repository_list = []
        for str_repository in str_repository_list:
            # if the repository does not contains a .git at the end, mark it as converted=false
            bare = True
            if str_repository[-4:] == '.git':
                bare = True
            else:
                bare = False
                
            # instantiate the repository
            repo = Repository(str_repository.replace('.git', ''))
            repo.bare = bare
            repository_list.append(repo)
            
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
        
    # Add the group to the repo without any read and write permission
    def add_group(self, group):
        self.group_list.append(group)

    # Add read permissions to a group on the repository
    def add_group_read(self, group):
        # check if the group is already in the group list
        if group in self.group_list:
            # if group is not already added
            if group not in self.group_read_list:
                self.group_read_list.append(group)
            else:
                raise Exception(group.name + " has already read permissions on " + self.name)

        else:
            raise Exception(group.name + " has to be added in the repository before setting read/write permissions")
        
    
    # Add write permissions to a group on the repository
    def add_group_write(self, group):
        # check if the group is already in the group list
        if group in self.group_list:
            # if group is not already added
            if group not in self.group_write_list:
                self.group_write_list.append(group)
            else:
                raise Exception(group.name + " has already write permissions on " + self.name)
        else:
            raise Exception(group.name + " has to be added in the repository before setting read/write permissions")
         
    # remove the read/write access to an user
    def remove_user(self, user):
        self.remove_user_read(user)
        self.remove_user_write(user)
        self.user_list.remove(user)

    # remove the read access to an user
    def remogroupser_read(self, user):
        if user in self.user_read_list:
            self.user_read_list.remove(user)
        
    # remove the read access to an user
    def remove_user_write(self, user):
        if user in self.user_write_list:
            self.user_write_list.remove(user)   
    
    # remove the read/write access to an group
    def remove_group(self, group):
        self.remove_group_read(group)
        self.remove_group_write(group)
        self.group_list.remove(group)

    # remove the read access to an group
    def remove_group_read(self, group):
        if group in self.group_read_list:
            self.group_read_list.remove(group)
        
    # remove the read access to an group
    def remove_group_write(self, group):
        if group in self.group_write_list:
            self.group_write_list.remove(group)   
            
    # retrieve all the groups of the repository
    def retrieve_all_groups(self):
        # add the read and the write users
        all_groups = self.group_list + self.group_read_list + self.group_write_list
        
        # remove the duplicates
        all_groups = list(set(all_groups))

        return all_groups
    
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
            shutil.rmtree(settings.REPOSITORIES_PATH + '/' + fullname, onerror=self.remove_readonly)
            
            # remove the configuration file if exist
            try:
                os.remove(settings.INSTALL_DIR + '/apache/conf/gitstack/repositories/' + self.name + ".conf")
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
        
        # remove whitespaces and tab in config file
        config_parser = RepoConfigParser(self.name)
        config_parser.remove_tabs()
        self.create_gitstack_section()
        
        
        # change to another directory
        os.chdir(settings.INSTALL_DIR)
        
        
        # Create an apache config file for the repository
        self.save()
    
    # create the gitstack section in the repo config file
    def create_gitstack_section(self):
        # add retrieve_all the rights to anonymous users
        config_path = settings.REPOSITORIES_PATH + "/" + self.name + ".git/config"
        config = ConfigParser.ConfigParser()
        config.read(config_path)
        if not config.has_section('http'):
            config.add_section('http')
            config.set('http', 'receivepack', 'true')
        
        # add a gitstack section
        if not config.has_section('gitstack'):
            config.add_section('gitstack')
            config.set('gitstack', 'readusers', '')
            config.set('gitstack', 'writeusers', '')
            config.set('gitstack', 'addedusers', '')
            config.set('gitstack', 'readgroups', '')
            config.set('gitstack', 'writegroups', '')
            config.set('gitstack', 'addedgroups', '')

        f = open(config_path, "w")
        config.write(f)
        f.close()
        
    # check if the repo has a gitstack section in the configuration file
    def has_gitstack_section(self):
        config_path = settings.REPOSITORIES_PATH + "/" + self.name + ".git/config"
        config = ConfigParser.ConfigParser()
        config.read(config_path)
        return config.has_section('gitstack')
        
    # convert a repository to a bare repository
    def convert_to_bare(self):
        # Create a new directory for the repo with a correct name (.git at the end)
        repo_dir = settings.REPOSITORIES_PATH + "/" + self.name
        # os.makedirs(repo_dir + '.git')
        # Copy the .git direcotry of the old repo to the new repo
        shutil.copytree(repo_dir + '/.git', repo_dir + '.git')
        # remove all the whitespaces in the config file
        repo_config_parser = RepoConfigParser(self.name)
        repo_config_parser.remove_tabs()
        # Add sections options
        # bare = true
        # shared = 1
        # Load the configuration file
        config = ConfigParser.ConfigParser()
        config.read(repo_dir + '.git/config')
        config.set('core', 'bare', 'true')
        config.set('core', 'shared', '1')
        

        
        f = open(repo_dir + '.git/config', "w")
        config.write(f)
        f.close()
        
        # add other sections to the repo config
        self.create_gitstack_section()
        
        # create the apache config file
        self.save()
        
        
        # remove the old directory
        shutil.rmtree(repo_dir, onerror=self.remove_readonly)    
     
    # remove a folder which contains read only files    
    def remove_readonly(self, fn, path, excinfo):
        if fn is os.rmdir:
            os.chmod(path, stat.S_IWRITE)
            os.rmdir(path)
        elif fn is os.remove:
            os.chmod(path, stat.S_IWRITE)
            os.remove(path)
            

