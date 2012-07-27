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
			
			// When a character is entered in the input form
			$("#filter-user").keyup(function(){
				// Retrieve the input field text and reset the count to zero
				var filter = $(this).val(), count = 0;
				
				// Loop through the comment list
				$("li.user-item").each(function(){
				
					// If the list item does not contain the text phrase fade it out
					if ($(this).text().search(new RegExp(filter, "i")) < 0) {
						$(this).fadeOut();
						
					// Show the list item if the phrase matches and increase the count by 1
					} else {
						$(this).show();
						count++;
					}
				});
				
				// Update the count
				var numberItems = count;
				//$("#filter-count").text("Number of Comments = "+count);
			});

		});
		
		$('#addRepoUserDialog').dialog({
			title: 'Add user',
			buttons: {
				// add the users to the repo
				Add: function() {
					var nbSelectedUsers = $( ".ui-selected", this ).length;
					
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
					
					// Refresh the user list after then end of all the requests
					$('#addRepoUserDialog').ajaxStop(function(){
						console.log("ajaxstop");
						$(this).unbind("ajaxStop");
						refreshRepoUserList();
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
		// get the repository info
		var url = '/rest/repository/' + $('#currentRepo').html() + '/';
		$.get(url, function(repoInfo){
			var userList = repoInfo.user_list;
			var readList = repoInfo.user_read_list;
			var writeList = repoInfo.user_write_list;
			var hasReadRight;
			var hasWriteRight;
			var textToInsert;

			var k,j;
			
			$('#repoUserList').empty();
				
			// for each user
			for(var i = 0; i < userList.length; i++){
				// check if user is in read list
				hasReadRight = false;
				// if user is "everyone"
				if (userList[i].username === "everyone"){
					// set read only permissions
					hasReadRight = true;
					hasWriteRight = false;
				} else {
				
					for(k = 0; k < readList.length; k++){
						// if the user is in the list
						if (readList[k].username === userList[i].username){
							// user has read rights
							hasReadRight = true;
						}
					}

					// check if user is in write list
					hasWriteRight = false;
					for(k = 0; k < writeList.length; k++){
						// if the user is in the list
						if (writeList[k].username === userList[i].username){
							// user has read rights
							hasWriteRight = true;
						}
					}
				}
				
				// display line about the user
				j = 0;
				textToInsert = [];
				textToInsert[j++] = '<tr class=' + userList[i].username + '>';
				textToInsert[j++] = '<td>' + userList[i].username + '</td>\n';
				// if user is everyone
				if(userList[i].username == 'everyone'){
					// read only permissions
					textToInsert[j++] = '<td><input class="" type="checkbox" checked="checked" disabled="disabled" /></td>\n';
					textToInsert[j++] = '<td><input class="" type="checkbox" disabled="disabled" /></td>\n';


				} else {
					if(hasReadRight === true)
						textToInsert[j++] = '<td><input class="readRepoUser permissionsUser" type="checkbox" checked="checked" /></td>\n';
					else
						textToInsert[j++] = '<td><input class="readRepoUser permissionsUser" type="checkbox" /></td>\n';
					
					
					if(hasWriteRight === true)
						textToInsert[j++] = '<td><input class="writeRepoUser permissionsUser" type="checkbox" checked="checked" /></td>\n';
					else
						textToInsert[j++] = '<td><input class="writeRepoUser permissionsUser" type="checkbox" /></td>\n';
				}
				
				textToInsert[j++] = '<td><!-- Icons -->';
				textToInsert[j++] = '<a class="deleteRepoUser" href="#" title="Delete"><img src="/static/images/icons/cross.png" alt="Delete" /></a>';
				textToInsert[j++] = '</td>';
				textToInsert[j++] = '</tr>\n';

				$('#repoUserList').append(textToInsert.join(''));
				
				
				
			}
			// register the new elements events
			bindRepoUserBehaviors();


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