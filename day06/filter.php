<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Day 06 - Advanced 4</title>
</head>
<body>
  <?php
    // #6-1 - Validate an integer
    $int = 0;

    if(filter_var($int, FILTER_VALIDATE_INT) === 0 || !filter_var($int, FILTER_VALIDATE_INT) === false) {
      echo("Integer is valid") . "<br>";
    } else {
      echo("Integer is not valid") . "<br>";
    }


    // #7 - Validate an IP Address
    $ip = "127.0.0.1";

    if(!filter_var($ip, FILTER_VALIDATE_IP) === false) {
      echo("$ip is a valid IP address") . "<br>";
    } else {
      echo("$ip is not a valid IP address") . "<br>";
    }


    // #8 - Sanitize and Validate an Email Address
    $email = "john.doe@example.com";

    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    if(!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
      echo("$email is a valid email address") . "<br>";
    } else {
      echo("$email is not a valid email address") . "<br>";
    }


    // #9 - Sanitize and Validate a URL
    $url = "https://www.github.com";

    $url = filter_var($url, FILTER_SANITIZE_URL);

    if(!filter_var($url, FILTER_VALIDATE_URL) === false) {
      echo("$url is a valid URL") . "<br>";
    } else {
      echo("$url is not a valid URL") . "<br>";
    }


    // #10 - Validate an Integer Within a Range
    $int = 122;
    $min = 1;
    $max = 200;

    if(filter_var($int, FILTER_VALIDATE_INT, array("options" => array("min_range" => $min, "max_range" => $max))) === false) {
      echo("Variable value is not within the legal range") . "<br>";
    } else {
      echo("Variable value is within the legal range") . "<br>";
    }


    // #11 - Validate IPv6 Address
    $ip = "2001:0db8:85a3:08d3:1319:8a2e:0370:7334";

    if(!filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) === false) {
      echo("$ip is a valid IPv6 address") . "<br>";
    } else {
      echo("$ip is not a valid IPv6 address") . "<br>";
    }

    
    // #12 - Validate URL - Must Contain QueryString (주소에 /tab?=querystring 의 형태일 때)
    $url = "https://www.github.com";

    if(!filter_var($url, FILTER_VALIDATE_URL, FILTER_FLAG_QUERY_REQUIRED) === false) {
      echo("$url is a valid URL with a query string") . "<br>";
    } else {
      echo("$url is not a valid URL with a query string") . "<br>";
    }


    // #13 - Remove Characters With ASCII Value > 127
    $str = "<h1>Hello WorldÆØÅ!</h1>";

    $newstr = strip_tags($str);
    $newstr = preg_replace('/[\x80-\xFF]/', '', $newstr); // FILTER_SANITIZE_STRING과 FILTER_FLAG_STRIP_HIGH의 지원종료 이유로 정규식 활용

    echo $newstr . "<br>";
  ?>
</body>
</html>