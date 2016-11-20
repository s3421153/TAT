<?php

class Userfunc extends CI_Model{
	 
function __construct()
	{
		parent::__construct();
	}

function getUserEmail()
	{
	return $_SESSION['User_ID'];
	}

function apiPass($email)
	{
	

			$_SESSION['logged_in']=true;
			$_SESSION['User_ID']=$email;
			
	return;
	}


function apiAuth($email, $pass)
	{
	$url = "http://139.59.247.83/api/users/loginUser?email=".$email."&password=".$pass;
	

	$loginUser = file_get_contents($url);
	
		if ( $loginUser == 'true')
			{
			// echo 'Password Correct';
			
			$_SESSION['logged_in']=true;
			$_SESSION['User_ID']=$email;
			
			
			
			$this->apiUpdateData();
		
			}
		else 
			{
			echo 'User / password invalid';
			}
			
	return $loginUser;
	
	
	}

function apiUpdateData()
	{
		
		
	// UPDATE COURSES
		
		$courses = json_decode(
   			 file_get_contents('http://139.59.247.83/index.php/api/getdata/Courses/format/json')
		);

	foreach ($courses as $course ) 
		{
		foreach ($course as $coursenames ) 
		{
		
		$query = $this->db->query(' INSERT IGNORE INTO Course (CourseID, CourseName, APICourseID) VALUES (DEFAULT, "'.$coursenames->course_name.'","'. $coursenames->course_id .'")');
	
		}
		}
	
	//UPDATE SUBJECTS
				
		$subjectarrays = json_decode(
   			 file_get_contents('http://139.59.247.83/index.php/api/getdata/Subjects/format/json')
		);

	foreach ($subjectarrays as $subjects ) 
		{
		foreach ($subjects as $subject) 
		{

		$courseID = $this->db->query('SELECT CourseID FROM Course WHERE ApiCourseID = "BT_FT"');
		
		$courseID2 = $courseID->result();
		$CourseID = $courseID2[0];

		
		$query = $this->db->query(' INSERT IGNORE INTO Subject (SubjectID, SubjectName, CreditPoints, S_CourseID, SubjectAPIID) 
		VALUES (DEFAULT, "'.$subject->subject_name.'", DEFAULT,"'. $CourseID->CourseID.'", "'. $subject->subject_id .'")'); 

		}
		}
	return NULL;

	}
	}
	?>