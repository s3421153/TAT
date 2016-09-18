<?php
/**
 * User 
 *
 * authentication functions
 * 
 */
class User 
{

  private $loggedIn = false;
  private $registered = false;
  private $username = '';
  private $email = '';
  private $password = '';

  public function __construct() 
  {
    // TODO
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
    $emailQuery = $db->prepare('SELECT MemberId, DisplayName, EmailAddress 
                                FROM Members 
                                WHERE EmailAddress = :email');
    $emailQuery->bindparam(':email', $emailAddress, PDO::PARAM_STR, 255);
    $emailQuery->execute();

    $emailResult = $emailQuery->fetch();

    // If we found a matching email
    if($emailResult['MemberId']) 
    {
      $memberId = $emailResult['MemberId'];

      //Retrieve password hash
      $passwordQuery = $db->prepare('SELECT Password 
                                     FROM Passwords 
                                     WHERE MemberId = :memberId');
      $passwordQuery->bindparam(':memberId', $memberId, PDO::PARAM_STR, 255);
      $passwordQuery->execute();
  
      $passwordResult = $passwordQuery->fetch();

      // 
      if ( $passwordResult['Password'] )
      {
        // Compare password hashes
        if ( password_verify($password, $passwordResult['Password']) )
        {
          $this->username = $emailResult['DisplayName'];
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
