<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';

class Functions extends CI_Controller 
	{
	
function __construct() 
 	{
        parent::__construct();
        
    }
	
	public function userLogin()
		{
			
		//CHECK API if the submitted usernames / passwords are correct
		$post_data = $this->input->post();
			
		$email = $post_data['userid'];
		$pass = $post_data['password'];
		
		$this->load->model('Userfunc');
		
		$loggedin = $this->Userfunc->apiAuth($email, $pass);
		
		if ($loggedin == true)
			{
			redirect('Welcome');
			}
		else 
			{
			echo "Invalid Password";
			}
		}
		
		
	public function userLogout()
		{
			
		session_destroy();
		redirect('Login');
		
		}
		
}