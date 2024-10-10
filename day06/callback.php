<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Day 06 - Advanced 5</title>
</head>
<body>
  <?php
    // #14 - Callback functions
    function my_callback($item) {
      return strlen($item);
    }

    $strings = ["apple", "orange", "banana", "coconut"];
    $lengths = array_map("my_callback", $strings); // 콜백함수 사용
    // $lengths = array_map(function($item) { return strlen($item); }, $strings); // 익명함수 사용
    print_r($lengths);
    echo "<br>";

    
    // #15 - Callbacks in User defind functions
    function exclaim($str) {
      return $str . "! ";
    }

    function ask($str) {
      return $str . "? ";
    }

    function printFormatted($str, $format) {
      echo $format($str) . "<br>";
    }

    printFormatted("Hello world", "exclaim");
    printFormatted("Hello world", "ask");
  ?>
</body>
</html>