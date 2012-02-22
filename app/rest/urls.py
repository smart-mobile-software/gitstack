from django.conf.urls.defaults import patterns, url


urlpatterns = patterns('rest.views',
    
    # rest stuff
    # Add/Remove users on a repository
    url(r'^repository/(?P<repo_name>.+)/user/(?P<username>.+)/$', 'rest_repo_user'),
    # Get all the users on a specific repository
    url(r'^repository/(?P<repo_name>.+)/user/$', 'rest_repo_user_all'),
    
    # to delete a repository
    url(r'^repository/(?P<repo_name>.+)/$', 'rest_repo_action'),
    url(r'^user/$', 'rest_user'),

    
    # list all the repos
    url(r'^repository/$', 'rest_repository'),
    
    # to delete an user
    url(r'^user/(?P<username>.+)/$', 'rest_user_action'),
    
    # change admin password
    url(r'^admin/$', 'rest_admin'),
    
    
    
    
    

)
