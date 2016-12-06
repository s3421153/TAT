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
	$url = "http://192.241.144.135/tatui/api/users/loginUser?email=".$email."&password=".$pass;
	

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
   			 file_get_contents('http://192.241.144.135/tatui/index.php/api/getdata/Courses/format/json')
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
   			 file_get_contents('http://192.241.144.135/tatui/index.php/api/getdata/Subjects/format/json')
		);

	foreach ($subjectarrays as $subjects ) 
		{
		foreach ($subjects as $subject) 
		{

		$courseID = $this->db->query('SELECT CourseID FROM Course WHERE ApiCourseID = "'. $subject->course_id  .'"');
		
		$courseID2 = $courseID->result();
		$CourseID = $courseID2[0];

		
		$query = $this->db->query(' INSERT IGNORE INTO Subject (SubjectID, SubjectName, CreditPoints, S_CourseID, SubjectAPIID) 
		VALUES (DEFAULT, "'.$subject->subject_name.'", DEFAULT,"'. $CourseID->CourseID.'", "'. $subject->subject_id .'")'); 

		}
		}
		
		//UPDATE PROJECTS
		
		$projectarrays = json_decode(
   			 file_get_contents('http://192.241.144.135/tatui/index.php/api/getdata/Projects/format/json')
		);

		foreach ($projectarrays as $projects ) 
			{
			foreach ($projects as $project) 
			{
			
			
			$subjectID = $this->db->query('SELECT subjectID, SubjectAPIID FROM Subject WHERE SubjectAPIID="'.$project->subject_id.'"');
			
			
			
			if ($subjectID->result() != NULL)
				{
				$subjectID2 = $subjectID->result();
				$subjectID = $subjectID2[0];
				
			//	var_dump($project);
				
				
				$query = $this->db->query(' INSERT IGNORE INTO Project (ProjectID, Name, StudentMax, TakeGPAintoAccount, GenderBalance, StudentMin, P_SubjectID, GPALevel, ProjectAPIID) 
				VALUES (DEFAULT, "'.$project->project_name.'", NULL, NULL, NULL, NULL,"'. $subjectID->subjectID .'", NULL, "'. $project->project_id .'")'); 
				
				}
			}
			}
		
		
		//UPDATE STUDENTS	
		$studentarry = json_decode(
   			 file_get_contents('http://192.241.144.135/tatui/index.php/api/getdata/Students/format/json')
		);

	foreach ($studentarry as $students ) 
		{
		foreach ($students as $student ) 
		{
		
		
		
		$studentNum = strstr($student->user_id, '@', true);
	
		$query = $this->db->query('INSERT IGNORE INTO Student (StudentID, StudentNo, First_Name, Email, Last_Name, Gender, StudentGPA)  VALUES (DEFAULT, "'.$studentNum .'","Joe","'. $student->user_id .'","Bloggs", "NULL", "NULL")');
		
		
		}
		}
		
		
		// UPDATE ENROLLMENTS
		
		// UPDATE GPA
		
		// UPDATE SKILLS
		
		
		
		
	return NULL;

	}
	}
	?>