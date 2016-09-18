<?php 

session_start(); 

require('init.php');

// Instantiate User
$theUser = new User();

// set initial login status
$_SESSION['loggedIn'] = $theUser->isLoggedIn();
// clear errors
$_SESSION['loginError'] = '';

// attempt login
if ( isset($_POST['login-submit'])
    && isset($_POST['email']) 
     && !empty($_POST['email']) 
      && isset($_POST['password']) 
       && !empty($_POST['password']) )
{
  // TODO: clean inputs
  $email = $_POST['email'];
  $password = $_POST['password'];

  // try to log in
  $theUser->login( $email, $password );

  // determine success of login attempt
  if ( $theUser->isLoggedIn() ) 
  {
    // user is logged in, set session vars
    $_SESSION['loggedIn'] = $theUser->isLoggedIn();
    $_SESSION['username'] = $theUser->getUsername();
  } 
  else 
  {
    // store error
    $_SESSION['loginError'] = '<p>Invalid credentials. Try again!</p>';

    // return user from whence they came
    $uri = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : $_SERVER['HTTP_HOST'];
    header("Location: $uri");
  }


} 
else 
{
    // store error
    $_SESSION['loginError'] = '<p>There was an error, please enter email and password.</p>';

    // return user from whence they came
    $uri = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : $_SERVER['HTTP_HOST'];
    header("Location: $uri");
}

// Return user to index
header('Location: ../index.php');
exit;

?>
