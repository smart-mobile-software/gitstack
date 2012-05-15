import ConfigParser, os
from django.conf import settings
import shutil

# give some info about ldap config
class LdapHelper(object):
    # contructor
    def __init__(self):
        config = ConfigParser.ConfigParser()

        if os.path.exists(settings.SETTINGS_PATH):
            # load the settings file
            # check if the file exist
            
            config.read(settings.SETTINGS_PATH)
            if config.has_section('authentication'):
                # retrieve the settings
                self.auth_method = config.get('authentication', 'authmethod')
                self.protocol = config.get('authentication', 'ldapprotocol')
                self.host = config.get('authentication', 'ldaphost')
                self.port = config.get('authentication', 'ldapport')
                self.base_dn = config.get('authentication', 'ldapbaseDn')
                self.attribute = config.get('authentication', 'ldapattribute')
                self.scope = config.get('authentication', 'ldapscope')
                self.filter = config.get('authentication', 'ldapfilter')
                self.bind_dn = config.get('authentication', 'ldapbindDn')
                self.bind_password = config.get('authentication', 'ldapbindPassword')  
            else :
                # create a config file with empty values
                # retrieve the settings
                self.auth_method = 'file'
                self.protocol = ''
                self.host = ''
                self.port = ''
                self.base_dn = ''
                self.attribute = ''
                self.scope = ''
                self.filter = ''
                self.bind_dn = ''
                self.bind_password = ''
                self.save()
        
    # get the ldap url
    def get_url(self):
        url = self.protocol + '://' + self.host + ':' + self.port + '/' + self.base_dn + '?' + self.attribute + '?' + self.scope + '?' + self.filter
        return url
    
    def save(self):
        # load the config file
        config = ConfigParser.ConfigParser()
        config.read(settings.SETTINGS_PATH)
        
        # save the settings
        if not config.has_section('authentication'):
            config.add_section('authentication')   
        config.set('authentication', 'authmethod', self.auth_method)
        config.set('authentication', 'ldapprotocol', self.protocol)
        config.set('authentication', 'ldaphost', self.host)
        config.set('authentication', 'ldapport', self.port)
        config.set('authentication', 'ldapbaseDn', self.base_dn)
        config.set('authentication', 'ldapattribute', self.attribute)
        config.set('authentication', 'ldapscope', self.scope)
        config.set('authentication', 'ldapfilter', self.filter)
        config.set('authentication', 'ldapbindDn', self.bind_dn)
        config.set('authentication', 'ldapbindPassword', self.bind_password)
              
        f = open(settings.SETTINGS_PATH, "w")
        config.write(f)
        f.close()
          
class UpgradeManager(object):
    # contructor
    def __init__(self):

        self.current_version = 2.1
        
        pass
    
    def is_first_install(self):
        # check if the settings.ini file is created 
        if not os.path.isfile(settings.SETTINGS_PATH):
            return True
        else:
            return False
           
    # check if the app needs to be upgraded
    def need_upgrade(self):
        
        # check which version was installed
        # write a config file with the version number 
        # load the config file
        config = ConfigParser.ConfigParser()
        config.read(settings.SETTINGS_PATH)
        previous_version = config.get('versionning', 'version')
        
        if previous_version == "1.4" or previous_version == "1.5" or previous_version == "2.0":
            return True
        else:
            return False
        
    # this is the first lauch of the app
    def proceed_first_setup(self):
        from gitstack.models import Apache

        # create a settings.ini file
        shutil.copy(settings.INSTALL_DIR + '/app/gitstack/config_template/settings.ini', settings.SETTINGS_PATH)
        
        # create a group file if it does not exist
        if not os.path.isfile(settings.GROUP_FILE_PATH):
            # create an empty group file
            group_file = open(settings.GROUP_FILE_PATH, 'w')
            group_file.write('')
            group_file.close()   
            
        # copy the self signed certificates
        self.copy_certificates()
        
        # save new apache configuration (update gitphp repo location)
        apache = Apache()
        apache.save()
            
    def copy_certificates(self):
        os.mkdir(settings.INSTALL_DIR + '/data/certificates')
        shutil.copy(settings.INSTALL_DIR + '/app/gitstack/config_template/certificates/server.crt', settings.INSTALL_DIR + '/data/certificates')
        shutil.copy(settings.INSTALL_DIR + '/app/gitstack/config_template/certificates/server.key', settings.INSTALL_DIR + '/data/certificates')
        
    # update the app
    def upgrade(self):
        from gitstack.models import Repository

        config = ConfigParser.ConfigParser()
        config.read(settings.SETTINGS_PATH)
        previous_version = config.get('versionning', 'version')
        
        
        if previous_version == "2.0":
            # upgrade to 2.1

            # load the config file
            config = ConfigParser.ConfigParser()
            config.read(settings.SETTINGS_PATH)
            
            # create the section location and add a default location
            config.add_section('location')
            config.set('location', 'repositories', settings.INSTALL_DIR + '/repositories')
            
            f = open(settings.SETTINGS_PATH, "w")
            config.write(f)
            f.close()
            
        
        if previous_version == "1.5":
            # upgrade to 2.0

            # load the config file
            config = ConfigParser.ConfigParser()
            config.read(settings.SETTINGS_PATH)
            
            # save the settings
            config.set('versionning', 'version', '2.0')
            
            f = open(settings.SETTINGS_PATH, "w")
            config.write(f)
            f.close()
            # upgrade to 2.1
            self.upgrade()
        
        if previous_version == "1.4":
            # upgrade to 1.5
            
            # write a config file with the version number 
            # load the config file
            config = ConfigParser.ConfigParser()
            config.read(settings.SETTINGS_PATH)
            
            # save the settings
            config.set('versionning', 'version', '1.5')
            
            # add the protocol section
            config.add_section('protocols')   
            config.set('protocols', 'http', 'true')
            config.set('protocols', 'https', 'false')
            config.set('protocols', 'httpport', '80')
            config.set('protocols', 'httpsport', '443')
            
            f = open(settings.SETTINGS_PATH, "w")
            config.write(f)
            f.close()
            
                
            # create a group file if it does not exist
            if not os.path.isfile(settings.GROUP_FILE_PATH):
                # create an empty group file
                group_file = open(settings.GROUP_FILE_PATH, 'w')
                group_file.write('')
                group_file.close()   
                
            # copy the self signed certificates
            self.copy_certificates()
            
            # write a config for each repo
            repo_list = Repository.retrieve_all()
            for repo in repo_list:
                repo.load()
                repo.save()
                
            # upgrade now to 2.0
            self.upgrade()
        

    
    