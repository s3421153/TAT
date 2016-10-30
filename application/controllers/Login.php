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
	 		
		$header['title']='Team Allocation Tool';
		$header['pageHeader']= 'T.A.T';
	 	$this->load->model('Userfunc');
		$this->load->view('header', $header);
		
		$this->load->view('footer', $header);
		}

	}