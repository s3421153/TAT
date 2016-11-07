<?php
require_once('./includes/common.php');
?>

<!--Created by Morgan Kovacic-->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <title>TAT - Change Project Attributes</title>
</head>

<body>
  <h1>TAT - Team Allocation Tool - Change Project Attributes</h1>

  <?php
  if (isset($_SESSION['ProjectID']))
    $id = $_SESSION['ProjectID'];
  else {
    $id = $_GET['id'];
    $_SESSION['ProjectID'] =  $id;
    unset($_SESSION['errorMess']);
  }
  /* Use the passed ProjectID to display the form for the project which
   is to have its attributes changed. */

   // Connect to database
  include "./includes/mysql.php";
  $link = mysqli_connect($db_host, $db_user, $db_password, $db_name) or
    die(mysqli_error($link));

  if ($stmt = mysqli_prepare($link,
    "SELECT ProjectName, MinStudents, MaxStudents, ConsiderGender, ConsiderGPA FROM project WHERE ProjectID=?")) {
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result != "") {
      while ($row = mysqli_fetch_array($result)) {
        print "<p><b>Project: ".$row['ProjectName']."</b></p>";
        $MinStudents = $row['MinStudents'];
        $MaxStudents = $row['MaxStudents'];
        $ConsiderGender = $row['ConsiderGender'];
        $ConsiderGPA = $row['ConsiderGPA'];
      }
    }
    echo <<< HERE
    <form method="post" action="validateAttributes.php">
        <label for="MinStudents">Min Students (4) </label>
        <input type="text" size="2" name="MinStudents" value=
HERE;
    print $MinStudents;
    echo <<< HERE
        /><br />
        <label for="MaxStudents">Max Students (6)</label>
        <input type="text" size="2" name="MaxStudents" value=
HERE;
    print $MaxStudents;
    echo <<< HERE
        /><br />
        <label for="Consider Gender">Consider Gender </label>
        <select name="ConsiderGender">
        <option value = 1
HERE;
        if ($ConsiderGender == 1)
          echo " selected=\"selected\"";
    echo <<< HERE
        >Yes</option>
        <option value = 0
HERE;
        if ($ConsiderGender == 0)
          echo " selected=\"selected\"";
    echo <<< HERE
        >No</option>
        </select>
        <br />
        <label for="ConsiderGPA">Consider GPA </label>
        <select name="ConsiderGPA">
        <option value = 1
HERE;
        if ($ConsiderGPA == 1)
          echo " selected=\"selected\"";
    echo <<< HERE
        >Yes</option>
        <option value = 0
HERE;
        if ($ConsiderGPA == 0)
          echo " selected=\"selected\"";
        echo <<< HERE
        >No</option>
        </select>
        <br />
        <br /><input type="submit" name="SubmitAttributes" value="Submit Change" />
        <a href="projects.php"><input type="button" name="Cancel" value="Cancel" /></a>

  </form>
HERE;
  }
  mysqli_close($link);
  if (isset($_SESSION['errorMess']))
    print "<p>Error: ".$_SESSION['errorMess']."</p>";
  ?>

</body>

</html>