<?php
  # 5 - Cookies
  $cookie_name = "user";
  $cookie_value = "Alex Porter";
  // setcookie(name, value, expire, path, domain, secure, httponly);
  setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1day

  setcookie("user", "", time() - 3600, "/"); // 쿠키 삭제

  // setcookie("test_cookie", "test", time() + 3600, '/');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Day 04 - Advanced</title>
</head>
<body>
  <?php
    # 1 - Date
    echo "Today is " . date("Y/m/d") . "<br>";
    echo "Today is " . date("Y.m.d") . "<br>";
    echo "Today is " . date("Y-m-d") . "<br>";
    echo "Today is " . date("l") . "<br>";
  ?>
  &copy; 2010-<?php echo date("Y") . "<br><br>"; ?>


  <?php
    # 2 - Time
    date_default_timezone_set("Asia/Seoul");
    echo "The time is " . date("h:i:sa") . "<br>";
    $d = mktime(1, 14, 54, 8, 12, 2014);  // unix timestamp(hour, minute, second, month, day, year)
    echo "Created date is " . date("Y-m-d h:i:sa", $d) . "<br>";
    $d = strtotime("10:30pm April 15 2014");
    echo "Created date is " . date("Y-m-d h:i:sa", $d) . "<br>";
    $d = strtotime("tomorrow");
    echo "Tomorrow is " . date("Y-m-d h:i:sa", $d) . "<br>";
    $d = strtotime("next Saturday");
    echo "Next Saturday is " . date("Y-m-d h:i:sa", $d) . "<br>";
    $d = strtotime("+3 Months");
    echo "3 Months after is " . date("Y-m-d h:i:sa", $d) . "<br>";

    $startdate = strtotime("Saturday");
    $enddate = strtotime("+6 weeks", $startdate);

    while($startdate < $enddate) {
      echo date("M d", $startdate) . "<br>";
      $startdate = strtotime("+1 week", $startdate);
    }

    $d1 = strtotime("July 04");
    $d2 = ceil(($d1 - time()) / 60 / 60 / 24);
    echo "There are " . $d2 . "days until 4th of July." . "<br>";
  ?>
  <br>
  <br>
  

  <!-- # 3 - Include -->
  <h1>Welcome to my home page!</h1>
  <p>Some text.</p>
  <p>Some more text.</p>
  <?php include 'vars.php';
    echo "I have a $color $car.";
  ?>
  <?php include 'footer.php'; ?>


  <?php
    # 4 - File
    # 1) READ
    echo readfile("webdictionary.txt") . "<br>"; // 마지막의 236은 읽기에 성공한 파일의 바이트 수

    // better
    $myfile = fopen("webdictionary.txt", "r") or die("Unable to open file!"); // fopen의 mode(r - read only, w - write only, r+ - read and write 등 많이 있음!)
    while(!feof($myfile)) { // end-of-file일 때까지
      echo fgets($myfile) . "<br>"; // 한줄씩
      // echo fgetc($myfile) . "<br>"; // 한글자씩
    }
    $myfile = fopen("webdictionary.txt", "r") or die("Unable to open file!"); // 아마 위에서 커서를 다 다음 줄로 옮겨서 현재 커서가 마지막 커서라 안읽히는듯? 그래서 그냥 새로 불러옴 일단 방법 모르니까.
    echo fread($myfile, filesize("webdictionary.txt")) . "<br>";
    fclose($myfile);

    # 2) CREATE, WRITE
    // 없는 파일을 fopen()하면 파일이 생성됨, fopen "w"모드로 불러오면 안의 내용은 항상 리셋됨
    $myfile2 = fopen("testfile.txt", "w") or die("Unable to open file!");
    $txt = "John Doe\n";
    fwrite($myfile2, $txt);
    $txt = "Jane Doe\n";
    fwrite($myfile2, $txt);
    fclose($myfile2);

    $myfile = fopen("testfile.txt", "w") or die("Unable to open file!");
    $txt = "Mickey Mouse\n";
    fwrite($myfile, $txt);
    $txt = "Minnie Mouse\n";
    fwrite($myfile, $txt);
    fclose($myfile);

    // a 모드로 append data
    $myfile = fopen("testfile.txt", "a") or die("Unable to open file!");
    $txt = "Donald Duck\n";
    fwrite($myfile, $txt);
    $txt = "Goofy Goof\n";
    fwrite($myfile, $txt);
    fclose($myfile);
    echo "<br>";
  ?>

  <!-- # 3) UPLOAD -->
  <form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <button type="submit" name="submit">Upload Image</button>
  </form>
  <br>

  <?php
    # 5 - Cookies
    if(!isset($_COOKIE[$cookie_name])) {
      echo "Cookie named '" . $cookie_name . "' is not set!<br>";
    } else {
      echo "Cookie '" . $cookie_name . "' is set!<br>";
      echo "Value is: " . $_COOKIE[$cookie_name] . "<br>";
    }
    // * 쿠키 삭제 요청 시 브라우저에서 처리가 되어야 쿠키에서 삭제되므로, 새로고침 한번 해야 삭제된 것이 확인 됨!

    if(count($_COOKIE) > 0) {
      echo "Cookies are enabled.";
    } else {
      echo "Cookies are disabled.";
    }
  ?>
</body>
</html>