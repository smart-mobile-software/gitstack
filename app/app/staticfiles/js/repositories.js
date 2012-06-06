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
		var url = '/rest/settings/general/port/';
		$.get(url, function(ports){
			$('#portHttp').val(ports['httpPort']);
			$('#portHttps').val(ports['httpsPort']);
			
			var url = '/rest/settings/security/';
			$.get(url, function(protocols){
				$('#httpEnabled').val(protocols['http']);
				$('#httpsEnabled').val(protocols['https']);
				
				
				$.get('/rest/repository/', function(repoList){
				
					$("#repoList").html('');
					var i = 0;
					var j = 0
					var textToInsert = [];
					var httpPort = $('#portHttp').val();
					var httpsPort = $('#portHttps').val();
					var httpEnbabled = $('#httpEnabled').val();
					var httpsEnbabled = $('#httpsEnabled').val();
					
					// check which protocol can be used
					protocol = "http";
					displayPort = "";
					baseUrl = ""+window.location.hostname;
					
					if (httpsEnbabled == true){
						protocol = "https";
						if (httpsPort == '443')
							displayPort = "";
						else
							displayPort = ":" + httpsPort;
					} else {
						protocol = "http";
						if (httpPort == '80')
							displayPort = "";
						else
							displayPort = ":" + httpPort;
					}
					
			
					for(i; i < repoList.length; i++){
						textToInsert[j++] = '<tr class=' + repoList[i].name + '>';
						textToInsert[j++] = '<td>' + repoList[i].name + '</td>\n';
						textToInsert[j++] = '<td>git clone ' + protocol + '://' + baseUrl + displayPort + '/' + repoList[i].name + '.git</td>\n';

						textToInsert[j++] = '<td><!-- Icons -->';
						// for normal (bared) repo
						if(repoList[i].bare == true){
							textToInsert[j++] = '<a href="/web/index.php?p=' + repoList[i].name + '.git&a=summary" title="Browse"><img src="/static/images/icons/magnifier.png" alt="Browse" /></a>';
							textToInsert[j++] = '<a href="/gitstack/repository/' + repoList[i].name + '/permission/" class="editUsers" title="Permissions"><img src="/static/images/icons/users.png" alt="Permissions" /></a>';
							textToInsert[j++] = '<a class="deleteRepo" href="#" title="Delete"><img src="/static/images/icons/cross.png" alt="Delete" /></a>';
						} else {
							textToInsert[j++] = '<a href="#" class="importRepo" title="Import to GitStack"><img src="/static/images/icons/arrow_in.png" alt="Import to GitStack" /></a>';
						}
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
			}, "json");
			
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
		
		// Delete a specified repo
		$(".importRepo").click(function(event){
			var reponame = $(this).closest("tr").attr("class");
			// delete the repo
			// configure confirm delete dialog
			var $dialog = $('<div></div>')
				.html('<br />Would you like to import ' + reponame + ' to GitStack ?')
				.dialog({
					autoOpen: false,
					title: 'Import ' + reponame,
					modal: true,
					height:140,
					buttons: {
						// delete function
						Import: function() {
							// perform the request to delete the repo
							data = '{"bare": true}';
							
							
							$.ajax({
								url: '/rest/repository/' + reponame + '/',
								type: 'PUT',
								contentType: 'application/json',
								data: data,
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