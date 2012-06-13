$(document).ready(function() {
   // check if ldap is activated or not 
   
   $.ajax({
		url: '/rest/settings/authentication/',
		type: "GET",
		dataType: "json",
		success: function(settings){
			if (settings['authMethod'] === 'file'){
				// show users and groups menu
				$('#usersAndGroups').show();

			} else if (settings['authMethod'] === 'ldap'){
				// hide users and groups menu

				$('#usersAndGroups').hide();

				
			}
			
			
		},
		
	});
	
	// check the license status
	$.ajax({
		url: '/rest/settings/license/',
		type: "GET",
		dataType: "json",
		success: function(settings){
			// still in trial
			
			if (settings['isTrial'] === true){
				$('#trialNotification').show();
				$('#trialMessage').html('You are running GitStack Enterprise edition for 30 days. GitStack will be switched to Basic edition at the end of the trial period. <a href="http://gitstack.com/pricing">Learn more</a>.');
				
			} else if ((settings['isLicensed'] === false) && (settings['isTrial'] === false)){
				// not in trial but not licensed either
				$('#trialNotification').show();
				$('#trialMessage').html('30 days trial expired. Running GitStack Basic edition. <a href="http://gitstack.com/pricing">Learn more</a>.');
			}
			
		},
		
	});
});
 