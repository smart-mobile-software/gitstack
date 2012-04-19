/////////////////////////////////////////
// Group user management
/////////////////////////////////////////
$(document).ready(function(){

	$.ajaxSetup ({     
		// Disable caching of AJAX responses    
		cache: false
	}); 
	
	$('#addGroupUser').button();
	
	$('#addGroupUser').click(function() { 
		// show the dialog
		$('#addGroupUserDialog').load('add/', function() {
			// make the list selectable
			$( "#addGroupUserList" ).selectable();

		});
		
		$('#addGroupUserDialog').dialog({
			title: 'Add user',
			buttons: {
				// add the users to the group
				Add: function() {
					var selectedUsers = [];
					
					$( ".ui-selected", this ).each(function() {
						// add each user to the group
						// retrieve the current group name
						var url = '/rest/group/' + $('#currentGroup').html() + '/user/' + $(this).text() + '/';
						$.post(url, function(data) {
							showMessage("success", "Changes successfully saved");
						}).error(function(error) {
							showMessage("error", error.responseText);
						});
						
					});
					
					refreshGroupUserList();
					
					
					$( this ).dialog( "close" );
				},
				Cancel: function() {
					$( this ).dialog( "close" );
				}
			}
		});
	});
	
	// get the list of all the users added to the group
	var refreshGroupUserList = function(){
		var url = '/rest/group/' + $('#currentGroup').html() + '/user/';
		$.get(url, function(groupUserList){
			$("#groupUserList").html('');
			var i = 0;
			//var j = 0
			var textToInsert = [];
					
			// for each group member
			for(i; i < groupUserList.length; i++){
				var j = 0;
				textToInsert[j++] = '<tr class=' + groupUserList[i] + '>';
				textToInsert[j++] = '<td>' + groupUserList[i] + '</td>\n';
				textToInsert[j++] = '<td><a class="deleteGroupUser" href="#" title="Delete"><img src="/static/images/icons/cross.png" alt="Delete" /></a></td>';
				textToInsert[j++] = '</tr>\n';

				$('#groupUserList').append(textToInsert.join(''));
				// register the new elements
				bindGroupUserBehaviors();
				
			}
			
			// if no user in the group
			if ( groupUserList.length === 0){
				// print a nice message
				$('#groupUserList').append("<td>You have not added any user yet</td><td></td><td></td><td></td>");
			}
		}, "json");
	};
	
	var bindGroupUserBehaviors = function() {
		$(".deleteGroupUser").unbind('click');

		// Delete a specified user
		$(".deleteGroupUser").click(function(event){
			var username = $(this).closest("tr").attr("class");
			// perform the request to delete the user
			var url = '/rest/group/' + $('#currentGroup').html() + '/user/' + username + '/';
			$.ajax({
				url: url,
				type: 'DELETE',
				success: function(data) {
					// user successfully delete
					showMessage("success", data);
					refreshGroupUserList();
				},
				error: function(error) {
					alert(error.responseText);
				}
			});
		});
		
	};
	
	refreshGroupUserList();
	
	
	
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