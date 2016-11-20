<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';

class Login extends CI_Controller 
	{

 function __construct() 
 	{
        parent::__construct();
        
    }

	public function index()
	 	{
	 	if (isset($_SESSION['logged_in']))
			{
			redirect(Welcome);
			}

		
		$header['title']='Team Allocation Tool';
		$header['pageHeader']= 'T.A.T';

	 	
		
		$this->load->view('header', $header);
		
		$this->load->view('loginWindow');
	
		$this->load->view('footer', $header);
		}




	}
	
