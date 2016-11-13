<?php
require_once('./includes/common.php');
require_once('./teamAlgorithm.php');
?>
<!--Created by Morgan Kovacic-->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <title>Team Allocation Progress</title>

</script>
</head>

<body>
  <h1>Team Allocation Progress</h1>

  <p>This page shows messages to help testing while the algorithm is running.</p>
  <?php
  teamAlgorithm($_SESSION['CourseID'], $_SESSION['SubjectID']);
  ?>



</body>

</html>