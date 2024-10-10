<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Day 06 - Advanced 7</title>
</head>
<body>
  <?php
    // #20 - Throwing an Exception
    function divide($dividend, $divisor) {
      if($divisor == 0) {
        throw new Exception("Division by zero");
      }
      return $dividend / $divisor;
    }

    echo divide(10, 2) . "<br>";
    // echo divide(5, 0) . "<br>"; // Fatal error: Uncaught Exception: Division by zero in C:\Users\AllLiveC\Desktop\gitrepo\php-practice\day06\exception.php:13

    try {
      echo divide(5, 0) . "<br>";
    } catch(Exception $e) {
      echo "Unable to divide." . "<br>";
    }

    try {
      echo divide(5, 0) . "<br>";
    } catch(Exception $e) { // catch block은 안써도 되지만 try에서 에러 발생시 error statement가 그대로 출력됨
      echo "Unable to divide." . "<br>";
    } finally {
      echo "Process complete." . "<br>";
    }

    // #21 - The exception Object
    function divide2($dividend, $divisor) {
      if($divisor == 0) {
        throw new Exception("Division by zero", 1);
      }
      return $dividend / $divisor;
    }

    try {
      echo divide2(5, 0);
    } catch(Exception $ex) {
      $code = $ex -> getCode();
      $message = $ex -> getMessage();
      $file = $ex -> getFile();
      $line = $ex -> getLine();

      echo "Exception thrown in $file on line $line: [Code $code] $message" . "<br>";
    }
  ?>
</body>
</html>