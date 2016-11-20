<?php
/* Created by Morgan Kovacic */

require_once('./includes/common.php');

$ValidForm = true;
$CourseID = "";
$SubjectID = "";

// Get the projectID and UnitID submitted on the main page.
function validateForm() {
  global $ValidForm;
  global $CourseID;
  global $SubjectID;

  if (isset($_POST['CourseID']))
    $CourseID = strip_tags(trim($_POST['CourseID']));
  if ($CourseID == "")
    $ValidForm = false;

  if (isset($_POST['SubjectID']))
    $SubjectID = strip_tags(trim($_POST['SubjectID']));
  if ($SubjectID == "")
    $ValidForm = false;

  return $ValidForm;
}


if (isset($_POST['Allocate'])) { //check if form was submitted
  if (validateForm()) {
    $_SESSION['CourseID'] = $CourseID;
    $_SESSION['SubjectID'] = $SubjectID;
  } else {
    unset($_SESSION['CourseID']);
    unset($_SESSION['SubjectID']);
  }
  unset($_POST['Allocate']);
  header("location: progress.php");
}

?>