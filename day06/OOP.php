<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Day 06 - Object-Oriented Programming 1</title>
</head>
<body>
  <?php
    // #1 - Define a Class
    class Fruit {
      // Properties
      public $name;
      public $color;

      // Methods
      function set_name($name) {
        $this -> name = $name;
      }
      function get_name() {
        return $this -> name;
      }
      function set_color($color) {
        $this -> color = $color;
      }
      function get_color() {
        return $this -> color;
      }
    }
    
    // #2 - Define Objects
    $apple = new Fruit();
    $banana = new Fruit();
    $banana -> set_name('Banana');
    echo $banana -> get_name() . "<br>";

    $apple -> set_name('Apple');
    $apple -> set_color('Red');
    
    echo "Name: " . $apple -> get_name() . "<br>";
    echo "Color: " . $apple -> get_color() . "<br>";

    // #3 - $this keyword
    class Fruit2 {
      public $name;

      function set_name($name) {
        $this -> name = $name; // class 안에서 $this 사용
      }
    }

    $orange = new Fruit();
    $orange -> set_name("Orange");
    // $orange -> name = "Orange"; // class 밖에서 property value 직접 변경

    echo $orange -> name . "<br>";

    // #4 - instanceof
    var_dump($orange instanceof Fruit); echo "<br>";


    // #5 - Constructor // object를 생성할 때 자동으로 호출되는 함수
    class Fruit3 {
      public $name;
      public $color;

      function __construct($name, $color) { // 아 객체를 생성한 후 별도로 set method를 호출하여 값을 설정할 필요가 없어서 코드가 간결해짐
        $this -> name = $name;
        $this -> color = $color;
      }

      function get_name() {
        return $this -> name;
      }
      function get_color() {
        return $this -> color;
      }
    }

    $berry1 = new Fruit3("Strawberry", "red");
    echo $berry1 -> get_name() . "<br>";
    echo $berry1 -> get_color() . "<br>";


    // #6 - Destructor // object가 destructed될 때, script의 끝에서 자동으로 호출되는 함수
    class Fruit4 {
      public $name;
      public $color;

      function __construct($name, $color) {
        $this -> name = $name;
        $this -> color = $color;
      }

      function __destruct() {
        echo "The fruit is {$this -> name} and the color is {$this -> color}." . "<br>";
      }
    }

    $berry2 = new Fruit4("Blueberry", "blue");


    // #7 - Access Modifiers
    // public - (default) 어디서나 접근 가능
    // protected - class 내부에서, 그 class에서 상속받은 자식 클래스에서 접근 가능
    // private - class 내부에서만 접근 가능

    class Fruit5 {
      public $name;
      protected $color;
      private $weight;
    }

    $mango = new Fruit5();
    $mango -> name = 'Mango'; // Ok
    // $mango -> color = 'Yellow'; // Error
    // $mango -> weight = '300'; // Error

    class Fruit6 {
      public $name;
      public $color;
      public $weight;

      function set_name($n) {
        $this -> name = $n;
      }
      protected function set_color($c) {
        $this -> color = $c;
      }
      private function set_weight($w) {
        $this -> weight = $w;
      }
    }

    $mango = new Fruit6();
    $mango -> set_name('Mango'); // Ok
    // $mango -> set_color('Yellow'); // Error
    // $mango -> set_weight('300'); // Error


    // #8 - Inheritance
    class Fruit7 {
      public $name;
      public $color;
      public function __construct($name, $color) {
        $this -> name = $name;
        $this -> color = $color;
      }
      protected function intro() {
        echo "The fruit is {$this -> name} and the color is {$this -> color}." . "<br>";
      }
    }

    class Raspberry extends Fruit7 {
      public function message() {
        echo "Am I a fruit or a berry?" . "<br>";
        
        $this -> intro(); // protected function을 호출하려면 extends된 class 내부에서 호출해야 함
      }
    }

    $berry3 = new Raspberry("Raspberry", "red");
    $berry3 -> message();


    // #9 - Overriding Inherited Methods
    class Blackberry extends Fruit7 {
      public $weight;
      public function __construct($name, $color, $weight) { // overriding
        $this -> name = $name;
        $this -> color = $color;
        $this -> weight = $weight;
      }
      public function intro() { // overriding
        echo "The fruit is {$this -> name}, the color is {$this -> color}, and the weight is {$this -> weight} gram." . "<br>";
      }
    }

    $berry4 = new Blackberry("Blackberry", "black", 50);
    $berry4 -> intro();

    // #10 - final keyword // class inheritance나 method overriding을 막기 위한 키워드
    # final class Fruit {
    #   ...
    # }
    # class Strawberry extends Fruit { // Class Strawberry may not inherit from final class (Fruit)
    #   ...
    # }

    # class Fruit {
    #   final public function intro() {
    #     ...
    #   }
    # }
    # class Strawberry extends Fruit {
    #   public function intro() { // Cannot override final method Fruit::intro()
    #     ...
    #   }
    # }
    

    // #11 - Class constants
    class Goodbye {
      const LEAVING_MESSAGE = "Thank you for visiting my Github page!";
      public function byebye() {
        echo self::LEAVING_MESSAGE . "<br>";
      }
    }

    echo Goodbye::LEAVING_MESSAGE . "<br>";
    $goodbye = new Goodbye();
    $goodbye -> byebye();


    // #12 - Abstract Classes (직접 객체를 만들 수 없고, 다른 클래스가 이 추상 클래스를 상속하고 그 안의 추상 메서드들을 구현하게 되는 클래스. 추상 클래스는 하나 이상의 추상 메서드를 포함해야 함.)
    // Parent class
    abstract class Car {
      public $name;
      public function __construct($name) {
        $this -> name = $name;
      }
      abstract public function intro() : string;
    }

    // Child classes
    class Audi extends Car {
      public function intro() : string {
        return "Choose German quality! I'm an {$this -> name}! <br>";
      }
    }

    class Volvo extends Car {
      public function intro() : string {
        return "Proud to be Swedish! I'm a {$this -> name}! <br>";
      }
    }

    class Citroen extends Car {
      public function intro() : string {
        return "French extravagance! I'm a {$this -> name}! <br>";
      }
    }

    $audi = new Audi("Audi");
    echo $audi -> intro();

    $volvo = new Volvo("Volvo");
    echo $volvo -> intro();

    $citroen = new Citroen("Citroen");
    echo $citroen -> intro();

    // Parent class
    abstract class NamingClass {
      abstract protected function prefixName($name);
    }
    
    // Child class
    class NamedClass extends NamingClass {
      public function prefixName($name, $seperator = ".", $greet = "Dear") {
        if($name == "John Doe") {
          $prefix = "Mr.";
        } elseif($name == "Jane Doe") {
          $prefix = "Mrs.";
        } else {
          $prefix = "";
        }

        return "{$greet} {$prefix}{$seperator} {$name}";
      }
    }

    $name = new NamedClass;
    echo $name -> prefixName("John Doe") . "<br>";
    echo $name -> prefixName("Jane Doe") . "<br>";


    // #13 - Interfaces (여러 클래스가 공통적으로 사용할 클래스를 구현)
    // Abstract Class와의 차이점
    # - interfaces는 properties가 없음
    # - interface methods는 public이어야 함
    # - interface는 메서드 이름과 파라미터만 선언, 실제 구현은 인터페이스를 구현하는 클래스에서
    # - 한 클래스가 여러 interface를 다중으로 구현할 수 있음

    interface Animal {
      public function makeSound();
    }

    class Cat implements Animal {
      public function makeSound() {
        echo " Meow ";
      }
    }

    class Dog implements Animal {
      public function makeSound() {
        echo " Bark ";
      }
    }

    class Mouse implements Animal {
      public function makeSound() {
        echo " Squeak ";
      }
    }

    $cat = new Cat();
    $dog = new Dog();
    $mouse = new Mouse();
    $animals = array($cat, $dog, $mouse);

    foreach($animals as $animal) {
      $animal -> makeSound();
    }
    echo "<br>";


    // #14 - Traits (여러 클래스에서 동일한 기능을 공유할 수 있게 하는 방법)
    trait message1 {
      public function msg1() {
        echo "OOP is fun!" . "<br>";
      }
    }
    trait message2 {
      public function msg2() {
        echo "OOP reduces code duplication!" . "<br>";
      }
    }

    class Welcome {
      use message1;
    }
    class Welcome2 {
      use message1, message2;
    }

    $obj = new Welcome();
    $obj -> msg1();
    $obj2 = new Welcome2();
    $obj2 -> msg1();
    $obj2 -> msg2();
  ?>
</body>
</html>