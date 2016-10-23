<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

 function __construct() 
 	{
        parent::__construct();
        
    }



	public function index()
	 	{
	 
		$this->home();
		}
	public function home()
		{
			
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
		$this->load->view('footer', $header);
		}

}
