from models import Repository, User
from django.test import TestCase
import time


class SimpleTest(TestCase):
    # Create 3 repos
    def test_create_repo(self):
        repo1 = Repository("repo1")
        repo1.create()
        repo2 = Repository("repo2")
        repo2.create()
        repo3 = Repository("repo3")
        repo3.create()
        repo_list = [repo1, repo2, repo3]

        # check the list of created repos
        repositories = Repository.retrieve_all()
        self.assertEqual(repositories, repo_list)
        
    # delete one repo
    def test_delete_repo(self):
        repo1 = Repository("repo1")
        repo2 = Repository("repo2")
        # delete the repo 3
        repo3 = Repository("repo3")
        repo3.delete()
        repo_list = [repo1, repo2]
        repositories = Repository.retrieve_all()
        self.assertEqual(repositories, repo_list)
        
    '''
    # create 3 users
    def test_create_user1(self):
        user1 = User("user1", "user1")
        user1.create()
        
    def test_create_user2(self):
        user1 = User("user2", "user2")
        user1.create()
        
    def test_create_user3(self):
        user1 = User("user3", "user3")
        user1.create()
        
    def test_create_user(self):
        time.sleep(1)
        user_list = ["user1", "user2", "user3"]
        # check that all users have been created
        users = User.retrieve_all()
        self.assertEqual(users, user_list)
    
    '''    
    # delete all repositories & users
    def test_cleanup(self):
        
        repositories = Repository.retrieve_all()
        for repo in repositories:
            repo.delete()
            
        users = User.retrieve_all()
        for user in users:
            # create the user
            userObj = User(user, '')
            userObj.delete()
            
    
            

