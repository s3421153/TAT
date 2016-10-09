<?php

class User_func extends CI_Model{
	 
function __construct()
	{
		parent::__construct();
	}

function getUserEmail()
	{
		
	$query = $this->db->query('SELECT Email FROM user where UserID=1');
	

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