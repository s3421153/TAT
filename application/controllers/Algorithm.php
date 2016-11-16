
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Algorithm extends CI_Controller 
	{

 function __construct() 
 	{
        parent::__construct();    
    }

	public function index()
	 	{
	
		}
		
public function run_alg($CourseID, $SubjectID)
		{
		
						
		$this->load->model('Runalg');
		
		$team = $this->Runalg->TeamAlgorithm($CourseID, $SubjectID);
		
	//	$post_data = $this->input->post();
		//$update = $this->Projects->updateProject($post_data);
		
//		$this->load->helper('url');
		
	//	$this->session->set_flashdata('updated',1);
		
	//	redirect(Welcome/home);
		}
		
		
	}