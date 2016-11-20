<?php
require_once('./includes/common.php');

/* Created by Morgan Kovacic */

function isNumeric($field) {
   $isValid = preg_match('/^[0-9]+$/', $field);
   return ($isValid == 1);
}

// Validate and update the attributes submitted on the project form.
function validateUpdate(&$errorMess) {
  include "./includes/mysql.php";
  global $ValidForm;
  global $Username;
  global $Password;
  global $Permissions;

  $errorMess = "";
  $MinStudents = "";
  $MaxStudents = "";
  $ConsiderGPA = 1;
  $ConsiderGender = 1;
  $ValidForm = true;

  if (isset($_POST['MinStudents']))
    $MinStudents = strip_tags(trim($_POST['MinStudents']));
  if (!isNumeric($MinStudents)) {
    $errorMess = $errorMess."-Invalid MinStudents-";
    $ValidForm = false;
  }

  if (isset($_POST['MaxStudents']))
    $MaxStudents = strip_tags(trim($_POST['MaxStudents']));
  if (!isNumeric($MaxStudents)) {
    $errorMess = $errorMess."-Invalid MaxStudents-";
    $ValidForm = false;
  }

  if ($errorMess == "") {
    if ($MinStudents < 4 or $MinStudents > $MaxStudents or $MaxStudents > 6) {
      $errorMess = $errorMess."-Students must be in range 4 to 6-";
      $ValidForm = false;
    }
  }

  $ConsiderGender =  strip_tags(trim($_POST['ConsiderGender']));
  $ConsiderGPA =  strip_tags(trim($_POST['ConsiderGPA']));

  if (!$ValidForm)
    return false;

  // Update project in database with changed attributes

  // Connect to database
  include "./includes/mysql.php";
  $link = mysqli_connect($db_host, $db_user, $db_password, $db_name) or
    die(mysqli_error($link));
  if ($stmt = mysqli_prepare($link,
        "UPDATE project SET MinStudents = ?, MaxStudents = ?, ConsiderGender = ?, ConsiderGPA = ? WHERE ProjectID = ?")) {
        $stmt->bind_param('iiiii', $MinStudents, $MaxStudents, $ConsiderGender, $ConsiderGPA, $_SESSION['ProjectID']);
        $stmt->execute();
    }
    else  {
        $ValidForm = false;
        $errorMess = $errorMess.mysqli_error($link);
    }
  mysqli_close($link);

  return $ValidForm;
}

//check if project attributes form was submitted
if (isset($_POST['SubmitAttributes'])) {
  $errorMess = "";
  if (validateUpdate($errorMess)) {
    unset($_SESSION['errorMess']);
    unset($_POST['SubmitAttributes']);
    header("location: projects.php");
  }
  else {
    $_SESSION['errorMess'] = $errorMess;
    header("location: changeProject.php");
  }
}

?>