$(document).ready(function(){
	$.ajaxSetup ({     
		// Disable caching of AJAX responses    
		cache: false
	}); 
	// get the list of all repositories
	var refreshRepoList = function(){
		$.get('repository/', function(repoList){
			$("#repoList").html('');
			var i = 0;
			for(i; i < repoList.length; i++){
				$("#repoList").append('<tr>\n');
				$("#repoList").append('<td>' + repoList[i] + '</td>\n');
				$("#repoList").append('<td>git clone http://localhost/' + repoList[i] + '.git</td>\n');
				//$("#repoList").append('<td><!-- Icons --><a href="#" title="Delete"><img src="/static/images/icons/cross.png" alt="Delete" /></a></td>\n');
									
				$("#repoList").append('</tr>\n');			
			}
			
		}, "json");
	};
	
	refreshRepoList();
	
	$("#btnCreateRepo").click(function(event){
		// get the repository name
		var repoName = $("#txtRepoName").val();
		var csrf = $('input[name="csrfmiddlewaretoken"]').val();
		// Create
		$.post("repository/", { name: repoName, csrfmiddlewaretoken: csrf} )
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
	
	alert('ok');
	
	$("#btnUpdate").click(function(event){
		alert('update user');
	});
});