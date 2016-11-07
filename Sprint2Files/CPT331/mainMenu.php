<?php
require_once('./includes/common.php');
?>

<!--Created by Morgan Kovacic-->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <title>TAT Main Menu</title>
</head>

<body>
  <h1>TAT - Team Allocation Tool - Main Menu</h1>

  <h2>User Menu Items:</h2>
  <p>Different functions are available depending on user permissions.
     Css formatting will be added to these items when their functionality
     has been completed.</p>

  <?php

  if (isset($_SESSION['Permissions']))
    print "<p>You are currently logged in with ".$_SESSION['Permissions']." permissions.</p>";
    if ($_SESSION['Permissions'] == "Lecturer") {
    print <<< HERE
  <ul>
      <li>
      <a href="projects.php">Project Attributes Maintenance</a>
      </li>
      <li>
      Manually Allocate Students to Team - TODO
      </li>
      </li>
      <li>
      Display and export Team Structure - TODO
      </li>
      <li>
      Email Students Project/Team Allocation - TODO
      </li>
      <li>
      <a href="index.php">Login</a>
      </li>
  </ul>
   <h2>Test Harness Menu Items:</h2>
  <p>The following menu pages are provided to test backend API functions.
     They can pass parameters to and display results from the API functions.</p>
  <ul>
      <li>
      Create Balanced Team Algorithm  - TODO
      </li>
      <li>
      GPA Algorithm - TODO
      </li>
      <li>
      API to capture information from UI team  - TODO
      </li>
      <li>
      TODO - add more items as required
      </li>
  </ul>
HERE;
  } else {
    print <<< HERE
  <ul>
      <li>
      TODO - add "user facing" menu items here
      </li>
      <li>
      TODO - add menu items here for pages used to test backend API functions
      </li>
      <li>
      <a href="index.php">Login</a>
      </li>
  </ul>
HERE;
  }
  ?>

</body>

</html>