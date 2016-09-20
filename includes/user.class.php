<?php

class User 
{

  private $loggedIn = false;
  private $registered = false;
  private $email = '';
  private $password = '';

  public function __construct() 
  {
    return;
  }


  public function login( $email, $password ) 
  {
    
    // query db and set login status
    $emailAddress = htmlspecialchars($email);
    $password = htmlspecialchars($password);

    // NOTE: Password not hashed here as password_verify() handles matching against hashed version.
    // $password = password_hash($password, PASSWORD_DEFAULT);

    $dsn = DB_ENGINE . ':host=' . DB_HOST . ';dbname=' . DB_NAME;
    $db = new PDO($dsn, DB_USER, DB_PW);


    //Check if email exists
    $emailQuery = $db->prepare('SELECT UserID, Email
                                FROM user
                                WHERE Email = :email');
    $emailQuery->bindparam(':email', $emailAddress, PDO::PARAM_STR, 255);
    $emailQuery->execute();

    $emailResult = $emailQuery->fetch();

    echo $emailResult['Email']);

    // If we found a matching email
    if($emailResult['Email']) 
    {
	   echo 'found user';
	   die();
      $UserID = $emailResult['UserID'];

      //Retrieve password hash
      $passwordQuery = $db->prepare('SELECT Password 
                                     FROM passwords 
                                     WHERE UserID = :UserID');
      $passwordQuery->bindparam(':UserID', $UserID, PDO::PARAM_STR, 255);
      $passwordQuery->execute();
  
      $passwordResult = $passwordQuery->fetch();

      // 
      if ( $passwordResult['Password'] )
      {
        // Compare password hashes
        if ( password_verify($password, $passwordResult['Password']) )
        {
          $this->loggedIn = true;
        }
      }

    }

    return;
  }


  public function isLoggedIn() 
  {
    return $this->loggedIn;
  }

  public function isRegistered() 
  {
    return $this->registered;
  }

  public function getUsername() 
  {
    return $this->username;
  }
}
?>
