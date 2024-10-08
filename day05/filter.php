<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Day 05 - Advanced 3</title>
</head>
<body>
  <table>
    <tr>
      <td>Filter Name</td>
      <td>Filter ID</td>
    </tr>
    <?php
      // #4 - Filter Extension (Filter이 가능한 데이터 목록)
      foreach(filter_list() as $id => $filter) {
        echo '<tr><td>' . $filter . '</td><td>' . filter_id($filter) . '</td><tr>';
      }
    ?>
  </table>

  <?php
    // #5 - Sanitize a string
    // filter_var(체크할 변수, 타입)
    $str = "<h1>Hello World!</h1>";
    $newstr = strip_tags($str); // 태그 떼기. htmlspecialchars()는 html 특수문자를 일반 문자로 변환할 뿐임.
    echo $newstr . "<br>";

    // #6 - Validate an integer
    $int = 100;
    if(!filter_var($int, FILTER_VALIDATE_INT) === false) {
      echo("Integer is valid") . "<br>";
    } else {
      echo("Integer is not valid") . "<br>";
    }
  ?>
</body>
</html>