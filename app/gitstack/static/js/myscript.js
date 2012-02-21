$(document).ready(function(){
	$.ajaxSetup ({     
		// Disable caching of AJAX responses    
		cache: false
	}); 
	
	//////////////////////////////////////////////////////
	// Repository management
	///////////////////////////////////////////////////
	
	
	// get the list of all repositories
	var refreshRepoList = function(){
		$.get('/rest/repository/', function(repoList){
			$("#repoList").html('');
			var i = 0;
			var j = 0
			var textToInsert = [];
			for(i; i < repoList.length; i++){
				textToInsert[j++] = '<tr class=' + repoList[i] + '>';
				textToInsert[j++] = '<td>' + repoList[i] + '</td>\n';
				textToInsert[j++] = '<td>git clone http://localhost/' + repoList[i] + '.git</td>\n';
				textToInsert[j++] = '<td><!-- Icons -->';
				textToInsert[j++] = '<a href="/gitphp/index.php?p=' + repoList[i] + '.git&a=summary" title="Browse"><img src="/static/images/icons/magnifier.png" alt="Browse" /></a>';
				textToInsert[j++] = '<a href="/gitstack/repository/' + repoList[i] + '/user/" class="editUsers" title="Users"><img src="/static/images/icons/users.png" alt="Users" /></a>';
				textToInsert[j++] = '<a class="deleteRepo" href="#" title="Delete"><img src="/static/images/icons/cross.png" alt="Delete" /></a>';
				textToInsert[j++] = '</td>';
				textToInsert[j++] = '</tr>\n';			
			}
			
			// if no repository
			if ( repoList.length === 0){
				// print a nice message
				$('#repoList').append("<td>You have not added any repository yet. You can create a new repository by using the create repository form below.</td><td></td><td></td>");
			}
			
			$('#repoList').append(textToInsert.join(''));
			// register the new elements
			bindRepoBehaviors();
		}, "json");
	};
	
	refreshRepoList();
	
	$("#btnDelete").click(function(event){
		// perform the request to delete the user
		$.ajax({
			url: '/rest/repository/test25/',
			type: 'DELETE',
			success: function(data) {
				// user successfully delete
				showMessage("success", data);
				refreshRepoList();
			},
			error: function(error) {
				showMessage("error", error.responseText);
			}
		});
	});
	
	$("#btnCreateRepo").click(function(event){
		// get the repository name
		var repoName = $("#txtRepoName").val();
		var csrf = $('input[name="csrfmiddlewaretoken"]').val();
		// Create
		$.post("/rest/repository/", { name: repoName, csrfmiddlewaretoken: csrf} )
		.success(function() {
			$('#successMessageBox').show();
			$('#successMessage').html('The repository has been successfully created').show();
			
			$('#errorMessageBox').hide();
			refreshRepoList();
		})
		.error(function(error) {
			$('#successMessageBox').hide();
			$('#errorMessageBox').show();
			$('#errorMessage').html(error.responseText);
		});
	});
	
	var bindRepoBehaviors = function() {
		// Delete a specified repo
		$(".deleteRepo").click(function(event){
			var reponame = $(this).closest("tr").attr("class");
			// delete the repo
			// configure confirm delete dialog
			var $dialog = $('<div></div>')
				.html('<br />Would you like to delete ' + reponame + ' ?')
				.dialog({
					autoOpen: false,
					title: 'Delete ' + reponame,
					modal: true,
					height:140,
					buttons: {
						// delete function
						Delete: function() {
							// perform the request to delete the repo
							$.ajax({
								url: '/rest/repository/' + reponame + '/',
								type: 'DELETE',
								success: function(data) {
									// repo successfully delete
									showMessage("success", data);
									refreshRepoList();
								},
								error: function(error) {
									showMessage("error", error.responseText);
								}
							});
							$( this ).dialog( "close" );
						},
						// Abord function
						Cancel: function() {
							$( this ).dialog( "close" );
						}
					}
				});
				
			$dialog.dialog('open');
			// prevent the default action, e.g., following a link
			return false;
			
			
		});
	};
	
	// register the actions
	bindRepoBehaviors();
	
	/////////////////////////////////////////
	// Repository user management
	/////////////////////////////////////////
	
	$('#addRepoUser').button();
	
	$('#addRepoUser').click(function() { 
		// show the dialog
		$('#addRepoUserDialog').load('add/', function() {
			// make the list selectable
			$( "#addRepoUserList" ).selectable();

		});
		$('#addRepoUserDialog').dialog({
			title: 'Add user',
			buttons: {
				// add the users to the repo
				Add: function() {
					var selectedUsers = [];
					
					$( ".ui-selected", this ).each(function() {
						// add each user to the repository
						// retrieve the current repository name
						var url = '/rest/repository/' + $('#currentRepo').html() + '/user/' + $(this).text() + '/';
						$.post(url, function(data) {
							showMessage("success", "Changes successfully saved");
							refreshRepoUserList();
						}).error(function(error) {
							showMessage("error", error.responseText);
						});
						
					});
					
					
					$( this ).dialog( "close" );
				},
				Cancel: function() {
					$( this ).dialog( "close" );
				}
			}
		});
	});
	
	// get the list of all the users added to the repository
	var refreshRepoUserList = function(){
		var url = '/rest/repository/' + $('#currentRepo').html() + '/user/';
		$.get(url, function(repoUserList){
			$("#repoUserList").html('');
			var i = 0;
			var j = 0
			var textToInsert = [];
			for(i; i < repoUserList.length; i++){
				textToInsert[j++] = '<tr class=' + repoUserList[i] + '>';
				textToInsert[j++] = '<td>' + repoUserList[i] + '</td>\n';
				textToInsert[j++] = '<td>Read/Write</td>\n';
				textToInsert[j++] = '<td><!-- Icons -->';
				textToInsert[j++] = '<a class="deleteRepoUser" href="#" title="Delete"><img src="/static/images/icons/cross.png" alt="Delete" /></a>';
				textToInsert[j++] = '</td>';
				textToInsert[j++] = '</tr>\n';			
			}
			
			// if no user in the repo
			if ( repoUserList.length === 0){
				// print a nice message
				$('#repoUserList').append("<td>You have not added any user yet</td><td></td><td></td>");
			}
			$('#repoUserList').append(textToInsert.join(''));
			// register the new elements
			bindRepoUserBehaviors();
		}, "json");
	};
	
	var bindRepoUserBehaviors = function() {
		// Delete a specified user
		$(".deleteRepoUser").click(function(event){
			var username = $(this).closest("tr").attr("class");
			// perform the request to delete the user
			var url = '/rest/repository/' + $('#currentRepo').html() + '/user/' + username + '/';
			$.ajax({
				url: url,
				type: 'DELETE',
				success: function(data) {
					// user successfully delete
					showMessage("success", data);
					refreshRepoUserList();
				},
				error: function(error) {
					alert(error.responseText);
				}
			});
		});
	};
	
	refreshRepoUserList();
	///////////////////////
	// User management
	///////////////////////
	
	
	// get the list of all users
	var refreshUserList = function(){
		$.get('/rest/user/', function(userList){
			$("#userList").html('');
			var i = 0;
			var j = 0
			var textToInsert = [];
			for(i; i < userList.length; i++){
				textToInsert[j++] = '<tr class=' + userList[i] + '>';
				textToInsert[j++] = '<td>' + userList[i] + '</td>\n';
				textToInsert[j++] = '<td><!-- Icons --><a href="#" class="editUser" title="Change password"><img src="/static/images/icons/pencil.png" alt="Edit" /></a><a class="deleteUser" href="#" title="Delete"><img src="/static/images/icons/cross.png" alt="Delete" /></a></td>';
				textToInsert[j++] = '</tr>';			
			}
			$('#userList').append(textToInsert.join(''));

			bindUserBehaviors();
			
		}, "json");
	};
	
	refreshUserList();
	
	
	var bindUserBehaviors = function() {
		// Delete a specified user
		$(".deleteUser").click(function(event){
			var username = $(this).closest("tr").attr("class");
			// delete the user
			// configure confirm delete dialog
			var $dialog = $('<div></div>')
				.html('<br />Would you like to delete ' + username + ' ?')
				.dialog({
					autoOpen: false,
					title: 'Delete ' + username,
					modal: true,
					height:140,
					buttons: {
						// delete function
						Delete: function() {
							// perform the request to delete the user
							$.ajax({
								url: '/rest/user/' + username + '/',
								type: 'DELETE',
								success: function(data) {
									// user successfully delete
									showMessage("success", data);
									setTimeout(refreshUserList,500)
								},
								error: function(error) {
									alert(error.responseText);
								}
							});
							$( this ).dialog( "close" );
						},
						// Abord function
						Cancel: function() {
							$( this ).dialog( "close" );
						}
					}
				});
				
			$dialog.dialog('open');
			// prevent the default action, e.g., following a link
			return false;
			
			
		});
		
		// edit user button
		$(".editUser").click(function(event){
			// retrive the username
			var username = $(this).closest("tr").attr("class");
			// show the dialog
			$('#editDialog').load('/static/dialogs/edit-user.html');
			$('#editDialog').dialog({
				title: 'Edit ' + username + ' password',
				buttons: {
					Save: function() {
						// retrieve the entered password
						var password = $('#txtPassword1').val();
						var password2 = $('#txtPassword2').val();
						
						// check if the password are the same
						if(password === password2){
							// proceed to the update
							$.ajax({
								url: '/rest/user/',
								type: 'PUT',
								contentType: 'application/json',
								data: '{"username": "' + username + '","password": "' + password + '"}',
								success: function(data) {
									showMessage("success", data);
								},
								error: function(error) {
									showMessage("error", error.responseText);
								}
							});
							$( this ).dialog( "close" );
						} else {
							// display an error message
							alert('Both passwords should be the same');
						}
						
						
					},
					Cancel: function() {
						$( this ).dialog( "close" );
					}
				}
			});

		});
	 }
	 
	 bindUserBehaviors();
	
		
	
	$("#btnCreateUser").click(function(event){
		// get the repository name
		var username = $("#txtUsername").val();
		var password = $("#txtPassword").val();
		
		// Check the length of the password
		if(password.length == 0)
			showMessage("error", "The password should not be empty");
		else {
			var csrf = $('input[name="csrfmiddlewaretoken"]').val();
			// Create
			$.post("/rest/user/", { username: username, password : password, csrfmiddlewaretoken: csrf} )
			.success(function() {
				showMessage("success", 'The user has been successfully created');
				setTimeout(refreshUserList,500)

				//refreshUserList();
			})
			.error(function(error) {
				showMessage("error", error.responseText);
			});
		}
	});
	
	/////////////////////////////////
	// Administrator password change
	////////////////////////////////
	$("#setNewAdminPassword").click(function(event){
		// the form info
		var old_password = $("#txtOldPassword").val();
		var new_password1 = $("#txtNewPassword1").val();
		var new_password2 = $("#txtNewPassword2").val();
		
		// Check if both new passwords are the same
		if(new_password1 === new_password2){
			// passwords are the same
			// Call the rest interface to change the admin password
			// proceed to the update
			$.ajax({
				url: '/rest/admin/',
				type: 'PUT',
				contentType: 'application/json',
				data: '{"oldPassword": "' + old_password + '","newPassword": "' + new_password1 + '"}',
				success: function(data) {
					showMessage("success", data);
				},
				error: function(error) {
					showMessage("error", error.responseText);
				}
			});
		} else {
			showMessage("error", 'New passwords fields are not the same');
		}

	
	});
	
	
	/////////////////////////////////
	// Handle notifications 
	///////////////////////////////
	var showMessage = function (messageType, messageText) {
		// Success message
		if(messageType == "success"){
			$('#successMessageBox').show();
			$('#successMessage').html(messageText).show();
			$('#errorMessageBox').hide();
		// error message
		} else if (messageType == "error"){
			$('#successMessageBox').hide();
			$('#errorMessageBox').show();
			$('#errorMessage').html(messageText);
		}
			
	}
});