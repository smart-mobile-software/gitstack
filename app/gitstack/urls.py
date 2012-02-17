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
  

)
