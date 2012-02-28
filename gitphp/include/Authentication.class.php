<?php
/**
 * GitPHP Authentication
 *
 * Logging class
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
	/*
	private $project_name = '';
	
	
	public function __construct()
	{
		
	}
	
	// Authenticate the user
	public function authenticate()
	{
	/*
		// Get the project name
		if(isset($_GET['p'])){
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

					header('WWW-Authenticate: Basic realm="Please enter your git repository credentials"');
					header('HTTP/1.0 401 Unauthorized');
					echo 'Your GitStack credentials were not entered correcly. Please ask your GitStack administrator to give you a username/password and give you access to this repository.';
					exit;
				} else {
					echo "<p>Hello {$_SERVER['PHP_AUTH_USER']}.</p>";
					echo "<p>You entered {$_SERVER['PHP_AUTH_PW']} as your password.</p>";
				}
			}
			

		}
		
	}
	
	// Read the apache configuration file for the repo and retrieve the usernames
	// with the read permissions
	private function readRepositoryReadUsers()
	{
		// get the config dir
		$repo_config = GitPHP_Config::GetInstance()->GetValue('apacherepo', '');
		// repo name without the .git at the end
		$repo_name = substr($this->project_name, 0, -4);
		
		$lines = file($repo_config . '/' . $repo_name . '.conf');
		$needle = "# read user list : ";

		// For each line
		foreach($lines as $line)
		{
			// Check that the line is found
			$isFound = strrpos (  $line ,  $needle  );
			if($isFound === 0){
				// extract the list of users
				$strUserList = substr($line, strlen($needle));
				$userList = explode(" ", $strUserList);
				// return the list of users
				return $userList;
			}
		}
		
		$handle = fopen($repo_config . '/' . $repo_name . '.conf', "r");
		
		if ($handle) {
			$needle = "# read user list : ";

			while (($buffer = fgets($handle, 4096)) !== false) {
				$isFound = strrpos (  $buffer ,  $needle  );
				echo $buffer;
				if($isFound)
					echo $buffer;
			}
			fclose($handle);

		}
	}
	*/
}
