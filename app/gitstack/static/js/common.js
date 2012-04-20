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
});
 