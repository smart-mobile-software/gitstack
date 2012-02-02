from django.conf.urls.defaults import patterns, url
from django.contrib.auth.views import login
urlpatterns = patterns('gitstack.views',
    # standart user interface
    url(r'^$', 'index'),
    url(r'^users/', 'users'),
    url(r'^repository/(?P<repo_name>.+)/user/$', 'repository_user'),
    # add users dialog
    url(r'^repository/(?P<repo_name>.+)/user/add/$', 'add_repo_user_dialog'),
    
    # settings tab
    url(r'^settings/', 'settings'),

    
    
    # rest stuff
    # Add/Remove users on a repository
    url(r'^rest/repository/(?P<repo_name>.+)/user/(?P<username>.+)/$', 'rest_repo_user'),
    # Get all the users on a specific repository
    url(r'^rest/repository/(?P<repo_name>.+)/user/$', 'rest_repo_user_all'),
    # to delete a repository
    url(r'^rest/repository/(?P<repo_name>.+)/$', 'rest_repo_action'),
    url(r'^rest/user/$', 'rest_user'),
    
    # list all the repos
    url(r'^rest/repository/$', 'rest_repository'),
    
    # to delete an user
    url(r'^rest/user/(?P<username>.+)/$', 'rest_user_action'),
    
    # change admin password
    url(r'^rest/admin/$', 'rest_admin'),
    
    
    
    
    

)
