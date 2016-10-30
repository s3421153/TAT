<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

 function __construct() 
 	{
        parent::__construct();
        
    }



	public function index()
	 	{
	 	if ($_SESSION['logged_in'] == true)
			{
			$this->home();
			}
		else 
			{
			redirect(Login);
			}
		
		}
	public function home()
		{
			
		if ($_SESSION['logged_in'] != true) { redirect(Login); }
				
		$this->load->helper('url');
		$this->load->model('Projects');
		$this->load->model('Userfunc');

		$header['userEmail']=$this->Userfunc->getUserEmail();		
		$header['title']='Team Allocation Tool';
		$header['pageHeader']= 'T.A.T';
		
		$this->load->view('header', $header);

		//Get Course Names
		
		$projectInfo['courseNames']=$this->Projects->getCourses();	
		
		$projectInfo['subjectName']=$this->Projects->getSubject();			
		$projectInfo['projectName']=$this->Projects->getProjects();
		
		$this->load->view('projectSelect', $projectInfo);
		
		$updated = $this->session->flashdata('updated');
		
	
		if ($updated != null)
			{
			$this->load->view('SuccessMessage');		
			}
			
		$this->load->view('footer', $header);
		}

}
