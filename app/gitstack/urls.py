from django.conf.urls.defaults import patterns, url
urlpatterns = patterns('gitstack.views',
    # standard user interface
    url(r'^$', 'index'),
    url(r'^users/', 'users'),
    url(r'^groups/', 'groups'),
    url(r'^repository/(?P<repo_name>.+)/permission/$', 'repository_permission'),
    # add users dialog
    url(r'^repository/(?P<repo_name>.+)/permission/adduser/$', 'add_repo_user_dialog'),
    url(r'^repository/(?P<repo_name>.+)/permission/addgroup/$', 'add_repo_group_dialog'),

    url(r'^group/(?P<group_name>.+)/user/$', 'group_user'),
    # add users dialog (for the group)
    url(r'^group/(?P<group_name>.+)/user/add/$', 'add_group_user_dialog'),
    
    # settings tab
    url(r'^settings/general/', 'settings_general'),
    url(r'^settings/authentication/', 'settings_authentication'),
    url(r'^settings/security/', 'settings_security'),

    url(r'^logout/', 'log_me_out'),

    

)
