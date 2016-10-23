
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Update extends CI_Controller 
	{

 function __construct() 
 	{
        parent::__construct();
        
    }

	public function index()
	 	{
	//	$this->data_submitted();	
		}
		
public function data_submitted()
		{			
		$this->load->model('Projects');
		$post_data = $this->input->post();
		$update = $this->Projects->updateProject($post_data);
		
	//	var_dump($post_data);
	
		$this->load->helper('url');
		redirect(Welcome/home);
		}
		
		
	}