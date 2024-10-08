<?php
// #2 - Session Variable Values
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Day 05 - Advanced 2</title>
</head>
<body>
  <?php
    // #2 - Session Variable Values
    echo "Favorite color is " . $_SESSION["favcolor"] . "<br>";
    echo "Favorite animal is " . $_SESSION["favanimal"] . "<br>";

    $_SESSION["favcolor"] = "yellow";
    print_r($_SESSION);

    // #3 - destroy a session
    session_unset(); // remove all session variables
    session_destroy(); // destroy the session
  ?>
</body>
</html>