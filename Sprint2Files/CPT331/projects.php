<?php
require_once('./includes/common.php');
?>

<!--Created by Morgan Kovacic-->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <title>TAT Projects Maintenance</title>
</head>

<body>
  <h1>TAT - Team Allocation Tool - Project Attributes Maintenance</h1>

  <?php
  if (isset($_SESSION['Permissions']) and $_SESSION['Permissions'] == "Lecturer") {
  // Get and show the details from the project table in the database

  unset($_SESSION['ProjectID']);
  // Connect to database
  include "./includes/mysql.php";
  $link = mysqli_connect($db_host, $db_user, $db_password, $db_name) or
    die(mysqli_error($link));

  $stmt = mysqli_prepare($link, "SHOW COLUMNS FROM project");
  $stmt->execute();
  $result = $stmt->get_result();
  if ($result != "") {
    $numcols = mysqli_num_fields($result);
    print "<table border = 1>\n";
    print "<tr>";
    while ($row = mysqli_fetch_array($result)) {
      if ($row[0] == "ProjectID" or $row[0] == "fkCourseID" or $row[0] == "fkSubjectID")
        print "<td style=\"display:none\"><b>".$row[0]."</b></td>";
      else
        print "<td><b>".$row[0]."</b></td>";
    }
  }

  $stmt = mysqli_prepare($link, "SELECT * FROM project ORDER BY ProjectID");
  $stmt->execute();
  $result = $stmt->get_result();
  if ($result != "") {
    $numcols = mysqli_num_fields($result);
    while ($row = mysqli_fetch_array($result)) {
      print "<tr>";
      for ($i = 0; $i <$numcols; $i++) {
        if ($i == 0 or $i == 6 or $i == 7)
          print "<td style=\"display:none\">".$row[$i]."</td>";
        else
          print "<td>".$row[$i]."</td>";
      }
      print "<td><a href=changeProject.php?id=".$row['ProjectID'].">Edit</a></td>\n";
      print "</tr>\n";
    }
    print "</table>\n";
  }
  mysqli_close($link);
  } else {
    print <<< HERE
  <ul>
      <li>
      <a href="index.php">Login</a>
      </li>
  </ul>
HERE;
  }
  ?>
   <a href="mainMenu.php">Return to Main Menu</a>
</body>

</html>