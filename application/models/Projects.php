<?php

class Projects extends CI_Model{
	
function __construct()
	{
		parent::__construct();
	}


function getProjects()
	{
	$query = $this->db->query('SELECT * FROM Project');
	
	if ($query->num_Rows() > 0 )
		{
			return $query->result(); 
		}
	else
		{
			return NULL;
		}
		
	}

function getSubject()
	{
		$query = $this->db->query('SELECT SubjectID, SubjectName FROM Subject;');
	
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

function updateProject($projData)
	{

	
	$projID   = $projData['projectID'];
	$projName = $projData['projectnamefield'];
	$projMin  = $projData['minnummembers'];
	$projMax  = $projData['maxnummembers'];
	
	if (isset($projData['GPA']))
		{
		$queryGPA = $this->db->query('UPDATE Project SET GenderBalance="1" WHERE Project.ProjectID='.$projID);
			
		}
	else
		{
		$queryGPA = $this->db->query('UPDATE Project SET GenderBalance="0" WHERE Project.ProjectID='.$projID);
			
		}
	if (isset($projData['Gender']))
		{
		$queryGender = $this->db->query('UPDATE Project SET TakeGPAintoAccount="1" WHERE Project.ProjectID='.$projID);
			
		}
	else
		{
		$queryGender = $this->db->query('UPDATE Project SET TakeGPAintoAccount="0" WHERE Project.ProjectID='.$projID);	
		}
	
	$queryOther = $this->db->query('UPDATE Project SET Name="'.$projName.'", StudentMin='.$projMin.', StudentMax='.$projMax.' WHERE Project.ProjectID='.$projID);
	
	
	}

}



	?>