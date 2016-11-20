<?php
require_once('./includes/common.php');
?>
<!--Created by Morgan Kovacic-->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <title>TAT Team Allocation Algorithm</title>
</head>

<body>
  <h1>TAT - Team Allocation Algorithm</h1>

  <p>This page is used to test the algorithm code. The ProjectID and SubjectID
   that are entered below are passed as parameters to the main allocation function
   called teamAlgorithm($CourseID, $SubjectID) in the backend code that is
   contained in the file teamAlgorithm.php.
  </p>
  <p><b>Test data has been set up for CourseID 1 and SubjectID 331</b></p>

<form method="post" action="checkForm.php" >
        <label for="CourseID">CourseID</label>
        <input type="text" size="10" name="CourseID"/>
        <br />
        <label for="SubjectID">SubjectID</label>
        <input type="text" size="10" name="SubjectID"/>
        <br />

        <br /><input type="submit" name="Allocate" value="Allocate"/>
  </form>

</body>

</html>