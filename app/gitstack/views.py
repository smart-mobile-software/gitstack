from django.shortcuts import render_to_response
from gitstack.models import Repository, User
from django.template import RequestContext
from django.contrib.auth.decorators import login_required


# repositories section
@login_required
def index(request):
    return render_to_response('gitstack/index.html', context_instance=RequestContext(request))
    


# user management on a repository
@login_required
def repository_user(request, repo_name):
        return render_to_response('gitstack/repository_user.html', {'repo_name': repo_name }, context_instance=RequestContext(request))
    
# add repo user dialog
def add_repo_user_dialog(request, repo_name):
    # retrieve all the users
    user_list = User.retrieve_all()
    # get the users already added to the repository
    repository = Repository(repo_name)
    repository_user_list = repository.user_list
    
    # substract the repository users from the user list
    for repository_user in repository_user_list:
        user_list.remove(repository_user)
    
    return render_to_response('gitstack/add_repo_user.html', {'repo_name': repo_name,
                                                              'user_list': user_list }, context_instance=RequestContext(request))

# user management section
@login_required
def users(request):  
    return render_to_response('gitstack/users.html', context_instance=RequestContext(request))
   

# settings section
@login_required
def settings(request):    
    if request.method == 'GET':  
        # first visit on the settings page
        return render_to_response('gitstack/settings.html', context_instance=RequestContext(request))
        
    
