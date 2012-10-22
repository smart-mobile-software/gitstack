<?php
/**
 * GitPHP Authentication
 *
 *
 * @author Smart Mobile Software
 * @package GitPHP
 */

/**
 * Authentication class
 *
 * @package GitPHP
 */
class GitPHP_Authentication
{
	
	private $project_name = '';
	
	
	public function __construct()
	{
		
	}
	
	// Authenticate the user
	public function authenticate()
	{
		
		// Get the project name
		if(isset($_GET['p'])){

			//$this->project_name = substr($_GET['p'], 0, -1);
			$this->project_name = $_GET['p'];
			
			// Read the users of the project
			$users = $this->readRepositoryReadUsers();
			// check if the user everyone is in the list
			if(in_array('everyone', $users))
			{
				// yes
				return true; // the user do not need to be authenticated
			}
			else
			{
				
				// The user should be authenticated
				// Ask for username/password
				if (!isset($_SERVER['PHP_AUTH_USER'])) {

					header('WWW-Authenticate: Basic realm="Enter a username/password of a user which has the rights to access to this repository. ADMIN PASSWORD WON\'T WORK"');
					header('HTTP/1.0 401 Unauthorized');
					echo 'Your GitStack credentials were not entered correcly. Please ask your GitStack administrator to give you a username/password and give you access to this repository. <br />Note : You have to enter the credentials of a user which has at least read access to your repository. Your GitStack administration panel username/password will not work. ';
					exit;
				} else {
					// try to authenticate
					$authenticated = false;
					$username = $_SERVER['PHP_AUTH_USER'];
					$password = $_SERVER['PHP_AUTH_PW'];
					
					
					// Check if the user is in the array of read users
					if(in_array($username, $users)){
						$authMethod = $this->getAuthMethod();
						// authenticate with ldap or by file
						if($authMethod == "file"){
							$authenticated = $this->authenticateFile($username, $password);
						} if($authMethod == "ldap") {
							$authenticated = $this->authenticateLdap($username, $password);

						}
						if ($authenticated == false){
							$this->denyAuthentication();
						}
					} else {
						
						$this->denyAuthentication();
					}
					
				}
			}
			
		}
		
	}
	
	// Read the apache configuration file for the repo and retrieve the usernames
	// with the read permissions
	private function readRepositoryReadUsers()
	{
		// list of read users
		$userList = Array();
		
		// read all the permissions from a rest request
		$repoPermissions = $this->readRepoPermissions();
		
		$userReadList = $repoPermissions['user_read_list'];
		// add each user to the list of users
		foreach ($userReadList as $userInfo){
			// add the list of users in the array
			array_push($userList, $userInfo["username"]);
		}
		
		// get all the read group
		$groupReadList = $repoPermissions['group_read_list'];
		// echo var_dump($groupReadList);
		foreach ($groupReadList as $groupInfo){
			$groupName = $groupInfo["name"];
			// get the users
			$groupUsers = $this->getUsersInGroup($groupName);
			// for each member
			foreach ($groupUsers as $gUser){
				array_push($userList, $gUser);
			}

			
		}
		// return the list of users
		return $userList;
		//return Array("everyone");
		
	}
	
	
	
	// perform a rest request to read all the permissions on the repo
	private function readRepoPermissions(){
		// repo name without the .git at the end
		$repo_name = $this->project_name;
		$repo_name = substr($repo_name ,0,-4);
		
		// perform the request to retrieve the repo permissions
		$ch = curl_init($this->restUrl() . "/rest/repository/" . $repo_name . "/");
		
		curl_setopt($ch, CURLOPT_HEADER, 0);
		// do not check for ssl valid certificate
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $jsonRepoPermissions = curl_exec($ch);       
        curl_close($ch);
		
		// parse the json to retrieve only the list of users
		$repoPermissions = json_decode($jsonRepoPermissions, true);
		
		return $repoPermissions;
	}
	
	
	private function getUsersInGroup($groupName){
		// perform the request to retrieve the repo permissions
		
		$ch = curl_init($this->restUrl() . "/rest/group/" . $groupName . "/user/");
		
		curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $jsonGroupUsers = curl_exec($ch);       
        curl_close($ch);
		
		// parse the json to retrieve only the list of users
		$groupUsers = json_decode($jsonGroupUsers, true);
		
		return $groupUsers;
	}
	
	
	// Get the method of authentication
	private function getAuthMethod(){
		// Read the gitstack settings file
		$settingsDir = GitPHP_Config::GetInstance()->GetValue('gitstacksettings', '');

		// read the ini file
		$ini_array = parse_ini_file($settingsDir, true, INI_SCANNER_RAW);
		$authMethod = $ini_array['authentication']['authmethod'];
		// should contain "ldap" or "file"
		return $authMethod;

		
	}
	
