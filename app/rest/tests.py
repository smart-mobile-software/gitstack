from gitstack.models import Repository, Group
from django.test import TestCase
from django.test.client import Client
import time, json, os, shutil
from django.conf import settings

'''
For ldap test, use the following parameters : 
ldaphost = 192.168.1.54
ldapbasedn = CN=Users,DC=contoso,DC=com
ldapbinddn = CN=john,CN=Users,DC=contoso,DC=com
ldapbindpassword = Abcd!123
ldapprotocol = ldap
ldapport = 389
ldapattribute = sAMAccountName
ldapscope = sub
ldapfilter = (objectClass=person)

Remove settings.ini file
Remove groupfile
Delete all the users
'''

class SimpleTest(TestCase):
    
    ###################
    # Set up
    ###################
    def setUp(self):
        self.c = Client()
        # put the settings.ini file
        shutil.copy(settings.INSTALL_DIR + '/app/gitstack/config_template/settings.ini', settings.SETTINGS_PATH)

        # create repositories
        self.create_repos()
        # create users
        # self.create_users()
        shutil.copy(settings.INSTALL_DIR + '/app/rest/tests/passwdfile', settings.INSTALL_DIR + '/data/passwdfile')

        # create groups
        self.create_groups()

        
    def tearDown(self):
        # delete repos
        repositories = Repository.retrieve_all()
        for repo in repositories:
            repo.delete()

        # delete users
        os.remove(settings.INSTALL_DIR + '/data/passwdfile')
          
        # delete groups
        groups = Group.retrieve_all()
        for group in groups:
            # delete the group
            group.delete()
            
        # remove the settings.ini file from the filesystem
        os.remove(settings.SETTINGS_PATH)
        
    # create repositories
    def create_repos(self):
        self.assertEqual(self.c.post('/rest/repository/', { 'name' : 'repo1' }).status_code, 200) 
        self.assertEqual(self.c.post('/rest/repository/', { 'name' : 'repo2' }).status_code, 200) 
        self.assertEqual(self.c.post('/rest/repository/', { 'name' : 'repo3' }).status_code, 200)
    
    # create users    
    def create_users(self):
        # create empty user file
        user_file = open(settings.INSTALL_DIR + '/data/passwdfile', 'w')
        user_file.write('')
        user_file.close()
        self.assertEqual(self.c.post('/rest/user/', { 'username' : 'user1', 'password' : 'user1' }).status_code, 200)
        time.sleep(0.1)
        self.assertEqual(self.c.post('/rest/user/', { 'username' : 'user2', 'password' : 'user2' }).status_code, 200)
        time.sleep(0.1)
        self.assertEqual(self.c.post('/rest/user/', { 'username' : 'user3', 'password' : 'user3' }).status_code, 200)
        time.sleep(0.1)
        
    # create groups
    def create_groups(self):
        self.assertEqual(self.c.post('/rest/group/', { 'name' : 'group1' }).status_code, 200)
        self.assertEqual(self.c.post('/rest/group/', { 'name' : 'group2' }).status_code, 200)
        self.assertEqual(self.c.post('/rest/group/', { 'name' : 'group3' }).status_code, 200)
        

        
    ######################
    # Repositories 
    #####################
    
    # create repo
    def test_repo_create(self):
        self.assertEqual(self.c.post('/rest/repository/', { 'name' : 'repo4' }).status_code, 200) 
        response = self.c.get('/rest/repository/')
        self.assertEqual(response.content, '[{"group_read_list": [], "name": "repo1", "user_write_list": [], "group_list": [], "bare": true, "user_read_list": [], "group_write_list": [], "user_list": []}, {"group_read_list": [], "name": "repo2", "user_write_list": [], "group_list": [], "bare": true, "user_read_list": [], "group_write_list": [], "user_list": []}, {"group_read_list": [], "name": "repo3", "user_write_list": [], "group_list": [], "bare": true, "user_read_list": [], "group_write_list": [], "user_list": []}, {"group_read_list": [], "name": "repo4", "user_write_list": [], "group_list": [], "bare": true, "user_read_list": [], "group_write_list": [], "user_list": []}]')

    # retrieve repositories
    def test_repo_retrieve(self):
        response = self.c.get('/rest/repository/')
        self.assertEqual(response.status_code, 200)
        self.assertEqual(response.content, '[{"group_read_list": [], "name": "repo1", "user_write_list": [], "group_list": [], "bare": true, "user_read_list": [], "group_write_list": [], "user_list": []}, {"group_read_list": [], "name": "repo2", "user_write_list": [], "group_list": [], "bare": true, "user_read_list": [], "group_write_list": [], "user_list": []}, {"group_read_list": [], "name": "repo3", "user_write_list": [], "group_list": [], "bare": true, "user_read_list": [], "group_write_list": [], "user_list": []}]')
    
    # delete a repository
    def test_repo_delete(self):
        response = self.c.delete('/rest/repository/repo3/')
        self.assertEqual(response.status_code, 200)
        response = self.c.get('/rest/repository/')
        self.assertEqual(response.content, '[{"group_read_list": [], "name": "repo1", "user_write_list": [], "group_list": [], "bare": true, "user_read_list": [], "group_write_list": [], "user_list": []}, {"group_read_list": [], "name": "repo2", "user_write_list": [], "group_list": [], "bare": true, "user_read_list": [], "group_write_list": [], "user_list": []}]')
        
    ######################
    # Users 
    #####################
        
    # remove 
    def test_user_remove(self):
        response = self.c.delete('/rest/user/user3/')
        self.assertEqual(response.status_code, 200)
        time.sleep(0.1)
        response = self.c.get('/rest/user/')
        self.assertEqual(response.content, '["user1", "user2", "everyone"]')
        
    # update a user pas
    def test_user_change_password(self):
        response = self.c.put('/rest/user/', data='{"username":"user3", "password":"test"}', content_type='application/json')
        self.assertEqual(response.status_code, 200)
        
    # create 
    def test_user_create(self):
        self.assertEqual(self.c.post('/rest/user/', { 'username' : 'user4', 'password' : 'user4' }).status_code, 200)
        time.sleep(0.1)
        response = self.c.get('/rest/user/')
        self.assertEqual(response.content, '["user1", "user2", "user3", "user4", "everyone"]')
        
    # retrieve
    def test_user_retrieve(self):
        response = self.c.get('/rest/user/')
        self.assertEqual(response.status_code, 200)
        self.assertEqual(response.content, '["user1", "user2", "user3", "everyone"]')
        
    ###############################
    # Groups
    ###############################
    
    # retrieve
    def test_group_retrieve(self):
        response = self.c.get('/rest/group/')
        self.assertEqual(response.status_code, 200)
        self.assertEqual(response.content, '[{"name": "group1", "member_list": []}, {"name": "group2", "member_list": []}, {"name": "group3", "member_list": []}]')
    
    # remove 
    def test_group_remove(self):
        response = self.c.delete('/rest/group/group3/')
        self.assertEqual(response.status_code, 200)
        response = self.c.get('/rest/group/')
        self.assertEqual(response.content, '[{"name": "group1", "member_list": []}, {"name": "group2", "member_list": []}]')
    
    # create
    def test_group_create(self):
        self.assertEqual(self.c.post('/rest/group/', { 'name' : 'group4' }).status_code, 200)
        response = self.c.get('/rest/group/')
        self.assertEqual(response.content, '[{"name": "group1", "member_list": []}, {"name": "group2", "member_list": []}, {"name": "group3", "member_list": []}, {"name": "group4", "member_list": []}]')
     
    #
    # group members
    #
    
      
    # retrieve all the users of a group
    def test_group_user_retrieve(self):
        self.assertEqual(self.c.post('/rest/group/group1/user/user1/').status_code, 200)
        response = self.c.get('/rest/group/group1/user/')
        self.assertEqual(response.content, '["user1"]')
        
    # add a user to a group
    def test_group_user_add(self):
        self.assertEqual(self.c.post('/rest/group/group1/user/user1/').status_code, 200)
        self.assertEqual(self.c.post('/rest/group/group1/user/user2/').status_code, 200)

        response = self.c.get('/rest/group/group1/user/')
        self.assertEqual(response.content, '["user1", "user2"]')
      
    def test_group_user_remove(self):
        self.assertEqual(self.c.post('/rest/group/group1/user/user1/').status_code, 200)
        self.assertEqual(self.c.post('/rest/group/group1/user/user2/').status_code, 200)
        self.assertEqual(self.c.delete('/rest/group/group1/user/user2/').status_code, 200)
        
        response = self.c.get('/rest/group/group1/user/')
        self.assertEqual(response.content, '["user1"]')

    #########################
    # Repository user management
    ########################
    
    #
    # add user to a repo
    #
    
    # add an user to a repo
    def test_repo_add_user(self):
        self.assertEqual(self.c.post('/rest/repository/repo1/user/user1/').status_code, 200)
        response = self.c.get('/rest/repository/repo1/user/')
        self.assertEqual(response.content, '["user1"]')
    
    # remove an user from a repo
    def test_repo_remove_user(self):
        self.assertEqual(self.c.post('/rest/repository/repo1/user/user1/').status_code, 200)
        self.assertEqual(self.c.post('/rest/repository/repo1/user/user2/').status_code, 200)
        self.assertEqual(self.c.delete('/rest/repository/repo1/user/user2/').status_code, 200)
        response = self.c.get('/rest/repository/repo1/user/')
        self.assertEqual(response.status_code, 200)

        self.assertEqual(response.content, '["user1"]')
    
    # retrieve users added to a repo
    def test_repo_retrieve_user(self):
        self.assertEqual(self.c.post('/rest/repository/repo1/user/user1/').status_code, 200)
        self.assertEqual(self.c.post('/rest/repository/repo1/user/user2/').status_code, 200)
        
        response = self.c.get('/rest/repository/repo1/user/')
        self.assertEqual(response.content, '["user1", "user2"]')
    
    #
    # read permission
    #
    
    # add read permission
    def test_repo_add_read_user(self):
        # the user1 has read rights by default
        self.assertEqual(self.c.post('/rest/repository/repo1/user/user1/').status_code, 200)
        # Check if the user1 has the read rights
        response = self.c.get('/rest/repository/repo1/user/user1/')
        permissions = json.loads(response.content)
        self.assertEqual(permissions['read'], True)
        
    # remove read permission
    def test_repo_remove_read_user(self):
        # the user1 has read rights by default
        self.assertEqual(self.c.post('/rest/repository/repo1/user/user1/').status_code, 200)
        # remove the read rights
        self.assertEqual(self.c.put('/rest/repository/repo1/user/user1/',data='{"read":false}', content_type='application/json').status_code, 200)

        # Check if the user1 has the read rights
        response = self.c.get('/rest/repository/repo1/user/user1/')
        permissions = json.loads(response.content)
        self.assertEqual(permissions['read'], False)
    
    #
    # write permission
    #
    def test_repo_add_write_user(self):
        # the user1 has read rights by default
        self.assertEqual(self.c.post('/rest/repository/repo1/user/user1/').status_code, 200)
        # Check if the user1 has the read rights
        response = self.c.get('/rest/repository/repo1/user/user1/')
        permissions = json.loads(response.content)
        self.assertEqual(permissions['write'], True)
        
    # remove write permission
    def test_repo_remove_write_user(self):
        # the user1 has read rights by default
        self.assertEqual(self.c.post('/rest/repository/repo1/user/user1/').status_code, 200)
        # remove the read rights
        self.assertEqual(self.c.put('/rest/repository/repo1/user/user1/',data='{"write":false}', content_type='application/json').status_code, 200)

        # Check if the user1 has the read rights
        response = self.c.get('/rest/repository/repo1/user/user1/')
        permissions = json.loads(response.content)
        self.assertEqual(permissions['write'], False)
        
    #############################
    # Repository Group managment
    #############################
    
    #
    # Add/Remove group to a repo
    #
    
    # add an group to a repo
    def test_repo_add_group(self):
        self.assertEqual(self.c.post('/rest/repository/repo1/group/group1/').status_code, 200)
        response = self.c.get('/rest/repository/repo1/group/')
        self.assertEqual(response.content, '["group1"]')
        
    # remove a group from a repo
    def test_repo_remove_group(self):
        self.assertEqual(self.c.post('/rest/repository/repo1/group/group1/').status_code, 200)
        self.assertEqual(self.c.post('/rest/repository/repo1/group/group2/').status_code, 200)
        self.assertEqual(self.c.delete('/rest/repository/repo1/group/group2/').status_code, 200)
        response = self.c.get('/rest/repository/repo1/group/')
        self.assertEqual(response.status_code, 200)

        self.assertEqual(response.content, '["group1"]')
        
    # retrieve groups added to a repo
    def test_repo_retrieve_group(self):
        self.assertEqual(self.c.post('/rest/repository/repo1/group/group1/').status_code, 200)
        self.assertEqual(self.c.post('/rest/repository/repo1/group/group2/').status_code, 200)
        
        response = self.c.get('/rest/repository/repo1/group/')
        self.assertEqual(response.content, '["group1", "group2"]')
        
    #
    # read permission
    #
    
    # add read permission
    def test_repo_add_read_group(self):
        # the user1 has read rights by default
        self.assertEqual(self.c.post('/rest/repository/repo1/group/group1/').status_code, 200)
        # Check if the group1 has the read rights
        response = self.c.get('/rest/repository/repo1/group/group1/')
        permissions = json.loads(response.content)
        self.assertEqual(permissions['read'], True)
        
    # remove read permission
    def test_repo_remove_read_group(self):
        # the group1 has read rights by default
        self.assertEqual(self.c.post('/rest/repository/repo1/group/group1/').status_code, 200)
        # remove the read rights
        self.assertEqual(self.c.put('/rest/repository/repo1/group/group1/',data='{"read":false}', content_type='application/json').status_code, 200)

        # Check if the user1 has the read rights
        response = self.c.get('/rest/repository/repo1/group/group1/')
        permissions = json.loads(response.content)
        self.assertEqual(permissions['read'], False)
        
    #
    # write permission
    #
    def test_repo_add_write_group(self):
        # the group1 has read rights by default
        self.assertEqual(self.c.post('/rest/repository/repo1/group/group1/').status_code, 200)
        # Check if the group1 has the write rights
        response = self.c.get('/rest/repository/repo1/group/group1/')
        permissions = json.loads(response.content)
        self.assertEqual(permissions['write'], True)
        
    # remove write permission
    def test_repo_remove_write_group(self):
        # the group1 has write rights by default
        self.assertEqual(self.c.post('/rest/repository/repo1/group/group1/').status_code, 200)
        # remove the read rights
        self.assertEqual(self.c.put('/rest/repository/repo1/group/group1/',data='{"write":false}', content_type='application/json').status_code, 200)

        # Check if the group1 has the write rights
        response = self.c.get('/rest/repository/repo1/group/group1/')
        permissions = json.loads(response.content)
        self.assertEqual(permissions['write'], False)
        
        
    ################################
    # Ldap 
    #################################
    def test_ldap(self):
        # get ldap settings
        response = self.c.get('/rest/settings/authentication/')
        # check that "file" auth is selected
        self.assertEqual(response.content, '{"authMethod":"file","ldap":{"protocol": "","host": "","port": "","baseDn": "","attribute": "","scope": "","filter": "","bindDn": "","bindPassword": ""}}')
        # set some ldap settings
        self.assertEqual(self.c.put('/rest/settings/authentication/',data='{"authMethod":"ldap","ldap":{"protocol": "ldap","host": "192.168.1.54","port": "389","baseDn": "CN=Users,DC=contoso,DC=com","attribute": "cn","scope": "sub","filter": "(objectClass=person)","bindDn": "CN=john,CN=Users,DC=contoso,DC=com","bindPassword": "Abcd!123"}}', content_type='application/json').status_code, 200)
        # retrieve the ldap settings
        response = self.c.get('/rest/settings/authentication/')
        self.assertEqual(response.content, '{"authMethod":"ldap","ldap":{"protocol": "ldap","host": "192.168.1.54","port": "389","baseDn": "CN=Users,DC=contoso,DC=com","attribute": "cn","scope": "sub","filter": "(objectClass=person)","bindDn": "CN=john,CN=Users,DC=contoso,DC=com","bindPassword": "Abcd!123"}}')
        # test the ldap settings
        self.assertEqual(self.c.get('/rest/settings/authentication/ldap/test/?protocol=ldap&host=192.168.1.54&port=389&baseDn=CN%3DUsers%2CDC%3Dcontoso%2CDC%3Dcom&attribute=cn&scope=sub&filter=(objectClass%3Dperson)&bindDn=CN%3Djohn%2CCN%3DUsers%2CDC%3Dcontoso%2CDC%3Dcom&bindPassword=Abcd!123').status_code, 200)
        # add users to the repo1 
        # the user1 has read rights by default
        self.assertEqual(self.c.post('/rest/repository/repo1/user/user1/').status_code, 200)
        # Check if the user1 has the read rights
        response = self.c.get('/rest/repository/repo1/user/user1/')
        permissions = json.loads(response.content)
        self.assertEqual(permissions['read'], True)
        # remove user1 read permissions
        self.assertEqual(self.c.put('/rest/repository/repo1/user/user1/',data='{"read":false}', content_type='application/json').status_code, 200)
        # Check if the user1 has the read rights
        response = self.c.get('/rest/repository/repo1/user/user1/')
        permissions = json.loads(response.content)
        self.assertEqual(permissions['read'], False)
        
    ################################
    # Gitphp web access
    ################################
    # Check if the web access is enabled
    
    def test_web_access(self):
        # The web interface should be enabled by default
        response = self.c.get('/rest/settings/general/webinterface/')
        permissions = json.loads(response.content)
        self.assertEqual(permissions['enabled'], True)
        
    def test_web_access_disable(self):
        # Disable the web interface        
        self.assertEqual(self.c.put('/rest/settings/general/webinterface/',data='{"enabled":false}', content_type='application/json').status_code, 200)
        # Check that the web interface is disabled
        response = self.c.get('/rest/settings/general/webinterface/')
        permissions = json.loads(response.content)
        self.assertEqual(permissions['enabled'], False)
        # make sure the web interface is enabled                
        self.assertEqual(self.c.put('/rest/settings/general/webinterface/',data='{"enabled":true}', content_type='application/json').status_code, 200)
    
      

