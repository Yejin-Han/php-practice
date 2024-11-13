<?php
  include "Html.php";

  use Html as H;
  use Html\Row as R;

  $table = new H\Table();
  $table -> title = "My table";
  $table -> numRows = 5;

  $row = new R();
  $row -> numCells = 3;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Day 07 - Object-Oriented Programming 2</title>
</head>
<body>
  <?php
    // #15 - Static Methods (객체를 생성할 필요 없이 바로 호출 가능)
    // 같은 클래스 내에서 static method 호출하는 경우
    class greeting {
      public static function welcome() {
        echo "Hello World!" . "<br>";
      }

      public function __construct() {
        self::welcome();
      }
    }

    greeting::welcome();


    // 외부에서 static method 호출하는 경우
    class A {
      public static function welcome() {
        echo "Hello World!" . "<br>";
      }
    }

    class B {
      public function message() {
        A::welcome();
      }
    }

    $obj = new B();
    echo $obj -> message();


    // 자식 클래스에서 static method 호출하는 경우
    class domain {
      protected static function getWebsiteName() {
        return "github.com";
      }
    }

    class domainWeb extends domain {
      public $websiteName;
      public function __construct() {
        $this -> websiteName = parent::getWebsiteName();
      }
    }

    $domainWeb = new domainWeb;
    echo $domainWeb -> websiteName;
    echo "<br>";


    // #16 - Static Properties
    class pi {
      public static $value = 3.14159;

      public function staticValue() {
        return self::$value;
      }
    }

    echo pi::$value . "<br>";

    $pi = new pi();
    echo $pi -> staticValue() . "<br>";

    class x extends pi {
      public function xStatic() {
        return parent::$value;
      }
    }

    echo x::$value . "<br>";

    $x = new x();
    echo $x -> xStatic() . "<br>";
    
    
    // #17 - Namespace
    // 1) 클래스 그룹핑
    // 2) 같은 이름을 사용하기 위해
    // $table -> message();

    // $table = new Table();
    // $table -> title = "My table";
    // $table -> numRows = 5;

    $table -> message();
    $row -> message();
    
    
    // #18 - Iterables
    function printIterable(iterable $myIterable) {
      foreach($myIterable as $item) {
        echo $item . "<br>";
      }
    }

    $arr = ["a", "b", "c"];
    printIterable($arr);

    function getIterable():iterable {
      return ["a", "b", "c"];
    }

    $myIterable = getIterable();
    foreach($myIterable as $item) {
      echo $item . "<br>";
    }

    
    // #18-2 - Creating Iterables
    // must have methods
    // - current() : 반복문에서 현재 포인터가 가리키는 요소
    // - key() : 현재 요소의 키 반환(정수, 실수, 논리값, 문자)
    // - next() : 포인터를 다음 요소로 이동
    // - rewind() : 포인터를 처음 요소로 이동
    // - valid() : 포인터가 아무 요소도 가리키고 있지 않으면 false, 나머지 경우에는 true 반환

    class MyIterator implements Iterator {
      private $items = [];
      private $pointer = 0;

      public function __construct($items) {
        // array_values()가 key를 전부 number로 만들어줌
        $this -> items = array_values($items);
      }

      public function current(): mixed {
        return $this -> items[$this -> pointer];
      }

      public function key(): int {
        return $this -> pointer;
      }

      public function next(): void {
        $this -> pointer++;
      }

      public function rewind(): void {
        $this -> pointer = 0;
      }

      public function valid(): bool {
        return $this -> pointer < count($this -> items);
      }
    }

    function printIterable2(iterable $myIterable) {
      foreach($myIterable as $item) {
        echo $item . "<br>";
      }
    }

    $iterator = new MyIterator(["a", "b", "c"]);
    printIterable2($iterator);
  ?>
</body>
</html>