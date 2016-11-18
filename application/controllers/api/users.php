<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Users extends REST_Controller 
{
	
	function __construct()
    	{
        parent::__construct();
  //  	$this->users_get();
    	}
	
	
    public function index()
      	{
        echo $this->response(array('test'=> 'test'), 200);
		}
	  
	public function users_get() 
		{
        
	
		}
	public function login_get($useremail, $userlevel) 
		{
	   	$this->load->model('Userfunc');		
		$loggedin = $this->Userfunc->apiPass($useremail);
		
		if (isset($_SESSION['logged_in']))
			{
			redirect(Welcome);
			}
		else {
			redirect(Login);
			}
        }
}

?>