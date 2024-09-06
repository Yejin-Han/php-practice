<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
    # 1
    echo "My first PHP script!" . "<br>";


    # 2
    $color = "red";
    echo "My car is " . $color . "<br>";


    # 3-1 // global variable
    $x = 5;
    function myTest() {
      echo "<p>Variable x inside function is: $x</p>";
    }
    # myTest(); //-> error

    echo "<p>Variable x outside function is: $x</p>";


    # 3-2 // local variable
    function myTest2() {
      $y = 5;
      echo "<p>Variable y inside function is: $y</p>";
    }
    myTest2();

    # echo "<p>Variable y outside function is: $y</p>"; //-> error


    # 3-3 // global keyword
    $a = 5;
    $b = 10;

    function myTest3() {
      global $a, $b;
      $b = $a + $b;
    }
    myTest3();

    echo $b . "<br>"; // output: 15

    function myTest4() {
      $GLOBALS['b'] = $GLOBALS['a'] + $GLOBALS['b'];
    }
    myTest4();
    
    echo $b . "<br>"; // output: 20


    # 3-4 // static keyword (원래 로컬변수는 함수가 종료되면 변수가 삭제되는데, static은 함수에서 실행된 내용을 기억합니당.)
    function myTest5() {
      static $c = 0;
      echo $c . "<br>";
      $c++;
    }

    myTest5();
    myTest5();
    myTest5();


    # 4-1 // display text
    echo "<h2>PHP is Fun!</h2>";
    echo "Hello world!<br>";
    echo "I'm about to learn PHP!<br>";
    echo "This ", "string ", "was ", "made ", "with multiple parameters.";

    print "<h2>PHP is Fun!</h2>";
    print "Hello world!<br>";
    print "I'm about to learn PHP!<br>";
    # print "This ", "string ", "was ", "made ", "with multiple parameters."; //-> error


    # 4-2 // using single quotes
    $txt1 = "Learn PHP";
    $txt2 = "W3Schools.com";

    echo '<h2>' . $txt1 . '</h2>';
    echo '<p>Study PHP at ' . $txt2 . '</p>';

    print '<h2>' . $txt1 . '</h2>';
    print '<p>Study PHP at ' . $txt2 . '</p>';


    # 5-1 // data type
    $d = 5;
    var_dump($d);
    echo "<br>";

    $e = "Hello world!";
    var_dump($e);
    echo "<br>";

    $f = 5985;
    var_dump($f);
    echo "<br>";

    $g = 10.365;
    var_dump($g);
    echo "<br>";

    $h = true;
    var_dump($h);
    echo "<br>";

    $cars = array("Volvo", "BMW", "Toyota");
    var_dump($cars);
    echo "<br>";

    $i = "Hello world!";
    $i = null;
    var_dump($i);
    echo "<br>";


    # 5-2 // object
    class Car {
      public $color;
      public $model;
      public function __construct($color, $model) { // class로부터 object를 만들 때 자동으로 이 function을 호출함
        $this->color = $color;
        $this->model = $model;
      }

      public function message() {
        return "My car is a " . $this->color . " " . $this->model . "!";
      }
    }

    $myCar = new Car("red", "Volvo");
    var_dump($myCar);
    echo "<br>";


    # 5-3 // change data type
    $j = 5;
    var_dump($j);
    echo "<br>";

    $j = (string) $j;
    var_dump($j);
    echo "<br>";


    # 6 // string
    echo strlen($e);
    echo "<br>";

    echo str_word_count($e);
    echo "<br>";

    echo strpos($e, "world");
    echo "<br>";

    echo strtoupper($e);
    echo "<br>";

    echo strtolower($e);
    echo "<br>";

    echo str_replace("world", "Dolly", $e);
    echo "<br>";

    echo strrev($e);
    echo "<br>";

    echo trim(" Hello World! ");
    echo "<br>";

    $k = explode(" ", $e);
    print_r($k);
    echo "<br>";

    $l = "Hello";
    $m = "World";
    $n = $l . " " . $m;
    echo $n;
    echo "<br>";

    echo substr($e, 6, 5);
    echo "<br>";

    echo substr($e, -5, 3);
    echo "<br>";


    # 6-2 // quotation mark inside string - use escape character!
    $sentence = "We are the so-called \"Vikings\" from the north.";
    echo $sentence;
    echo "<br>";
  ?>
</body>
</html>