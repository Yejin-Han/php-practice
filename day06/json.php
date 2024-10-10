<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Day 06 - Advanced 6</title>
</head>
<body>
  <?php
    // #16 - json_encode
    // #16-1 associative array -> JSON object
    $age = array("Peter" => 35, "Ben" => 37, "Joe" => 43);
    var_dump($age); echo "<br>";
    echo json_encode($age) . "<br>";

    // #16-2 indexed array -> JSON array
    $cars = array("Volvo", "BMW", "Toyota");
    echo json_encode($cars) . "<br>";

    echo "<br>";

    // #17 - json_decode
    // #17-1 JSON object -> PHP object or associative array
    $jsonobj = '{"Peter": 35, "Ben": 37, "Joe": 43}';
    var_dump(json_decode($jsonobj)); echo "<br>";

    // #17-2 default로는 object를 반환, 2nd 파라미터에 true를 넣으면 associative array를 반환
    var_dump(json_decode($jsonobj, true)); echo "<br>";

    echo "<br>";

    // #18 - Accessing the Decoded Values
    $obj = json_decode($jsonobj);

    echo $obj->Peter . "<br>";
    echo $obj->Ben . "<br>";
    echo $obj->Joe . "<br>";

    $arr = json_decode($jsonobj, true);

    echo $arr["Peter"] . "<br>";
    echo $arr["Ben"] . "<br>";
    echo $arr["Joe"] . "<br>";

    // #19 - Looping Through the Values
    foreach($obj as $key => $value) {
      echo $key . " => " . $value . "<br>";
    }

    foreach($arr as $key => $value) {
      echo $key . " => " . $value . "<br>";
    }
  ?>
</body>
</html>