<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Day03 - Forms</title>
  <style>
    form { box-sizing: border-box; border: 1px solid #000; margin-bottom: 1rem; padding: 1rem; }
    .error { color: #ff0000; }
  </style>
</head>
<body>
  <!-- form handling -->
  <form action="welcome.php" method="POST">
    Name: <input type="text" name="name1"><br>
    E-mail: <input type="text" name="email1"><br>
    <button type="submit">제출</button>
  </form>

  <form action="welcome_get.php" method="GET">
    Name: <input type="text" name="name2"><br>
    E-mail: <input type="text" name="email2"><br>
    <button type="submit">제출</button>
  </form>

  <!-- form validation -->
  <?php
    $vname = $vemail = $vwebsite = $vcomment = $vgender = "";
    $vnameErr = $vemailErr = $vwebsiteErr = $vgenderErr = "";

    if($_SERVER["REQUEST_METHOD"] == "POST") {
      if(empty($_POST["vname"])) {
        $vnameErr = "Name is required";
      } else {
        $vname = test_input($_POST["vname"]);
        // * 정규식
        // - 가-힣a-zA-Z, -, ', 공백 (허용된 문자)
        // - * (앞에 있는 문자들이 0회 이상 나타날 수 있음, 빈 문자열 허용)
        // - $ (문자열의 끝)
        if(!preg_match("/^[가-힣a-zA-Z-' ]*$/", $vname)) {
          $vnameErr = "Only letters and white space allowed";
        }
      }
      if(empty($_POST["vemail"])) {
        $vemailErr = "Email is required";
      } else {
        $vemail = test_input($_POST["vemail"]);
        // * 정규식
        // - filter_var(이메일, 옵션) (옵션에 따라 유효성 검사할 유형이 달라짐)
        // - FILTER_VALIDATE_EMAIL 상수를 사용하면 자동으로 이메일에 대한 유효성 검사를 진행할 수 있다.
        if(!filter_var($vemail, FILTER_VALIDATE_EMAIL)) {
          $vemailErr = "Invalid email format";
        }
      }
      if(empty($_POST["vwebsite"])) {
        $vwebsite = "";
      } else {
        $vwebsite = test_input($_POST["vwebsite"]);
        // * 정규식
        // - \b (단어 경계, URL이 정확히 입력된 부분에서 시작하거나 끝나야 함)
        // - (?: ...) (괄호 안의 패턴을 그룹화)
        // - (?:https?|ftp):\/\/ (https:// or http:// or ftp://)
        // - |www\. (www.로 시작하면 프로토콜 없어도 허용)
        // - /i (대소문자 구분 X)
        // - 즉, 이 구조는 프로토콜(www), 주소 내용[-a-z0-9+&@#\/%?=~_|!:,.;]*, 주소 끝 문자[-a-z0-9+&@#\/%=~_|] 구성이라는 뜻!
        if(!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $vwebsite)) {
          $vwebsiteErr = "Invalid URL";
        }
      }
      if(empty($_POST["vcomment"])) {
        $vcomment = "";
      } else {
        $vcomment = test_input($_POST["vcomment"]);
      }
      if(empty($_POST["vgender"])) {
        $vgenderErr = "Gender is required";
      } else {
        $vgender = test_input($_POST["vgender"]);
      }
    }

    function test_input($data) {
      $data = trim($data); // 맨 앞/뒤의 공백, 개행을 제거
      $data = stripslashes($data); // 백슬래시를 제거, 이중백슬래시는 단일백슬래시로
      $data = htmlspecialchars($data);
      return $data;
    }
  ?>

  <h2>PHP Form Validation Example</h2>
  <p><span class="error">* required field</span></p>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
    Name: <input type="text" name="vname" value="<?php echo $vname; ?>">
    <span class="error">* <?php echo $vnameErr; ?></span>
    <br><br>
    E-mail: <input type="text" name="vemail" value="<?php echo $vemail; ?>">
    <span class="error">* <?php echo $vemailErr; ?></span>
    <br><br>
    Website: <input type="text" name="vwebsite" value="<?php echo $vwebsite; ?>">
    <span class="error"><?php echo $vwebsiteErr; ?></span>
    <br><br>
    Comment: <textarea name="vcomment" rows="5" cols="40"><?php echo $vcomment; ?></textarea>
    <br><br>
    Gender:
    <!-- isset 함수 (변수가 선언되고 있고, null이 아닌 경우에만 true를 반환) -->
    <input type="radio" name="vgender" value="female" <?php if(isset($vgender) && $vgender=="female") echo "checked"; ?>>Female
    <input type="radio" name="vgender" value="male" <?php if(isset($vgender) && $vgender=="male") echo "checked"; ?>>Male
    <input type="radio" name="vgender" value="other" <?php if(isset($vgender) && $vgender=="other") echo "checked"; ?>>Other
    <span class="error">* <?php echo $vgenderErr; ?></span>
    <br><br>
    <button type="submit">제출</button>
  </form>
  <?php
    echo "<h2>Your Input:</h2>";
    echo $vname;
    echo "<br>";
    echo $vemail;
    echo "<br>";
    echo $vwebsite;
    echo "<br>";
    echo $vcomment;
    echo "<br>";
    echo $vgender;
    echo "<br>";
  ?>
</body>
</html>