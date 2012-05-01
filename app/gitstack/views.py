from django.shortcuts import render_to_response
from gitstack.models import Repository, UserApache, UserFactory, Group
from django.template import RequestContext
from django.contrib.auth.decorators import login_required
from django.contrib.auth import logout
from django.http import HttpResponseRedirect
from gitstack.helpers import UpgradeManager

# repositories section
@login_required
def index(request):
    # might be the first run of the app
    # check if the app need to be upgraded
    upgrade_manager = UpgradeManager()
    if upgrade_manager.is_first_install():
        upgrade_manager.proceed_first_setup()
        
    if upgrade_manager.need_upgrade():
        upgrade_manager.upgrade()
        
    return render_to_response('gitstack/index.html', context_instance=RequestContext(request))

# user management on a repository
@login_required
def repository_permission(request, repo_name):
    return render_to_response('gitstack/repository_permission.html', {'repo_name': repo_name }, context_instance=RequestContext(request))
    
@login_required
def group_user(request, group_name):
    return render_to_response('gitstack/group_user.html', {'group_name': group_name }, context_instance=RequestContext(request))
    
# add repo user dialog
def add_repo_user_dialog(request, repo_name):
    # retrieve all the users
    user_list = UserFactory.instantiate_user('').retrieve_all()
    # get the users already added to the repository
    repository = Repository(repo_name)
    repository_user_list = repository.user_list
    
    # substract the repository users from the user list
    for repository_user in repository_user_list:
        user_list.remove(repository_user)
    
    return render_to_response('gitstack/add_repo_user.html', {'repo_name': repo_name,
                                                              'user_list': user_list }, context_instance=RequestContext(request))

# add repo user dialog
def add_repo_group_dialog(request, repo_name):
    # retrieve all the users
    group_list = Group.retrieve_all()
    # get the users already added to the repository
    repository = Repository(repo_name)
    repository_group_list = repository.group_list
    
    # substract the repository groups from the group list
    for repository_group in repository_group_list:
        if repository_group in group_list:
            group_list.remove(repository_group)
    
    return render_to_response('gitstack/add_repo_group.html', {'repo_name': repo_name,
                                                              'group_list': group_list }, context_instance=RequestContext(request))


# add repo user dialog
def add_group_user_dialog(request, group_name):
    # retrieve all the users
    user_list = UserApache.retrieve_all()
    # get the users already added to the repository
    group = Group(group_name)
    group.load()
    group_user_list = group.member_list
    
        
    # substract the repository users from the user list
    for group_user in group_user_list:
        if group_user in user_list:
            user_list.remove(group_user)
    everyone = UserFactory.instantiate_user('everyone')
    user_list.remove(everyone)
    return render_to_response('gitstack/add_group_user.html', {'group_name': group_name,
                                                              'user_list': user_list }, context_instance=RequestContext(request))

# user management section
@login_required
def users(request):  
    return render_to_response('gitstack/users.html', context_instance=RequestContext(request))

# group management section
@login_required
def groups(request):  
    return render_to_response('gitstack/groups.html', context_instance=RequestContext(request))
   

# settings section
@login_required
def settings_general(request):    
    if request.method == 'GET':  
        # first visit on the settings page
        return render_to_response('gitstack/settings_general.html', context_instance=RequestContext(request))
    
@login_required
def settings_authentication(request):    
    if request.method == 'GET':  
        # first visit on the settings page
        return render_to_response('gitstack/settings_authentication.html', context_instance=RequestContext(request))
    
@login_required
def settings_security(request):    
    if request.method == 'GET':  
        # first visit on the settings page
        return render_to_response('gitstack/settings_security.html', context_instance=RequestContext(request))
    
def log_me_out(request):
    # logout the user
    logout(request)
    return HttpResponseRedirect('/gitstack/')
    

        
    
