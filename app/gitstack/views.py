from django.http import HttpResponse, HttpResponseServerError
from django.shortcuts import render_to_response
from gitstack.models import Repository, User
from django.template import RequestContext
from django.views.decorators.csrf import csrf_exempt
from django.contrib.auth.decorators import login_required
from django.contrib import messages


import json

# repositories section
@login_required
def index(request):
    return render_to_response('gitstack/index.html', context_instance=RequestContext(request))
    


# user management on a repository
def repository_user(request, repo_name):
        return render_to_response('gitstack/repository_user.html', {'repo_name': repo_name }, context_instance=RequestContext(request))
    
# add repo user dialog
def add_repo_user_dialog(request, repo_name):
    # retrieve all the users
    user_list = User.retrieve_all()
    # get the users already added to the repository
    repository = Repository(repo_name)
    repository_user_list = repository.retrieve_all_users()
    
    # substract the repository users from the user list
    for repository_user in repository_user_list:
        user_list.remove(repository_user)
    
    return render_to_response('gitstack/add_repo_user.html', {'repo_name': repo_name,
                                                              'user_list': user_list }, context_instance=RequestContext(request))

# user management section
def users(request):  
    return render_to_response('gitstack/users.html', context_instance=RequestContext(request))
   

# settings section
def settings(request):    
    if request.method == 'GET':  
        # first visit on the settings page
        return render_to_response('gitstack/settings.html', context_instance=RequestContext(request))
        
    if request.method == 'POST':
        # try to set the new password to the admin
        # retrieve the form values
        old_password = request.POST['txtOldPassword']
        new_password1 = request.POST['txtNewPassword1']
        new_password2 = request.POST['txtNewPassword2']
        messages.info(request, 'Good try.')

        return render_to_response('gitstack/settings.html', context_instance=RequestContext(request))
        # check if the two new password are the same
        
        

        return HttpResponse("grrr")

# user rest api
@csrf_exempt
def rest_user(request):
    try:
        # create user
        if request.method == 'POST':
            # get the username/password from the request
            username = request.POST['username']
            password = request.POST['password']
            user = User(username, password)
            user.create()
            return HttpResponse("User created")
        # get retrieve_all the users
        if request.method == 'GET':
            users_name = User.retrieve_all()
            json_reply = json.dumps(users_name)
            return HttpResponse(json_reply)
        # update the user
        if request.method == 'PUT':
            # retrieve the credentials from the json
            credentials = json.loads(request.raw_post_data)
            # create an instance of the user and update it
            user = User(credentials['username'], credentials['password'])
            user.update()
            return HttpResponse("User successfully updated")
        # delete the user
        if request.method == 'DELETE':
            # retrieve the username from the json
            credentials = json.loads(request.raw_post_data)
            user = User(credentials['username'], "")
            # delete the user
            user.delete()
            return HttpResponse(user.username + " has been deleted")
            
    except Exception as e:
        return HttpResponseServerError(e)



def rest_user_action(request, username):
    try:
        if request.method == 'DELETE':
            # retrieve the username from the json
            user = User(username, "")
            # delete the user
            user.delete()
            return HttpResponse(user.username + " has been deleted")
    except Exception as e:
        return HttpResponseServerError(e)


# create a repository
def rest_repository(request):
    # Add new repository
    if request.method == 'POST':
        name=request.POST['name']
        try:
            # create the repo
            repository = Repository(name)
            repository.create()
        except WindowsError as e:
            return HttpResponseServerError(e.strerror)
        except Exception as e:
            return HttpResponseServerError(e)
        
        return HttpResponse("The repository has been successfully created")
    # List retrieve_all repositories
    if request.method == 'GET':
        try:
            # change to the repository directory
            repositories = Repository.retrieve_all()
            # remove the .git at the end
            repositories_name = map(lambda foo: foo.__unicode__(), repositories)
            json_reply = json.dumps(repositories_name)
            return HttpResponse(json_reply)
        except WindowsError as e:
            return HttpResponseServerError(e.strerror)
        

# delete a repository
def rest_repo_action(request, repo_name):
    try:
        if request.method == 'DELETE':
            repo = Repository(repo_name)
            # delete the repo
            repo.delete()
            return HttpResponse(repo.name + " has been deleted")
    except Exception as e:
        return HttpResponseServerError(e)

# Add/Remove users on a repository
@csrf_exempt
def rest_repo_user(request, repo_name, username):
    # Add user
    if request.method == 'POST':
        # Get the repository and add the user
        repo = Repository(repo_name)
        repo.add_user(username)
        return HttpResponse("User " + username + " added to " + repo_name)
    if request.method == 'DELETE':
        # Remove the user from the repository
        repo = Repository(repo_name)
        repo.remove_user(username)
        return HttpResponse("User " + username + " deleted from " + repo_name)



# Get all the users on a specific repository
@csrf_exempt
def rest_repo_user_all(request, repo_name):
    # Get the repository and add the user
    repo = Repository(repo_name)
    json_reply = json.dumps(repo.retrieve_all_users())
    return HttpResponse(json_reply)
    


