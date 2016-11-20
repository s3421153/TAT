<?php

/* Created by Morgan Kovacic */

require_once('./includes/common.php');
include "./includes/tatapi.php";

$ValidForm = true;
$Username = "";
$Password = "";
$Permissions = "";

// Get and validate the username and password submitted on the login form.
function validateLogin() {
  global $ValidForm;
  global $Username;
  global $Password;
  global $Permissions;

  if (isset($_POST['Username']))
    $Username = strip_tags(trim($_POST['Username']));
  if ($Username == "")
    $ValidForm = false;

  if (isset($_POST['Password']))
    $Password = strip_tags(trim($_POST['Password']));
  if ($Password == "")
    $ValidForm = false;

  if (!$ValidForm)
    return false;


  // Validate password with database
  include "./includes/mysql.php";
  $link = mysqli_connect($db_host, $db_user, $db_password, $db_name) or
    die(mysqli_error($link));
  if (!tat_IsValidUser($link, $Username, $Password, $Permissions))
    $ValidForm = false;
  mysqli_close($link);

  return $ValidForm;
}

if (isset($_POST['Login'])) { //check if login form was submitted
  if (validateLogin()) {
    $_SESSION['Username'] = $Username;
    $_SESSION['Permissions'] = $Permissions;
  } else {
    unset($_SESSION['Username']);
    unset($_SESSION['Permissions']);
  }
  unset($_POST['Login']);
  if (isset($_SESSION['Permissions']))
    header("location: mainMenu.php");
  else
    header("location: index.php");
}

?>