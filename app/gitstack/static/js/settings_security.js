$(document).ready(function(){
	$.ajaxSetup ({     
		// Disable caching of AJAX responses    
		cache: false
	}); 
	

	// retrieve and refresh the settings
	function refreshSettings(){
		$.ajax({
			url: '/rest/settings/security/',
			type: "GET",
			dataType: "json",
			success: function(settings){
				http = settings['http'];
				https = settings['https'];
				
				// select the right option
				if (http == true && https == false){
					$("input[name=protocol]").filter("[value=optHttpOnly]").prop("checked",true);
				} 
				
				else if (http == true && https == true){
					$("input[name=protocol]").filter("[value=optHttpAndHttps]").prop("checked",true)
				} 
				
				else if (http == false && https == true){
					$("input[name=protocol]").filter("[value=optHttpsOnly]").prop("checked",true);
				} 
				
				
			},
			
		});
	}
	
	refreshSettings();
	
	
	
	
	// save settings
	$('#saveSettings').click(function(){
		// check which protocol is choosen
		if($("input[name=protocol]").filter("[value=optHttpOnly]").prop("checked")){
			http = true;
			https = false;
		}
		else if ($("input[name=protocol]").filter("[value=optHttpAndHttps]").prop("checked")){
			http = true;
			https = true;
		}
		else if ($("input[name=protocol]").filter("[value=optHttpsOnly]").prop("checked")){
			http = false;
			https = true;
		}
		
		
		
		// construct the json object 															
		json_string = '{"http":"' + http + '","https":"' + https + '"}';

		

		// update the settings
		$.ajax({
			url: '/rest/settings/security/',
			type: 'PUT',
			contentType: 'application/json',
			data: json_string,
			success: function(data) {
				showMessage("success", data);
			},
			error: function(error) {
				showMessage("error", error.responseText);
			}
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