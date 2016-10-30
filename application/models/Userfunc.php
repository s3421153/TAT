<?php

class Userfunc extends CI_Model{
	 
function __construct()
	{
		parent::__construct();
	}

function getUserEmail()
	{
	return $_SESSION['User_ID'];
	}

function apiAuth($email, $pass)
	{
	$url = "http://localhost/tatui/api/users/loginUser?email=".$email."&password=".$pass;
	echo $url . '</br>';

	$loginUser = file_get_contents($url);
	
		if ( $loginUser == 'true')
			{
			// echo 'Password Correct';
			
			$_SESSION['logged_in']=true;
			$_SESSION['User_ID']=$email;
			
			}
		else 
			{
			echo 'User / password invalid';
			}
			
	return $loginUser;
	}


}
	?>