///////////////////////
// Group management
///////////////////////

$(document).ready(function(){
	$.ajaxSetup ({     
		// Disable caching of AJAX responses    
		cache: false
	}); 
	// get the list of all groups
	var refreshGroupList = function(){
		$.get('/rest/group/', function(groupList){
			$("#groupList").html('');
			var i = 0;
			var j = 0
			var textToInsert = [];
			for(i; i < groupList.length; i++){				
				textToInsert[j++] = '<tr class=' + groupList[i].name + '>';
				textToInsert[j++] = '<td>' + groupList[i].name + '</td>\n';
				textToInsert[j++] = '<td><!-- Icons -->';
				textToInsert[j++] = '<a href="/gitstack/group/' + groupList[i].name + '/user/" class="editUsers" title="Members"><img src="/static/images/icons/users.png" alt="Members" /></a>';
				textToInsert[j++] = '<a class="deleteGroup" href="#" title="Delete"><img src="/static/images/icons/cross.png" alt="Delete" /></a>';
				textToInsert[j++] = '</td>';
				textToInsert[j++] = '</tr>';	
			}
			$('#groupList').append(textToInsert.join(''));

			bindGroupBehaviors();
			
		}, "json");
	};
	
	refreshGroupList();
	
	
	var bindGroupBehaviors = function() {
		// Delete a specified group
		$(".deleteGroup").click(function(event){
			var groupname = $(this).closest("tr").attr("class");
			// delete the group
			// configure confirm delete dialog
			var $dialog = $('<div></div>')
				.html('<br />Would you like to delete ' + groupname + ' ?')
				.dialog({
					autoOpen: false,
					title: 'Delete ' + groupname,
					modal: true,
					height:140,
					buttons: {
						// delete function
						Delete: function() {
							// perform the request to delete the group
							$.ajax({
								url: '/rest/group/' + groupname + '/',
								type: 'DELETE',
								success: function(data) {
									// group successfully delete
									showMessage("success", data);
									setTimeout(refreshGroupList,500)
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
		
		
	 }
	 
	 bindGroupBehaviors();
	
		
	
	$("#btnCreateGroup").click(function(event){
		// get the repository name
		var groupname = $("#txtGroupname").val();
		
		// Check the length of the password
		var csrf = $('input[name="csrfmiddlewaretoken"]').val();
		// Create
		$.post("/rest/group/", { name: groupname, csrfmiddlewaretoken: csrf} )
		.success(function(message) {
			showMessage("success", message);
			setTimeout(refreshGroupList,500)
		})
		.error(function(error) {
			showMessage("error", error.responseText);
		});
		
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