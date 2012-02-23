/////////////////////////////////
// Administrator password change
////////////////////////////////

$(document).ready(function(){
	$.ajaxSetup ({     
		// Disable caching of AJAX responses    
		cache: false
	}); 
	
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