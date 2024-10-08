<?php
// #1 - Session Start
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Day 05 - Advanced 1</title>
</head>
<body>
  <?php
    // #1 - Sessions
    $_SESSION["favcolor"] = "green";
    $_SESSION["favanimal"] = "cat";
    echo "Session variables are set.";
  ?>
</body>
</html>