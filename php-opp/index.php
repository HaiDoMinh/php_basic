<?php
    //namespace Html;
    echo "<b>PHP OOP - Classes and Objects</b>";
    echo "<pre>";
        class Fruit {
            // Properties
            public $name;
            public $color;

            // Methods
            function setName($name) {
                $this->name = $name;
            }
            function getName() {
                return $this->name;
            }
            function setColor($color) {
                $this->color = $color;
            }
            function getColor() {
                return $this->color;
            }
        }

        $apple = new Fruit();
        $apple->setName('Apple');
        $apple->setColor('Red');
        echo "Name: " . $apple->getName();
        echo "<br>";
        echo "Color: " . $apple->color . '<br>';
        echo "Color: " . $apple->getColor() . '<br>';
        var_dump($apple instanceof Fruit);

        echo "<pre>========================================================";
        echo "</pre>";
    echo "</pre>";

    echo "<b>PHP OOP - Constructor</b>";
    echo "<pre>";
        class Fruit2 {
            public $name;
            public $color;

            function __construct($name, $color) {
                $this->name = $name;
                $this->color = $color;
            }
            function getName() {
                return $this->name;
            }
            function getColor() {
                return $this->color;
            }
        }

        $apple = new Fruit2("Apple", "red");
        echo $apple->getName();
        echo "<br>";
        echo $apple->getColor();

    echo "<pre>========================================================";
    echo "</pre>";
    echo "</pre>";

    echo "<b>PHP OOP - Destructor</b>";
    echo "<pre>";
        class Fruit3 {
            public $name;
            public $color;

            function __construct($name, $color) {
                $this->name = $name;
                $this->color = $color;
            }
            function __destruct() {
                echo "The fruit is {$this->name} and the color is {$this->color}.";
            }
        }

        $apple = new Fruit3("Apple", "red");

        echo "<pre>========================================================";
        echo "</pre>";
    echo "</pre>";

    echo "<b>PHP OOP - Access Modifiers</b>";
    echo "<pre>";
        class Fruit4 {
            public $name; // truy cap moi noi
            protected $color; // truy câp trong class và các class dẫn xuất của nó
            private $weight; // chỉ được truy cập trong class

            function setName($name) {  // a public function (default)
                $this->name = $name;
            }
            protected function setColor($color) { // a protected function
                $this->color = $color;
            }
            private function setWeight($weight) { // a private function
                $this->weight = $weight;
            }
        }

        $mango = new Fruit4();
        $mango->name = 'Mango'; // OK
        //$mango->color = 'Yellow'; // ERROR
        //$mango->weight = '300'; // ERROR

        $mango->setName('Mango'); // OK
        //$mango->setColor('Yellow'); // ERROR
        //$mango->setWeight('300'); // ERROR

        echo "<pre>========================================================";
        echo "</pre>";
    echo "</pre>";

    echo "<b>PHP OOP - Inheritance</b>"; //kế thừa
    echo "<pre>";
        class Fruit5 {
            public $name;
            public $color;
            public function __construct($name, $color) {
                $this->name = $name;
                $this->color = $color;
            }
            public function intro() {
                echo "The fruit is {$this->name} and the color is {$this->color}.";
            }
            protected function intro2() {
                echo "The fruit is {$this->name} and the color is {$this->color}.";
            }

        }

        // Strawberry is inherited from Fruit
        class Strawberry extends Fruit5 {
            public $weight;
            public function __construct($name, $color, $weight) {
                $this->name = $name;
                $this->color = $color;
                $this->weight = $weight;
            }
            public function message() {
                echo "Am I a fruit or a berry? ";
            }

            public function message2() {
                $this -> intro();
            }

            public function intro() {
                echo "The fruit is {$this->name}, the color is {$this->color}, and the weight is {$this->weight} gram.";
            }
        }
        $strawberry = new Strawberry("Strawberry", "red", 50);
        $strawberry->message();
        echo '<br>';
        $strawberry->intro(); // ghi de ham intro
        echo '<br>';
        //$strawberry->intro2(); // ERROR. intro2() is protected
        $strawberry->message(); // goi message() public ( message goi intro ben trong class).

        class Fruit6 {
            final public function intro() {
                // some code
            }
        }

        class Strawberry2 extends Fruit6 {
            // Error final ngăn không cho kế thừa.
//            public function intro() {
//
//            }
        }
        echo "<pre>========================================================";
        echo "</pre>";
    echo "</pre>";

    echo "<b>PHP OOP - Class Constants</b>";
    echo "<pre>";
        class Goodbye {
            const LEAVING_MESSAGE = "Thank you for visiting W3Schools.com!";
            public function byebye() {
                echo self::LEAVING_MESSAGE;
            }
        }

        echo Goodbye::LEAVING_MESSAGE;
        $goodbye = new Goodbye();
        echo '<br>';
        $goodbye->byebye();

    echo "<pre>========================================================";
    echo "</pre>";
    echo "</pre>";

    echo "<b>PHP OOP - Abstract Classes</b>";
    echo "<pre>";
        // Parent class
        abstract class Car {
            public $name;
            public function __construct($name) {
                $this->name = $name;
            }
            abstract public function intro() : string;
        }

        // Child classes
        class Audi extends Car {
            public function intro() : string {
                return "Choose German quality! I'm an $this->name!";
            }
        }

        class Volvo extends Car {
            public function intro() : string {
                return "Proud to be Swedish! I'm a $this->name!";
            }
        }

        class Citroen extends Car {
            public function intro() : string {
                return "French extravagance! I'm a $this->name!";
            }
        }

        // Create objects from the child classes
        $audi = new audi("Audi");
        echo $audi->intro();
        echo "<br>";

        $volvo = new volvo("Volvo");
        echo $volvo->intro();
        echo "<br>";

        $citroen = new citroen("Citroen");
        echo $citroen->intro();
        echo "<br>";

        abstract class ParentClass {
            // Abstract method with an argument
            abstract protected function prefixName($name);
        }

        class ChildClass extends ParentClass {
            // The child class may define optional arguments that are not in the parent's abstract method
            public function prefixName($name, $separator = ".", $greet = "Dear") {
                if ($name == "John Doe") {
                    $prefix = "Mr";
                } elseif ($name == "Jane Doe") {
                    $prefix = "Mrs";
                } else {
                    $prefix = "";
                }
                return "{$greet} {$prefix}{$separator} {$name}";
            }
        }

        $class = new ChildClass;
        echo $class->prefixName("John Doe");
        echo "<br>";
        echo $class->prefixName("Jane Doe");
        echo "<pre>========================================================";
        echo "</pre>";
    echo "</pre>";

    echo "<b>PHP OOP - Interfaces</b>";//
    echo "<pre>";
        interface Animal {
            const LEAVING_MESSAGE = "Thank you for visiting W3Schools.com!";
            public function makeSound();
        }

        class Cat implements Animal {
            public function makeSound() {
                echo "Meow";
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

        $animal1 = new Cat();
        $animal1->makeSound();
        echo '<br>';

        $cat = new Cat();
        $dog = new Dog();
        $mouse = new Mouse();
        $animals = array($cat, $dog, $mouse);

        // Tell the animals to make a sound
        foreach($animals as $animal) {
            $animal->makeSound();
        }

        echo "<pre>========================================================";
        echo "</pre>";
    echo "</pre>";

    echo "<b>PHP OOP - Traits</b>"; // nhóm các method mà muốn include vào class khác. Hình thức của copy paste
    echo "<pre>";
        trait message1 {
            public function messageTrait1() {
                echo "OOP is fun! ";
            }
        }

        trait message2 {
            public function messageTrait2() {
                echo "OOP reduces code duplication!";
            }
        }

        class Welcome {
            use message1;
        }

        class Welcome2 {
            use message1, message2;
        }

        $obj = new Welcome();
        $obj->messageTrait1();
        echo "<br>";

        $obj2 = new Welcome2();
        $obj2->messageTrait1();
        $obj2->messageTrait2();
        echo "<pre>========================================================";
        echo "</pre>";
    echo "</pre>";

    echo "<b>PHP OOP - Static Methods</b>"; //
    echo "<pre>";
        class greeting {
            public static function welcome() {
                echo "Hello World!";
            }

            public function __construct() {
                self::welcome();
            }
        }

        class SomeOtherClass {
            public function message() {
                greeting::welcome();
            }
        }
        // Call static method
        greeting::welcome();
        echo '<br>';
        new greeting();
        echo '<br>';

        class domain {
            protected static function getWebsiteName() {
                return "W3Schools.com";
            }
        }

        class domainW3 extends domain {
            public $websiteName;
            public function __construct() {
                $this->websiteName = parent::getWebsiteName(); // tham chiếu đối tượng lớp cha
            }
        }

        $domainW3 = new domainW3;
        echo $domainW3 -> websiteName;
        echo "<pre>========================================================";
        echo "</pre>";
    echo "</pre>";

    echo "<b>PHP OOP - Static Properties</b>";
    echo "<pre>";
        class pi {
            public static $value = 3.14159;

            public function staticValue() {
                return self::$value;
            }
        }

        class number extends pi {
            public function numberStatic() {
                return parent::$value;
            }
        }
        // Get static property
        echo pi::$value . '<br>';

        $pi = new pi();
        echo $pi->staticValue() . '<br>';

        // Get value of static property directly via child class
        echo number::$value . '<br>';

        // or get value of static property via xStatic() method
        $number1 = new number();
        echo $number1->numberStatic() . '<br>';

        echo "<pre>========================================================";
        echo "</pre>";
    echo "</pre>";

    echo "<b>PHP Namespaces</b>"; // Nhóp các lớp làm việc chung để thực hiện một nhiệm vụ. cho phép cùng tên cho nhiều lớp
    echo "<pre>";
        include "Html.php";
        use Html as H; //Namespace Alias bí danh không gian tên
        //use Html\Table as T;

        $table = new H\Table();
        //$table = new T();
        $table->title = "My table";
        $table->numRows = 5;

        $row = new H\Row();
        $row->numCells = 3;

        $table->message();
        $row->message();

        echo "<pre>========================================================";
        echo "</pre>";
    echo "</pre>";

    echo "<b>PHP Iterables</b>"; //Sử dụng như một kiểu dữ liệu cho biết có thể lặp lại
    echo "<pre>";

        function printIterable1(iterable $myIterable) {
            foreach($myIterable as $item) {
                echo $item;
            }
        }

        $arrayCharacters = ["a", "b", "c"];
        printIterable1($arrayCharacters);
        echo '<br>';

        function getIterable():iterable {
            return ["a", "b", "c"];
        }

        $myIterable = getIterable();
        foreach($myIterable as $item) {
            echo $item;
        }

        echo '<br>';

        // Create an Iterator
        class MyIterator implements Iterator {
            private $items = [];
            private $pointer = 0;

            public function __construct($items) {
                // array_values() makes sure that the keys are numbers
                $this->items = array_values($items);
            }

            // tra về con tro hiện tại
            public function current() {
                return $this->items[$this->pointer];
            }

            // trả về khóa liên kết với phần tử hiện tại
            public function key() {
                return $this->pointer;
            }
            // di chuyển con trỏ đến phần tử tiếp theo
            public function next() {
                $this->pointer++;
            }
            // di chuyển con trỏ đến phần tử đầu tiên
            public function rewind() {
                $this->pointer = 0;
            }
            // trả về false khi con trỏ ko trỏ đến phần tử nào . Còn lại true
            public function valid() {
                // count() indicates how many items are in the list
                return $this->pointer < count($this->items);
            }
        }

        // A function that uses iterables
        function printIterable(iterable $myIterable) {
            foreach($myIterable as $item) {
                echo $item;
            }
        }

        // Use the iterator as an iterable
        $iterator = new MyIterator(["a", "b", "c"]);
        printIterable($iterator);
        echo "<pre>========================================================";
        echo "</pre>";
    echo "</pre>";
?>