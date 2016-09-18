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

  function registerUser() 
  {

    $username = htmlspecialchars($_POST["username"]);
    $emailAddress = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);
    $password = password_hash($password, PASSWORD_DEFAULT);
    
    $dsn = DB_ENGINE . ':host=' . DB_HOST . ';dbname=' . DB_NAME;
    $db = new PDO($dsn, DB_USER, DB_PW);

    // Insert the new user into the Members table
    $insertMemberQuery = $db->prepare('INSERT INTO Members (DisplayName, EmailAddress) 
                                       VALUES(:displayName, :email)');
    $insertMemberQuery->bindparam(':displayName', $username, PDO::PARAM_STR, 20);
    $insertMemberQuery->bindparam(':email', $emailAddress, PDO::PARAM_STR, 255);
    $insertMemberQuery->execute();
    
    // Retreive the ID of the new user
    // Did not use PDO::lastInsertId() function as it is not reliable 
    // (according to the php manual)
    $getNewMemberQuery = $db->prepare('SELECT MemberId 
                                       FROM Members 
                                       WHERE EmailAddress = :email');
    $getNewMemberQuery->bindparam(':email', $emailAddress, PDO::PARAM_STR, 255);
    $getNewMemberQuery->execute();
    
    $result = $getNewMemberQuery->fetch();

    // Set date in MySQL format
    $currentDate = date("Y-m-d H:i:s");   
    
    // Insert the password into the Password table (using the new MemberID)
    $insertPasswordQuery = $db->prepare('INSERT INTO Passwords (MemberId, Password, LastChanged) 
                                         VALUES(:memberId, :password, :theDate)');
    $insertPasswordQuery->bindparam(':memberId', $result['MemberId'], PDO::PARAM_INT);
    $insertPasswordQuery->bindparam(':password', $password, PDO::PARAM_STR, 255);
    $insertPasswordQuery->bindparam(':theDate', $currentDate, PDO::PARAM_STR);
    $insertPasswordQuery->execute();

    // Log user in autmatically
    $this->username = $username;
    $this->loggedIn = true;

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
