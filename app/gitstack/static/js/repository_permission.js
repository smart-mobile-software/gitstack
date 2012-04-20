/////////////////////////////////////////
// Repository permission management
/////////////////////////////////////////
$(document).ready(function(){

	$.ajaxSetup ({     
		// Disable caching of AJAX responses    
		cache: false
	}); 
	
	function hideApacheGroupOnLdap(){
		// check if ldap is activated or not 
   
	    $.ajax({
			url: '/rest/settings/authentication/',
			type: "GET",
			dataType: "json",
			success: function(settings){
				if (settings['authMethod'] === 'file'){
					// show users and groups menu
					$('#repositoryGroupBox').show();

				} else if (settings['authMethod'] === 'ldap'){
					// hide users and groups menu

					$('#repositoryGroupBox').hide();

					
				}
				
				
			},
			
		});
	}
	
	hideApacheGroupOnLdap();

	
	/////////////////////////////////
	// User management
	//////////////////////////////
	
	$('#addRepoUser').button();
	
	$('#addRepoUser').click(function() { 
		// show the dialog
		$('#addRepoUserDialog').load('adduser/', function() {
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
						// if user is everyone
						if(this == 'everyone'){
							// read only permissions
							textToInsert[j++] = '<td><input class="" type="checkbox" checked="checked" disabled="disabled" /></td>\n';
							textToInsert[j++] = '<td><input class="" type="checkbox" disabled="disabled" /></td>\n';


						} else {
							if(permissions['read'] === true)
								textToInsert[j++] = '<td><input class="readRepoUser permissionsUser" type="checkbox" checked="checked" /></td>\n';
							else
								textToInsert[j++] = '<td><input class="readRepoUser permissionsUser" type="checkbox" /></td>\n';
							
							
							if(permissions['write'] === true)
								textToInsert[j++] = '<td><input class="writeRepoUser permissionsUser" type="checkbox" checked="checked" /></td>\n';
							else
								textToInsert[j++] = '<td><input class="writeRepoUser permissionsUser" type="checkbox" /></td>\n';
						}
						
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
	
	///////////////////////////////////
	// Group management
	////////////////////////////////
	$('#addRepoGroup').button();
	
	
	$('#addRepoGroup').click(function() { 
		// show the dialog
		$('#addRepoGroupDialog').load('addgroup/', function() {
			// make the list selectable
			$( "#addRepoGroupList" ).selectable();

		});
		$('#addRepoGroupDialog').dialog({
			title: 'Add group',
			buttons: {
				// add the groups to the repo
				Add: function() {
					var selectedGroups = [];
					
					$( ".ui-selected", this ).each(function() {
						// add each group to the repository
						// retrieve the current repository name
						var url = '/rest/repository/' + $('#currentRepo').html() + '/group/' + $(this).text() + '/';
						$.post(url, function(data) {
							showMessage("success", "Changes successfully saved");
						}).error(function(error) {
							showMessage("error", error.responseText);
						});
						
					});
					
					refreshRepoGroupList();
					
					
					$( this ).dialog( "close" );
				},
				Cancel: function() {
					$( this ).dialog( "close" );
				}
			}
		});
	});

	// get the list of all the groups added to the repository
	var refreshRepoGroupList = function(){
		var url = '/rest/repository/' + $('#currentRepo').html() + '/group/';
		$.get(url, function(repoGroupList){
			$("#repoGroupList").html('');
			var i = 0;
			//var j = 0
			var textToInsert = [];
		
			for(i; i < repoGroupList.length; i++){
				// Get permissions for each group
				var url = '/rest/repository/' + $('#currentRepo').html() + '/group/' + repoGroupList[i] + '/';
				$.ajax({
					url: url,
					context: repoGroupList[i],
					type: "GET",
					dataType: "json",
					success: function(permissions){
						var j = 0;
						textToInsert[j++] = '<tr class=' + this + '>';
						textToInsert[j++] = '<td>' + this + '</td>\n';
			

						if(permissions['read'] === true)
							textToInsert[j++] = '<td><input class="readRepoGroup permissionsGroup" type="checkbox" checked="checked" /></td>\n';
						else
							textToInsert[j++] = '<td><input class="readRepoGroup permissionsGroup" type="checkbox" /></td>\n';
						
						
						if(permissions['write'] === true)
							textToInsert[j++] = '<td><input class="writeRepoGroup permissionsGroup" type="checkbox" checked="checked" /></td>\n';
						else
							textToInsert[j++] = '<td><input class="writeRepoGroup permissionsGroup" type="checkbox" /></td>\n';
					
						
						textToInsert[j++] = '<td><!-- Icons -->';
						textToInsert[j++] = '<a class="deleteRepoGroup" href="#" title="Delete"><img src="/static/images/icons/cross.png" alt="Delete" /></a>';
						textToInsert[j++] = '</td>';
						textToInsert[j++] = '</tr>\n';

						$('#repoGroupList').append(textToInsert.join(''));
						// register the new elements
						bindRepoGroupBehaviors();
					},
					
				});
				
			}
			
			// if no group in the repo
			if ( repoGroupList.length === 0){
				// print a nice message
				$('#repoGroupList').append("<td>You have not added any group yet</td><td></td><td></td><td></td>");
			}
		}, "json");
	};
	
	refreshRepoGroupList();
	
	var bindRepoGroupBehaviors = function() {
		$(".deleteRepoGroup").unbind('click');
		$(".permissionsGroup").unbind('click');

		// Delete a specified group
		$(".deleteRepoGroup").click(function(event){
			var groupname = $(this).closest("tr").attr("class");
			// perform the request to delete the group
			var url = '/rest/repository/' + $('#currentRepo').html() + '/group/' + groupname + '/';
			$.ajax({
				url: url,
				type: 'DELETE',
				success: function(data) {
					// group successfully delete
					showMessage("success", data);
					refreshRepoGroupList();
				},
				error: function(error) {
					alert(error.responseText);
				}
			});
		});
		
		// Delete a specified group
		$(".permissionsGroup").click(function(event){
			// Get the checkbox
			// Get the groupname
			var groupname = $(this).closest("tr").attr("class");
			// Check if read or write checkbox
			var isRead = false;
			if($(this).closest("input").hasClass('readRepoGroup') === true)
				isRead = true;

				
			var isChecked = false;
			// Check current status of the checkbox
			if($(this).closest("input").attr("checked"))
				isChecked = true;
				
			// Perform the request to update the group
			var data = '';
			if(isRead === true)
				data = '{"read": ' + isChecked +'}';
			else
				data = '{"write": ' + isChecked +'}';

			var url = '/rest/repository/' + $('#currentRepo').html() + '/group/' + groupname + '/';
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