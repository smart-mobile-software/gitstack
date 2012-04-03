///////////////////////
// User management
///////////////////////

$(document).ready(function(){
	$.ajaxSetup ({     
		// Disable caching of AJAX responses    
		cache: false
	}); 
	// get the list of all users
	var refreshUserList = function(){
		$.get('/rest/user/', function(userList){
			$("#userList").html('');
			var i = 0;
			var j = 0
			var textToInsert = [];
			for(i; i < userList.length; i++){
				if(userList[i] !== 'everyone'){
				textToInsert[j++] = '<tr class=' + userList[i] + '>';
				textToInsert[j++] = '<td>' + userList[i] + '</td>\n';
				textToInsert[j++] = '<td><!-- Icons --><a href="#" class="editUser" title="Change password"><img src="/static/images/icons/pencil.png" alt="Edit" /></a><a class="deleteUser" href="#" title="Delete"><img src="/static/images/icons/cross.png" alt="Delete" /></a></td>';
				textToInsert[j++] = '</tr>';	
				}				
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