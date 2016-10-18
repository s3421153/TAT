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
//	var_dump($projData);
	
	
//	array(6) { ["project-name-field"]=> string(50) "Cloud-based Spatio-temporal Big Data Visualization" ["projectID"]=> string(1) "3" ["min-num-members"]=> 
//	string(4) "null" ["max-num-members"]=> string(4) "null" ["GPA"]=> string(2) "on" ["Gender"]=> string(2) "on" }
	
	
	
	$projID   = $projData['projectID'];
	$projName = $projData['projectnamefield'];
	$projMin  = $projData['minnummembers'];
	$projMax  = $projData['maxnummembers'];
	
	if (isset($projData['GPA']))
		{
		$query = $this->db->query('UPDATE Project SET GenderBalance="1" WHERE Project.ProjectID='.$projID);
			
		}
	
	if (isset($projData['Gender']))
		{
		$query = $this->db->query('UPDATE Project SET TakeGPAintoAccount="1" WHERE Project.ProjectID='.$projID);
			
		}
	
	$query = $this->db->query('UPDATE Project SET Name="'.$projName.'", StudentMin='.$projMin.', StudentMax='.$projMax.' WHERE Project.ProjectID='.$projID);
	
	return "$query";
	//die();
	}

}



	?>