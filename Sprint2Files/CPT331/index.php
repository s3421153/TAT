<?php
require_once('./includes/common.php');
?>

<!--Created by Morgan Kovacic-->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <title>TAT Login</title>
</head>

<body>
  <h1>TAT - Team Allocation Tool</h1>
  <h2>Login</h2>
  <p>This site provides access to the "user facing" pages that the TAT
     Algorithm Team is developing. It also provides pages that can be used to
     access and test backend API functions that do not have specific user
     interfaces.
  </p>

  <form method="post" action="validateLogin.php">

        <label for="Username">User</label>
        <input type="text" size="30" name="Username"/>
        <br />

        <label for="Password">Password</label>
        <input type="password" size="30" name="Password"/>
        * Required
        <br />
        <br /><input type="submit" name="Login" value="Login" />
  </form>

  <?php
  if (isset($_SESSION['Username']))
    echo "You are currently logged in as ".$_SESSION['Username'].
     " with ".$_SESSION['Permissions']." permissions.";
  ?>
  <br />

  <p><b>Hint, login as user Morgan with password Morgan for Lecturer permissions.</b></p>

  <p>(These web pages provide only minimal formatting. Instead
  the emphasis here is on providing access to the functionality of the
  Algorithm API and to enable convenient testing of those functions.)
  </p>

</body>

</html>