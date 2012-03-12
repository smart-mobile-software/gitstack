from gitstack.models import Repository, User
from django.test import TestCase
from django.test.client import Client
import time, json


class SimpleTest(TestCase):
    
    ###################
    # Set up
    ###################
    def setUp(self):
        self.c = Client()
        # create repositories
        self.create_repos()
        # create users
        self.create_users()
        
        
    def tearDown(self):
        # delete repos
        repositories = Repository.retrieve_all()
        for repo in repositories:
            repo.delete()

        # delete users
        users = User.retrieve_all()
        for user in users:
            # create the user
            user.delete()
            time.sleep(0.1)
                
        


    # create repositories
    def create_repos(self):
        self.assertEqual(self.c.post('/rest/repository/', { 'name' : 'repo1' }).status_code, 200) 
        self.assertEqual(self.c.post('/rest/repository/', { 'name' : 'repo2' }).status_code, 200) 
        self.assertEqual(self.c.post('/rest/repository/', { 'name' : 'repo3' }).status_code, 200)
    
    # create users    
    def create_users(self):
        self.assertEqual(self.c.post('/rest/user/', { 'username' : 'user1', 'password' : 'user1' }).status_code, 200)
        time.sleep(0.1)
        self.assertEqual(self.c.post('/rest/user/', { 'username' : 'user2', 'password' : 'user2' }).status_code, 200)
        time.sleep(0.1)
        self.assertEqual(self.c.post('/rest/user/', { 'username' : 'user3', 'password' : 'user3' }).status_code, 200)
        time.sleep(0.1)
        
    ######################
    # Repositories 
    #####################
    
    # create repo
    def test_repo_create(self):
        self.assertEqual(self.c.post('/rest/repository/', { 'name' : 'repo4' }).status_code, 200) 
        response = self.c.get('/rest/repository/')
        self.assertEqual(response.content, '["repo1", "repo2", "repo3", "repo4"]')
                

    # retrieve repositories
    def test_repo_retrieve(self):
        response = self.c.get('/rest/repository/')
        self.assertEqual(response.status_code, 200)
        self.assertEqual(response.content, '["repo1", "repo2", "repo3"]')
        
    
    # delete a repository
    def test_repo_delete(self):
        response = self.c.delete('/rest/repository/repo3/')
        self.assertEqual(response.status_code, 200)
        response = self.c.get('/rest/repository/')
        self.assertEqual(response.content, '["repo1", "repo2"]')
        
    ######################
    # Users 
    #####################
        
    # remove 
    def test_user_remove(self):
        response = self.c.delete('/rest/user/user3/')
        self.assertEqual(response.status_code, 200)
        time.sleep(0.1)
        response = self.c.get('/rest/user/')
        self.assertEqual(response.content, '["user1", "user2"]')
        
    # update a user pas
    def test_user_change_password(self):
        response = self.c.put('/rest/user/', data='{"username":"user3", "password":"test"}', content_type='application/json')
        self.assertEqual(response.status_code, 200)
        
    # create 
    def test_user_create(self):
        self.assertEqual(self.c.post('/rest/user/', { 'username' : 'user4', 'password' : 'user4' }).status_code, 200)
        time.sleep(0.1)
        response = self.c.get('/rest/user/')
        self.assertEqual(response.content, '["user1", "user2", "user3", "user4"]')
        
    # retrieve
    def test_user_retrieve(self):
        response = self.c.get('/rest/user/')
        self.assertEqual(response.status_code, 200)
        self.assertEqual(response.content, '["user1", "user2", "user3"]')
        
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
    
    # remove an user to a repo
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
    '''    
    def test_repo_add_write_user(self):
        # the user1 has read rights by default
        self.assertEqual(self.c.post('/rest/repository/repo1/user/user1/').status_code, 200)
        # Check if the user1 has the read rights
        response = self.c.get('/rest/repository/repo1/user/user1/')
        permissions = json.loads(response.content)
        self.assertEqual(permissions['write'], True)   '''
        
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
        
    
        
    ################################
    # Gitphp web access
    ################################
    # Check if the web access is enabled
    
    def test_web_access(self):
        # The web interface should be enabled by default
        response = self.c.get('/rest/webinterface/')
        permissions = json.loads(response.content)
        self.assertEqual(permissions['enabled'], True)
        
    def test_web_access_disable(self):
        # Disable the web interface        
        self.assertEqual(self.c.put('/rest/webinterface/',data='{"enabled":false}', content_type='application/json').status_code, 200)
        # Check that the web interface is disabled
        response = self.c.get('/rest/webinterface/')
        permissions = json.loads(response.content)
        self.assertEqual(permissions['enabled'], False)
        # make sure the web interface is enabled                
        self.assertEqual(self.c.put('/rest/webinterface/',data='{"enabled":true}', content_type='application/json').status_code, 200)
    
        

        
        
    
        



        
    
            
    
        
            
    
    
            

