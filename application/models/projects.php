<?php

class Projects extends CI_Model{
	
function __construct()
	{
		parent::__construct();
	}


function getSubject()
	{
		$query = $this->db->query('SELECT SubjectName FROM Subject;');
	
		if ($query->num_Rows() > 0 )
		{
			return $query->result(); 
		}
	else
		{
			return NULL;
		}
	}
		

function getCourses()
	{
		
	$query = $this->db->query('SELECT CourseName FROM Course');

	if ($query->num_Rows() > 0 )
		{
			return $query->result(); 
		}
	else
		{
			return NULL;
		}
	}


}
	?>