/////////////////////////////////////////
// Repository user management
/////////////////////////////////////////
$(document).ready(function(){

	$.ajaxSetup ({     
		// Disable caching of AJAX responses    
		cache: false
	}); 
	
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
						}).error(function(error) {
							showMessage("error", error.responseText);
						});
						
					});
					
					refreshRepoUserList();
					
					
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
			//var j = 0
			var textToInsert = [];
		
			for(i; i < repoUserList.length; i++){
				// Get permissions for each user
				var url = '/rest/repository/' + $('#currentRepo').html() + '/user/' + repoUserList[i] + '/';
				$.ajax({
					url: url,
					context: repoUserList[i],
					type: "GET",
					dataType: "json",
					success: function(permissions){
						var j = 0;
						textToInsert[j++] = '<tr class=' + this + '>';
						textToInsert[j++] = '<td>' + this + '</td>\n';
						if(permissions['read'] === true)
							textToInsert[j++] = '<td><input class="readRepoUser permissionsUser" type="checkbox" checked="checked" /></td>\n';
						else
							textToInsert[j++] = '<td><input class="readRepoUser permissionsUser" type="checkbox" /></td>\n';
						if(permissions['write'] === true)
							textToInsert[j++] = '<td><input class="writeRepoUser permissionsUser" type="checkbox" checked="checked" /></td>\n';
						else
							textToInsert[j++] = '<td><input class="writeRepoUser permissionsUser" type="checkbox" /></td>\n';
						textToInsert[j++] = '<td><!-- Icons -->';
						textToInsert[j++] = '<a class="deleteRepoUser" href="#" title="Delete"><img src="/static/images/icons/cross.png" alt="Delete" /></a>';
						textToInsert[j++] = '</td>';
						textToInsert[j++] = '</tr>\n';

						$('#repoUserList').append(textToInsert.join(''));
						// register the new elements
						bindRepoUserBehaviors();
					},
					
				});
				
			}
			
			// if no user in the repo
			if ( repoUserList.length === 0){
				// print a nice message
				$('#repoUserList').append("<td>You have not added any user yet</td><td></td><td></td><td></td>");
			}
		}, "json");
	};
	
	var bindRepoUserBehaviors = function() {
		$(".deleteRepoUser").unbind('click');
		$(".permissionsUser").unbind('click');

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
		
		// Delete a specified user
		$(".permissionsUser").click(function(event){
			// Get the checkbox
			// Get the username
			var username = $(this).closest("tr").attr("class");
			// Check if read or write checkbox
			var isRead = false;
			if($(this).closest("input").hasClass('readRepoUser') === true)
				isRead = true;

				
			var isChecked = false;
			// Check current status of the checkbox
			if($(this).closest("input").attr("checked"))
				isChecked = true;
				
			// Perform the request to update the user
			var data = '';
			if(isRead === true)
				data = '{"read": ' + isChecked +'}';
			else
				data = '{"write": ' + isChecked +'}';

			var url = '/rest/repository/' + $('#currentRepo').html() + '/user/' + username + '/';
			$.ajax({
				url: url,
				type: 'PUT',
				contentType: 'application/json',
				data: data,
				success: function(data) {
					showMessage("success", data);
				},
				error: function(error) {
					showMessage("error", error.responseText);
				}
			});
						
		});
	};
	
	refreshRepoUserList();
	
	
	
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