//////////////////////////////////////////////////////
// Repository management
///////////////////////////////////////////////////

$(document).ready(function(){
	$.ajaxSetup ({     
		// Disable caching of AJAX responses    
		cache: false
	});
	
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
				textToInsert[j++] = '<a href="/web/index.php?p=' + repoList[i] + '.git&a=summary" title="Browse"><img src="/static/images/icons/magnifier.png" alt="Browse" /></a>';
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