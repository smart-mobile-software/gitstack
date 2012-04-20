$(document).ready(function(){
	$.ajaxSetup ({     
		// Disable caching of AJAX responses    
		cache: false
	}); 
	
	// hide by default ldap settings
	$('#ldapSettings').hide();

	// retrieve and refresh the settings
	function refreshSettings(){
		$.ajax({
			url: '/rest/settings/authentication/',
			type: "GET",
			dataType: "json",
			success: function(settings){
				if (settings['authMethod'] === 'file'){
					// hide ldap settings
					$('#ldapSettings').hide();

				} else if (settings['authMethod'] === 'ldap'){
					// set ldap radio button
					$("input[name=authMethod]").filter("[value=ldapUsers]").prop("checked",true);

					// show ldap settings
					$('#ldapSettings').show();

					
				}
				
				// fill ldap settings
				$('#ldapProtocol').val(settings.ldap.protocol);
				$('#ldapHost').val(settings.ldap.host);
				$('#ldapPort').val(settings.ldap.port);
				$('#ldapBaseDn').val(settings.ldap.baseDn);
				$('#ldapAttribute').val(settings.ldap.attribute);
				$('#ldapScope').val(settings.ldap.scope);
				$('#ldapFilter').val(settings.ldap.filter);
				$('#ldapBindDn').val(settings.ldap.bindDn);
				$('#ldapBindPassword').val(settings.ldap.bindPassword);			
			},
			
		});
	}
	
	refreshSettings();
	
	
	
	// click on gitstack users radio button
	$('#gitstackUsers').click(function(){
		// hide ldap settings
		$('#ldapSettings').hide();
	});
	
	// click on ldap users radio button
	$('#ldapUsers').click(function(){
		// show ldap settings
		$('#ldapSettings').show();

	});
	
	// test settings
	$('#testSettings').click(function(){		
		// Assign handlers immediately after making the request,
		// and remember the jqxhr object for this request
		// construct the json object 
		$('.loading').show();
			

		params = { protocol: $('#ldapProtocol').val(),
				host: $('#ldapHost').val(),
				port: $('#ldapPort').val(),
				baseDn: $('#ldapBaseDn').val(),
				attribute: $('#ldapAttribute').val(),
				scope: $('#ldapScope').val(),
				filter: $('#ldapFilter').val(),
				bindDn: $('#ldapBindDn').val(),
				bindPassword: $('#ldapBindPassword').val() }	

		$.get('/rest/settings/authentication/ldap/test/', params, function(message) {
			showMessage("success", message);
		})
		.error(function(error) { 
			showMessage("error", error.responseText);
		})
		.complete(function(){
			$('.loading').hide();

		});
		
		

	});
	
	// Import ldap users
	$('#sync').click(function(){		
		// Assign handlers immediately after making the request,
		// and remember the jqxhr object for this request
		// construct the json object 
		$('.loading').show();
		$.get('/rest/settings/authentication/ldap/sync/', function(message) {
			showMessage("success", message);
		})
		.error(function(error) { 
			showMessage("error", error.responseText);
		})
		.complete(function(){
			$('.loading').hide();

		});
		
		

	});

	
	// save settings
	$('#saveSettings').click(function(){
		// check which auth method is choosen
		isGitstackUserChecked = $("input[name=authMethod]").filter("[value=gitstackUsers]").prop("checked");
		authMethod = '';
		if(isGitstackUserChecked == true){
			authMethod = 'file';
			$('#usersAndGroups').show();

		} else {
			authMethod = 'ldap';
			$('#usersAndGroups').hide();

		}
		
		// construct the json object 															
		json_string = '{"authMethod":"' + authMethod + '","ldap":{"protocol": "' + $('#ldapProtocol').val() +'","host": "' + $('#ldapHost').val() +'","port": "' + $('#ldapPort').val() +'","baseDn": "' + $('#ldapBaseDn').val() +'","attribute": "' + $('#ldapAttribute').val() +'","scope": "' + $('#ldapScope').val() +'","filter": "' + $('#ldapFilter').val() +'","bindDn": "' + $('#ldapBindDn').val() +'","bindPassword": "' + $('#ldapBindPassword').val() + '"}}';
		
		//json_string = '{"authMethod":"' + authMethod + '","ldap":{"host": "' + $('#ldapHost').val() +'","baseDn": "' + $('#ldapBaseDn').val() + '","bindDn": "' + $('#ldapBindDn').val() + '","bindPassword": "' + $('#ldapBindPassword').val() + '"}}';

		// update the settings
		$.ajax({
			url: '/rest/settings/authentication/',
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