from django.conf.urls.defaults import patterns, url


urlpatterns = patterns('rest.views',
    
    # rest stuff
    # Add/Remove users on a repository
    url(r'^repository/(?P<repo_name>.+)/user/(?P<username>.+)/$', 'rest_repo_user'),
    # Add/Remove groups on a repository
    url(r'^repository/(?P<repo_name>.+)/group/(?P<group_name>.+)/$', 'rest_repo_group'),
    
    # Get all the users on a specific repository
    url(r'^repository/(?P<repo_name>.+)/user/$', 'rest_repo_user_all'),
    # Get all the grops on a specific repository
    url(r'^repository/(?P<repo_name>.+)/group/$', 'rest_repo_group_all'),
    
    # Add/Remove users on a group
    url(r'^group/(?P<group_name>.+)/user/(?P<username>.+)/$', 'rest_group_user'),
    # Get all the users on a specific group
    url(r'^group/(?P<group_name>.+)/user/$', 'rest_group_user_all'),
        
    # to delete a repository
    url(r'^repository/(?P<repo_name>.+)/$', 'rest_repo_action'),
    
    # user management
    url(r'^user/$', 'rest_user'),
    # to delete an user
    url(r'^user/(?P<username>.+)/$', 'rest_user_action'),
    
    # group management
    url(r'^group/$', 'rest_group'),
    # to delete a group
    url(r'^group/(?P<name>.+)/$', 'rest_group_action'),
    
    
        
        
    # list all the repos
    url(r'^repository/$', 'rest_repository'),
    
    
    
    # change admin password
    url(r'^admin/$', 'rest_admin'),
    # enable/disable web interface
    url(r'^webinterface/$', 'webinterface'),
    
    # ldap auth settings
    # test settings
    url(r'^settings/authentication/ldap/test/$', 'rest_settings_authentication_ldap_test'),
    # sync
    url(r'^settings/authentication/ldap/sync/$', 'rest_settings_authentication_ldap_sync'),

    url(r'^settings/authentication/$', 'rest_settings_authentication'),
    
    
    
    
    

)
