<?php declare(strict_types=1);
  # 1 // Numbers
  $a = 5;
  $b = 5.34;
  $c = "25";

  var_dump($a);
  echo "<br>";
  var_dump($b);
  echo "<br>";
  var_dump($c);
  echo "<br>";
  echo "<br>";


  # 2 // Integers
  echo PHP_INT_MAX;
  echo "<br>";
  echo PHP_INT_MIN;
  echo "<br>";
  echo PHP_INT_SIZE;
  echo "<br>";

  $d = 5985;
  var_dump(is_int($d));
  echo "<br>";

  $e = 59.85;
  var_dump(is_int($e));
  echo "<br>";
  echo "<br>";


  # 3 // Floats
  echo PHP_FLOAT_MAX;
  echo "<br>";
  echo PHP_FLOAT_MIN;
  echo "<br>";
  echo PHP_FLOAT_DIG;
  echo "<br>";
  echo PHP_FLOAT_EPSILON;
  echo "<br>";

  $f = 10.365;
  var_dump(is_float($f)); // php에서는 float = double이라고 함. 즉, is_float() = is_double()
  echo "<br>";
  echo "<br>";


  # 4 // infinity
  # PHP_FLOAT_MAX보다 큰 숫자는 infinite가 된다.
  # is_finite() / is_infinite()로 체크
  $g = 1.9e411;
  var_dump($g);
  echo "<br>";
  echo "<br>";


  # 5 // NaN
  # is_nan()으로 체크
  $h = acos(8); // arcCos 함수로 -1 ~ 1 사이의 값을 넣지 않으면 NaN을 출력
  var_dump($h);
  echo "<br>";
  echo "<br>";


  # 6 // Numerical strings (hexadecimal은 이제 포함 안됨)
  $i = 5985;
  var_dump(is_numeric($i));
  echo "<br>";

  $j = "5985";
  var_dump(is_numeric($j));
  echo "<br>";

  $k = "59.85" + 100;
  var_dump(is_numeric($k));
  echo "<br>";

  $l = "Hello";
  var_dump(is_numeric($l));
  echo "<br>";
  echo "<br>";


  # 7 // Casting
  # 1) cast to string
  $s1 = 5;
  $s2 = 5.34;
  $s3 = "hello";
  $s4 = true;
  $s5 = NULL;

  $s1 = (string) $s1;
  $s2 = (string) $s2;
  $s3 = (string) $s3;
  $s4 = (string) $s4;
  $s5 = (string) $s5;

  var_dump($s1); echo "<br>";
  var_dump($s2); echo "<br>";
  var_dump($s3); echo "<br>";
  var_dump($s4); echo "<br>";
  var_dump($s5); echo "<br>";
  
  # 2) cast to integer
  $i1 = 5;
  $i2 = 5.54;
  $i3 = "25 kilometers";
  $i4 = "kilometers 25";
  $i5 = "hello";
  $i6 = true;
  $i7 = NULL;
  

  $i1 = (int) $i1;
  $i2 = (int) $i2;
  $i3 = (int) $i3;
  $i4 = (int) $i4;
  $i5 = (int) $i5;
  $i6 = (int) $i6;
  $i7 = (int) $i7;

  var_dump($i1); echo "<br>";
  var_dump($i2); echo "<br>";
  var_dump($i3); echo "<br>";
  var_dump($i4); echo "<br>";
  var_dump($i5); echo "<br>";
  var_dump($i6); echo "<br>";
  var_dump($i7); echo "<br>";

  # 3) cast to float
  $f1 = 5;
  $f2 = 5.34;
  $f3 = "25 kilometers";
  $f4 = "kilometers 25";
  $f5 = "hello";
  $f6 = true;
  $f7 = NULL;

  $f1 = (float) $f1;
  $f2 = (float) $f2;
  $f3 = (float) $f3;
  $f4 = (float) $f4;
  $f5 = (float) $f5;
  $f6 = (float) $f6;
  $f7 = (float) $f7;

  var_dump($f1); echo "<br>";
  var_dump($f2); echo "<br>";
  var_dump($f3); echo "<br>";
  var_dump($f4); echo "<br>";
  var_dump($f5); echo "<br>";
  var_dump($f6); echo "<br>";
  var_dump($f7); echo "<br>";

  # 4) cast to boolean
  $b1 = 5;
  $b2 = 5.34;
  $b3 = 0;
  $b4 = -1;
  $b5 = 0.1;
  $b6 = "hello";
  $b7 = "";
  $b8 = true;
  $b9 = NULL;

  $b1 = (bool) $b1;
  $b2 = (bool) $b2;
  $b3 = (bool) $b3;
  $b4 = (bool) $b4;
  $b5 = (bool) $b5;
  $b6 = (bool) $b6;
  $b7 = (bool) $b7;
  $b8 = (bool) $b8;
  $b9 = (bool) $b9;

  var_dump($b1); echo "<br>";
  var_dump($b2); echo "<br>";
  var_dump($b3); echo "<br>";
  var_dump($b4); echo "<br>";
  var_dump($b5); echo "<br>";
  var_dump($b6); echo "<br>";
  var_dump($b7); echo "<br>";
  var_dump($b8); echo "<br>";
  var_dump($b9); echo "<br>";

  # 5) cast to array
  $a1 = 5;
  $a2 = 5.34;
  $a3 = "hello";
  $a4 = true;
  $a5 = NULL;

  $a1 = (array) $a1;
  $a2 = (array) $a2;
  $a3 = (array) $a3;
  $a4 = (array) $a4;
  $a5 = (array) $a5;

  var_dump($a1); echo "<br>";
  var_dump($a2); echo "<br>";
  var_dump($a3); echo "<br>";
  var_dump($a4); echo "<br>";
  var_dump($a5); echo "<br>";

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
  $myCar = (array) $myCar;
  var_dump($myCar); echo "<br>";

  # 6) cast to object
  $o1 = 5;
  $o2 = 5.34;
  $o3 = "hello";
  $o4 = true;
  $o5 = NULL;

  $o1 = (object) $o1;
  $o2 = (object) $o2;
  $o3 = (object) $o3;
  $o4 = (object) $o4;
  $o5 = (object) $o5;

  var_dump($o1); echo "<br>";
  var_dump($o2); echo "<br>";
  var_dump($o3); echo "<br>";
  var_dump($o4); echo "<br>";
  var_dump($o5); echo "<br>";

  $o6 = array("Volvo", "BMW", "Toyota"); //indexed array
  $o7 = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43"); //associative array

  $o6 = (object) $o6;
  $o7 = (object) $o7;

  var_dump($o6); echo "<br>";
  var_dump($o7); echo "<br>";

  # 7) cast to null
  $n1 = 5;
  $n2 = 5.34;
  $n3 = "hello";
  $n4 = true;
  $n5 = NULL;

  unset($n1); // $n2 = (unset) $n2;와 같은 unset cast는 삭제되었고, unset 함수로 아예 variable을 삭제하는 방법만이 남았다.
  unset($n2);
  unset($n3);
  unset($n4);
  unset($n5);
  echo "<br>";
  

  # 8 // Math
  # 1) pi()
  echo(pi()); echo "<br>";

  # 2) min(), max()
  echo(min(0, 150, 30, 20, -8, -200)); echo " ";
  echo(max(0, 150, 30, 20, -8, -200)); echo "<br>";

  # 3) abs()
  echo(abs(-6.7)); echo "<br>";

  # 4) sqrt()
  echo(sqrt(64)); echo "<br>";

  # 5) round()
  echo(round(0.60)); echo " ";
  echo(round(0.49)); echo "<br>";

  # 6) random numbers
  echo(rand()); echo " ";
  echo(rand(10, 100)); echo "<br>";


  # 9 // Constants
  // 상수 생성 (1)
  define("GREETING", "Welcome to HERE!");
  echo GREETING; echo "<br>";

  // 상수 생성 (2)
  const MYCAR = "Volvo"; // 함수나 if조건문 등의 안에서 생성될 수는 없음
  echo MYCAR; echo "<br>";

  // 배열 상수
  define("cars", [
    "Alfa Romeo",
    "BMW", 
    "Toyota"
  ]);
  echo cars[0]; echo "<br>";

  // 자동으로 전역으로 선언
  function myTest() {
    echo GREETING;
  }

  myTest();
  echo "<br>";
  echo "<br>";


  # 10 // Magic Constants (Predefined Constants)
  # __CLASS__ : 클래스 안에서 사용하면 클래스명 반환
  # __DIR__ : 파일 경로
  # __FILE__ : 현재 파일을 포함한 경로
  # __FUNCTION__ : 함수 안에서 사용하면 함수명 반환
  # __LINE__ : 현재 라인 번호
  # __METHOD__ : 클래스에 속하는 함수에서 사용하면 클래스명, 함수명 반환
  # __NAMESPACE__ : 네임스페이스 안에서 사용하면 네임스페이스명 반환
  # __TRAIT__ : trait 안에서 사용하면 trait명 반환
  # ClassName::class : 명시된 클래스명과 네임스페이스명 반환


  # 11 // Operators
  // Arithmetic: +, -, *, /, %, **
  // Assignment: x = y, x += y, x -= y, x *= y, x /= y, x %= y
  // Comparison: ==, ===, !=, <>, !==, >, <, >=, <=, <=>(Spaceship, left보다 작거나 같은지 / right보다 크거나 같은지)
  // Increment/Decrement: x++, ++x, x--, --x
  // Logical: and, or, xor(x or y가 true이나 둘 다 true면 안딤), &&, ||, !
  // String: $txt1 . $txt2(concatenation of $txt1 and $txt2), $txt1 .= $txt2(appends $txt2 to $txt1)
  // Array: +(Union), ==, ===, !=, <>, !== (나머진 다 return boolean)
  // Conditional Assignment: ?:(Ternary, 삼항연산자), ??(Null coalescing, expr1 ?? expr2일 때, expr1이 있으면 값은 expr1, 없고 expr2만 있으면 값은 expr2)


  # 12 // If Else Elseif
  # 13 // Switch
  # 14 // Loops (while, do while, for, foreach)

  # *Associative Array's 순회
  $members = array("Peter" => "35", "Ben" => "37", "Joe" => "43");

  foreach($members as $x => $y) {
    echo "$x: $y <br>";
  }

  # array 순회 중에 array item을 바꾸는 것은 original array에 영향 없지만, & 문자를 사용하면 reference에 지정되면서 original array의 array item도 바꿀 수 있다.
  $colors = array("red", "green", "blue", "yellow");

  foreach($colors as &$x) {
    if($x == "blue") $x = "pink";
  }

  var_dump($colors); echo "<br>"; echo "<br>";

  /* 이렇게도 표현할 수 이따
  foreach($colors as $x) :
    echo "$x <br>";
  endforeach;
    */


  # 15 // Function
  # variable number of arguments
  function sumMyNumbers(...$x) {
    $n = 0;
    $len = count($x);
    for($i = 0; $i < $len; $i++) {
      $n += $x[$i];
    }

    return $n;
  }

  $a = sumMyNumbers(5, 2, 6, 2, 7, 7);
  echo $a; echo "<br>";

  function myFamily($lastname, ...$firstname) {
    $txt = "";
    $len = count($firstname);
    for($i = 0; $i < $len; $i++) {
      $txt = $txt. "Hi, $firstname[$i] $lastname.<br>";
    }

    return $txt;
  }

  $a = myFamily("Doe", "Jane", "John", "Joey");
  echo $a; echo "<br>";

  # php 파일에 최상단(html 기본 태그 없애고)에 declare(strict_types=1);를 선언하면, type declarations for the return statement가 가능해짐
  function addNumbers(float $a, float $b) : float {
    return $a + $b;
  }
  echo addNumbers(1.2, 5.2); echo "<br>"; echo "<br>";


  # 16 // Arrays
  // foreach 순회 중에 배열 아이템의 값을 바꿀 때, $x를 사용했다면 $x가 배열의 마지막 아이템으로 사용되게 되므로, unset해줘야 한다.
  $cars = array("Volvo", "BMW", "Toyota");
  foreach($cars as &$x) {
    $x = "Ford";
  }
  // $x = "ice cream"; // 배열의 마지막 요소가 됨
  unset($x);

  var_dump($cars); echo "<br>";

  // 추가
  $fruits = array("Apple", "Banana", "Cherry");
  $fruits[] = "Orange";

  var_dump($fruits); echo "<br>";

  $cars = array("brand" => "Ford", "model" => "Mustang");
  $cars["color"] = "Red";

  var_dump($cars); echo "<br>";

  array_push($fruits, "Kiwi", "Lemon");
  var_dump($fruits); echo "<br>";

  $cars += ["year" => 1964, "modifying" => "amazing"];
  var_dump($cars); echo "<br>";

  // 삭제
  array_splice($cars, 1, 2);
  var_dump($cars); echo "<br>";

  unset($fruits[1]);
  var_dump($fruits); echo "<br>"; 

  unset($cars["modifying"]);
  var_dump($cars); echo "<br>";

  $new_cars = array("brand" => "Ford", "model" => "Mustang");
  var_dump(array_diff($cars, $new_cars)); echo "<br>"; //l, r 모두에서 같은 요소는 제외하고 다른 요소들 중에서 l을 기준으로 출력해주는 듯

  array_pop($fruits); //배열 마지막 요소 제거 후 그 값을 반환
  var_dump($fruits); echo "<br>";

  array_shift($fruits); //배열 첫번째 요소 제거 후 그 값을 반환
  var_dump($fruits); echo "<br>";

  // 정렬
  // 1) sort - 오름차순 정렬
  $cars = array("Volvo", "BMW", "Toyota");
  sort($cars);
  var_dump($cars); echo "<br>";

  $nums = array(4, 6, 2, 22, 11);
  sort($nums);
  var_dump($nums); echo "<br>";

  // 2) rsort - 내림차순 정렬
  rsort($cars);
  var_dump($cars); echo "<br>";

  rsort($nums);
  var_dump($nums); echo "<br>";

  // 3) asort - value에 따른 오름차순 정렬
  $age = array("Peter" => "35", "Ben" => "37", "Joe" => "43");
  asort($age);
  var_dump($age); echo "<br>";
  
  // 4) ksort - key에 따른 오름차순 정렬
  ksort($age);
  var_dump($age); echo "<br>";

  // 5) arsort - value에 따른 내림차순 정렬
  arsort($age);
  var_dump($age); echo "<br>";
  
  // 6) krsort - key에 따른 내림차순 정렬
  krsort($age);
  var_dump($age); echo "<br>";

  // Multi-dimensional 배열
  $cars = array(
    array("Volvo", 22, 18),
    array("BMW", 15, 13),
    array("Saab", 5, 2),
    array("Land Rover", 17, 15)
  );

  for($i = 0; $i < count($cars); $i++) {
    echo "<p><b>Row number $i</b></p>";
    echo "<ul>";
    for($j = 0; $j < count($cars[0]); $j++) {
      echo "<li>".$cars[$i][$j]."</li>";
    }
    echo "</ul>";
  }
  echo "<br>";


  # 17 // Superglobals
  # $GLOBALS
  # $_SERVER // headers, paths, and script locations에 대한 정보
  # $_REQUEST // form, cookie 데이터에서 제출된걸 담고 있음 ($_GET, $_POST, $_COOKIE)
  # $_POST
  # $_GET
  // Global Variables
  $x = 75;
  function myfunction() {
    echo $GLOBALS['x']; echo "<br>"; // global로 선언한 변수를 함수 안에서 그냥 사용할 수 없음
  }
  
  myfunction();

  function myfunction2() {
    global $x;  // 함수 안에서 global 선언하는 법
    echo $x;
    echo "<br>";
  }

  myfunction2();
  echo "<br>";


  # 18 // Regular Expressions
  # 1) preg_match()
  $str = "Visit W3Schools";
  $pattern = "/w3schools/i"; //i는 case-insensitive하게 만드는 modifier (m은 multiline search, u는 utf-8 encoded pattern과 매칭 가능하게)
  echo preg_match($pattern, $str);
  echo "<br>";

  # 2) preg_match_all()
  $str = "The rain in SPAIN falls mainly on the plains.";
  $pattern = "/ain/i";
  echo preg_match_all($pattern, $str);
  echo "<br>";

  # 3) preg_replace()
  $str = "Visit Microsoft!";
  $pattern = "/microsoft/i";
  echo preg_replace($pattern, "W3Schools", $str);
  echo "<br>"; echo "<br>";
?>

<!-- $_REQUEST, $_GET, $_POST 예시 -->
<html>
<body>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  Name: <input type="text" name="fname">
  <input type="submit">
</form>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = htmlspecialchars($_REQUEST['fname']);
  if(empty($name)) {
    echo "Name is empty"; echo "<br>";
  } else {
    echo $name; echo "<br>";
  }
}
?>

<a href="demo_phpfile.php?subject=PHP&web=W3school.com"> Test $GET</a>

<form action="welcome_get.php" method="GET">
  Name: <input type="text" name="name">
  E-mail: <input type="text" name="email">
  <button type="submit">제출</button>
</form>

</body>
</html>
