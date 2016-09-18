<?php

// Validate user name function
function validateUserName()
{
  $username = "";        
  if(isset($_POST["username"]))
  {
    $username = htmlspecialchars($_POST["username"]);

    $dsn = DB_ENGINE . ':host=' . DB_HOST . ';dbname=' . DB_NAME;
    $db = new PDO($dsn, DB_USER, DB_PW);

    // Test username does not exist
    $usernameQuery = $db->prepare('SELECT DisplayName 
                                   FROM Members 
                                   WHERE DisplayName = :username');
    $usernameQuery->bindParam(':username', $username, PDO::PARAM_STR, 20);
    $usernameQuery->execute();

    $result = $usernameQuery->fetch();
    $db = null;

    // No result means that the user name does not already exist
    if($result == null)
    {
      return true;
    }
    else
    {
      $_SESSION['registerError'] = "<p>Username already registered.</p>";
      return false;
    }            
  }
  else
  {
    $_SESSION['registerError'] = "<p>Please enter a Username.</p>";
    return false;
  }
}

// Validate email address function
function validateEmailAddress() 
{
  $emailAddress = "";

  if(isset($_POST["email"]))
  {
    $emailAddress = htmlspecialchars($_POST["email"]);

    // Test email address is in a valid format
    if(!filter_var($emailAddress, FILTER_VALIDATE_EMAIL))
    {
      $_SESSION['registerError'] .= "<p>Email is not in a valid format.</p>";
      return false;
    }
    // Valid email format, proceed with validation
    else
    {                            
      $dsn = DB_ENGINE . ':host=' . DB_HOST . ';dbname=' . DB_NAME;
      $db = new PDO($dsn, DB_USER, DB_PW);

      $emailQuery = $db->prepare('SELECT EmailAddress 
                                  FROM Members 
                                  WHERE EmailAddress = :email');
      $emailQuery->bindparam(':email', $emailAddress, PDO::PARAM_STR, 255);
      $emailQuery->execute();

      $result = $emailQuery->fetch();
      $db = null;

       // No result means that the email address does not already exist
      if($result == null)
      {
        return true;
      }
      else
      {
        $_SESSION['registerError'] .= "<p>Email address already registered.</p>";
        return false;
      }            
    }
  }          
}

// Password must contain:
// at least 1 number
// at least 1 capital letter
// at least 8 characters long
function validatePassword()
{
    $password = "";

    if(isset($_POST["password"]))
    {
      $password = htmlspecialchars($_POST["password"]);

      // Test at least one number is in the password
      if(!preg_match("/\d/", $password))
      {
        $_SESSION['registerError'] .= "<p>Password must contain a number.</p>";
        return false;
      }
      // Test at least 1 capital letter is in the password
      else if(!preg_match("/[A-Z]/", $password))
      {
        $_SESSION['registerError'] .= "<p>Password must contain a capital letter.</p>";
        return false;
      }
      // Test that the password is at least 8 characters long
      else if(strlen($password) < 8)
      {
        $_SESSION['registerError'] .= "<p>Password must be at least 8 characters.</p>";
        return false;
      }
      else if(htmlspecialchars($_POST['password-check']) != $password)
      {
	      $_SESSION['registerError'] .= "<p>Passwords do  not match.</p>";
	      return false;
      }
      else
	    {
        return true;
      }
    }
 }        
?>
