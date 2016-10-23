<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

 function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }

	public function index()
	 	{
		$this->home();
		}
	public function home()
		{
			

		$this->load->model('projects');
		$this->load->model('userfunc');

		
		$header['userEmail']=$this->Userfunc->getUserEmail();		
		$header['title']='Team Allocation Tool';
		$header['pageHeader']= 'T.A.T';
		
		$this->load->view('header', $header);

		//Get Course Names
		$projectInfo['courseNames']=$this->projects->getCourses();	
		
		$projectInfo['subjectName']=$this->projects->getSubject();			
		$projectInfo['projectName']=$this->projects->getProjects();
		
		$this->load->view('projectSelect', $projectInfo);
		$this->load->view('footer', $header);
		}
public function data_submitted()
		{
		$this->load->model('projects');
		$post_data = $this->input->post();
		$update = $this->projects->updateProject($post_data);
		
		}
}