	// authenticate a user with a file
	private function authenticateFile($username, $password){
		$authenticated = false;
		// Will contains username as key, salt and encrypted pass as value
		$userInfos = Array();
		
		// exec the open ssl command
		$installDir = GitPHP_Config::GetInstance()->GetValue('gitstackinstalldir', '');
		
		$lines = file($installDir . "/data/passwdfile");

		// Fill the userInfos array
		foreach($lines as $line)
		{
			// a line is like 
			// user1:$apr1$v1Ds2Lf9$hNL6r81eGFXrUmh5wbQpn0
			// split with ':'
			$splitted = explode(':', $line);
			$extractedUsername = $splitted[0];
			// split with $ to get the salt and password encrypted
			$splittedPass = explode('$', $splitted[1]);
			$salt = $splittedPass[2];
			$encryptedPass = $splittedPass[3];
			
			// save everything in an array
			$userInfos[$extractedUsername] = Array();
			$userInfos[$extractedUsername]['salt']= $salt;
			$userInfos[$extractedUsername]['encryptedPass']= trim($encryptedPass);
			
			
		}
		
		// if the user exist in the array
		if(array_key_exists($username, $userInfos)){
			// run the openssl command to verify the password
			$currentUser = $userInfos[$username];
			$result = exec($installDir . '/apache/bin/openssl.exe passwd -apr1 -salt ' . $currentUser['salt'] . " " . $password);
			// result = $apr1$v1Ds2Lf9$hNL6r81eGFXrUmh5wbQpn0
			// split the result to get only the encrypted password part
			$split = explode('$', $result);
			$encryptedPassword = $split[3];
			if($encryptedPassword == $currentUser['encryptedPass'])
				$authenticated = true;
		}
		
		return $authenticated;
		
		
	}
	
	// authenticate a user with a file
	private function authenticateLdap($username, $password){
		$authenticated = false;
		
		// Read the gitstack settings file
		$settingsDir = GitPHP_Config::GetInstance()->GetValue('gitstacksettings', '');

		// read the ini file
		$ini_array = parse_ini_file($settingsDir, true, INI_SCANNER_RAW);
		$ldapParams = $ini_array['authentication'];
		
		$ldapServerUrl = $ldapParams['ldapprotocol'] . "://" . $ldapParams['ldaphost'] . ":" . $ldapParams['ldapport'] . "/";
	
			
		if ($this->checkldapuser($username, $password, $ldapServerUrl, $ldapParams ['ldapbasedn'],$ldapParams ['ldapattribute'], $ldapParams ['ldapbinddn'],$ldapParams ['ldapbindpassword'],$ldapParams ['ldapfilter']  )) {
			$authenticated = true;
		} else {
			$authenticated = false;
		} 
			

		
		return $authenticated;
		
		
	}
	
	private function checkLdapUser($username,$password,$ldap_server, $base_dn, $attribute, $bind_dn, $bind_password, $filter){
		if($connect=@ldap_connect($ldap_server)){ // if connected to ldap server

		ldap_set_option($connect, LDAP_OPT_PROTOCOL_VERSION, 3);
		
		

		// bind to ldap connection
		if(($bind=@ldap_bind($connect, $bind_dn, $bind_password)) == false){
		  print "bind:__FAILED__<br>\n";
		  return false;
		}
		
		// setup the filter
		$filter="(&" . $filter . "(" . $attribute . "=" . $username . "))";  // single filter


		// search for user
		if (($res_id = ldap_search( $connect,
									$base_dn,
									$filter)) == false) {
		  print "failure: search in LDAP-tree failed<br>";
		  return false;
		}
		

		if (ldap_count_entries($connect, $res_id) != 1) {
		  print "failure: username $username found more than once<br>\n";
		  return false;
		}

		if (( $entry_id = ldap_first_entry($connect, $res_id))== false) {
		  print "failur: entry of searchresult couln't be fetched<br>\n";
		  return false;
		}

		if (( $user_dn = ldap_get_dn($connect, $entry_id)) == false) {
		  print "failure: user-dn coulnd't be fetched<br>\n";
		  return false;
		}

		/* Authentifizierung des User */
		if (($link_id = ldap_bind($connect, $user_dn, $password)) == false) {
		  print "failure: username, password didn't match: $user_dn<br>\n";
		  return false;
		}

		return true;
		@ldap_close($connect);
	  } else {                                  // no conection to ldap server
		echo "no connection to '$ldap_server'<br>\n";
	  }

	  echo "failed: ".ldap_error($connect)."<BR>\n";

	  @ldap_close($connect);
	  return(false);

	}
	
	// retrieve the restful url from the config file
	private function restUrl(){
		$url = "";
		// get the gitstack config file
		$configFile = GitPHP_Config::GetInstance()->GetValue('gitstacksettings', '');
		$configArray = parse_ini_file($configFile, true, INI_SCANNER_RAW );
		
		// build the url
		if ($configArray['protocols']['http'] == "True"){
			// http
			$url .= "http://localhost:";
			// port
			$port = $configArray['protocols']['httpport'];
			$url .= $port;

		} else {
			// https
			$url .= "https://localhost:";
			// port
			$port = $configArray['protocols']['httpsport'];
			$url .= $port;
		}
		
		
		return $url;
		
	}
	
	private function denyAuthentication(){
		header('WWW-Authenticate: Basic realm="Please enter your git repository credentials"');
		header('HTTP/1.0 401 Unauthorized');
		echo 'Your GitStack credentials were not entered correcly. Please ask your GitStack administrator to give you a username/password and give you access to this repository. <br />Note : You have to enter the credentials of a user which has at least read access to your repository. Your GitStack administration panel username/password will not work. ';
		exit;
	}

}
