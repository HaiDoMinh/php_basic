<?php

	echo "<b>Basic PHP Syntax</b>";
	echo "<pre>";
	    echo "Hello world";
        echo "<pre>========================================================";
        echo "</pre>";
    echo "</pre>";

    echo "<b>PHP Comments</b>";
    echo "<pre>";
        // This is a single-line comment

        # This is also a single-line comment

        /*
        This is a multiple-lines comment block
        that spans over multiple
        lines
        */
        echo "<pre>========================================================";
        echo "</pre>";
    echo "</pre>";

    echo "<b>PHP Variables</b>";
    echo "<pre>";
        $longText = "Hello world!";
        $numberInt = 5;
        $numberFloat = 10.5;
        echo $longText . '<br>';
        echo $numberInt + $numberFloat . '<br>' ;
        echo "<pre>========================================================";
        echo "</pre>";
    echo "</pre>";

    echo "<b>PHP echo and print Statements</b>";
    echo "<pre>";
        echo "This ", "string ", "was ", "made ", "with multiple parameters." . '<br>';
        print "Study PHP at " . $longText . '<br>';
        print $numberInt + $numberFloat . '<br>';
        echo "<pre>========================================================";
        echo "</pre>";
    echo "</pre>";

    echo "<b>PHP Data Types</b>";
    echo "<pre>";
        echo $longText . '<br>';

        $numberInt = 5985;
        var_dump($numberInt);

        $numberFloat = 10.365;
        var_dump($numberFloat);

        $cars = array("Volvo","BMV","Toyota");
        var_dump($cars);

        //PHP Object
        class Car {
            function __construct() {
                $this->model = "VW";
            }
        }

        // create an object
        $carBMV = new Car();

        // show object properties
        echo $carBMV->model . '<br>';

        $typeNull = null;
        var_dump($typeNull);

        echo "<pre>========================================================";
        echo "</pre>";
    echo "</pre>";

    echo "<b>PHP Strings</b>";
    echo "<pre>";
        echo '<b>Vidu strlen đếm số ký tự Hello world HaiDM!: </b>' . strlen("Hello world HaiDM!") . '<br>';
        echo '<b>Vidu str_word_count đếm số từ Hello world HaiDM!</b>: ' . str_word_count("Hello world HaiDM!") . '<br>';
        echo '<b>Vidu strrev nghich đảo Hello world!:</b> ' . strrev("Hello world!") . '<br>'; // outputs !dlrow olleH
        echo '<b>Vidu strpos vi tri xuất hiện world trong Hello world!: </b>' . strpos("Hello world!", "e") . '<br>';
        echo '<b>Vidu str_replace thay thế world bằng Dolly:</b> ' . str_replace("world", "Dolly", "Hello world!") . '<br>';
        echo "<pre>========================================================";
        echo "</pre>";
    echo "</pre>";

    echo "<b>PHP Numbers</b>";
    echo "<pre>";
        echo '<b>Kiểm tra số có phải kiểu int bằng is_int:</b> ' . '<br>';
        $numberInt = 5985;
        var_dump(is_int($numberInt));
        $numberFloat = 59.85;
        var_dump(is_int($numberFloat));
        echo '<br>';

        echo '<b>Kiểm tra số có phải kiểu int bằng is_float:</b> ' . '<br>';
        var_dump(is_float($numberFloat));

        echo '<br>';
        echo '<b>Kiểm tra số có phải số lớn bằng is_infinite và is_finite:</b> ' . '<br>';
        $numberLarge = 1.9e411;
        var_dump($numberLarge);
        var_dump(is_infinite($numberLarge));
        var_dump(is_finite($numberLarge));
        echo '<br>';

        echo '<b>PHP NaN</b>' . '<br>';
        $typeNaN = acos(8);
        var_dump($typeNaN);
        var_dump(is_nan($typeNaN));
        echo '<br>';

        echo '<b>Hàm is_numeric(): </b>' . '<br>';
        var_dump(is_numeric($longText));
        echo '<br>';

        echo '<b>PHP Casting Strings và Floats to Integers</b>' . '<br>';
        $numberFloat = 23465.768;
        $castInt = (int)$numberFloat;
        echo $castInt . '<br>';

        $typeString = "hai";
        $castInt = (int)$typeString;
        echo $castInt . '<br>';

        $typeString = "rert23465.768";
        $castInt = (int)$typeString;
        echo $castInt . '<br>';

        echo "<pre>========================================================";
        echo "</pre>";
    echo "</pre>";

    echo "<b>PHP Math</b>";
    echo "<pre>";
        echo( 'PI: ' . pi() . '<br>' );
        echo( 'MIN: 0, 150, 30, 20, -8, -200: ' . min( 0, 150, 30, 20, -8, -200 ) . '<br>' );  // returns -200
        echo( 'MAX 0, 150,30,20, -8, -200: ' . max( 0, 150, 30, 20, -8, -200 ) . '<br>' );  // returns 150
        echo( 'Gia trị tuyet doi -6.7: ' . abs(-6.7) . '<br>' );  // returns 6.7
        echo( 'Căn bậc 2 cua 64: ' . sqrt(64) . '<br>' );  // returns 8

        echo( 'Làm tron 0.60 với round: ' . round( 0.60) . '<br>' );  // returns 1
        echo( 'Làm tron 0.49 với round: ' . round( 0.49) . '<br>' );  // returns 0

        echo( 'Random số: ' . rand() . '<br>' );
        echo( 'Random so 10 den 100: ' . rand(10, 100) . '<br>' );

        echo "<pre>========================================================";
        echo "</pre>";
    echo "</pre>";

    echo "<b>PHP Constants</b>";
    echo "<pre>";
        define("GREETING", "Welcome to W3Schools.com!", true); // Phân biệt hoa thường default không phân biệt
        echo GREETING .'<br>';

        define("cars", [
            "Alfa Romeo",
            "BMW",
            "Toyota"
        ]);
        echo cars[0] . '<br>';

        function myTest() {
            echo GREETING;
        }

        myTest();

        echo "<pre>========================================================";
        echo "</pre>";
    echo "</pre>";


    echo "<b>PHP Operators</b>";
    echo "<pre>";
        echo "<b>PHP Arithmetic Operators:</b>" . '<br>';
        $numberInt1 = 10;
        $numberInt2 = 6;
        echo "Operator + : " . ( $numberInt1 + $numberInt2 ) . '<br>';
        echo "Operator - : " . ( $numberInt1 - $numberInt2 ) . '<br>';
        echo "Operator * : " . ( $numberInt1 * $numberInt2 ) . '<br>';
        echo "Operator / : " . ( $numberInt1 / $numberInt2 ) . '<br>';
        echo "Operator % : " . ( $numberInt1 % $numberInt2 ) . '<br>';
        echo "Operator ** : " . ( $numberInt1 ** $numberInt2 ) . '<br>';
        echo '<br>';

        echo "<b>PHP Comparison Operators:</b>" . '<br>';
        $numberInt = 100;
        $typeString = "100";
        echo "Operator == : ";
        var_dump($numberInt == $typeString);
        echo "Operator === : ";
        var_dump($numberInt === $typeString);
        echo "Operator != : ";
        var_dump($numberInt != $typeString);
        echo "Operator <> : ";
        var_dump($numberInt <> $typeString);
        echo "Operator !== : ";
        var_dump($numberInt !== $typeString);
        echo "Operator > : ";
        var_dump($numberInt > $typeString);
        echo "Operator < : ";
        var_dump($numberInt < $typeString);
        echo "Operator >= : ";
        var_dump($numberInt >= $typeString);
        echo "Operator <= : ";
        var_dump($numberInt <= $typeString);
        echo "Operator <=> : ";
        var_dump($numberInt <=> $typeString);
        echo '<br>';

        echo "<b>PHP Increment / Decrement Operators:</b>" . '<br>';
        echo "Operator ++x : " . ++$numberInt . '<br>';
        echo "Operator x++ : " . $numberInt++ . '<br>';
        echo "Operator x-- : " . $numberInt-- . '<br>';
        echo "Operator --x : " . --$numberInt . '<br>';
        echo '<br>';

        echo "<b>PHP Logical Operators:</b>" . '<br>';
        $numberInt1 = 100;
        $numberInt2 = 50;
        if( ($numberInt1 == 100) and ($numberInt2 == 50) ) {
            echo "Operator and" . '<br>';
        }
        if($numberInt1 == 100 or $numberInt2 == 80) {
            echo "Operator or" . '<br>';
        }
        if($numberInt1 == 100 xor $numberInt2 == 80) {
            echo "Operator xor" . '<br>';
        }
        if($numberInt1 == 100 && $numberInt2 == 50) {
            echo "Operator &&" . '<br>';
        }
        if ($numberInt1 == 100 || $numberInt2 == 80) {
            echo "Operator ||" . '<br>';
        }
        if ($numberInt1 != 90 ) {
            echo "Operator !=" . '<br>';
        }
        echo '<br>';

        echo "<b>PHP String Operators:</b>" . '<br>';
        $text1 = "Hello";
        $text2 = " world!";
        echo "Operator . : " . ( (int)$text1 + (int)$text2 ). '<br>';

        $text1 .= $text2;
        echo "Operator .= : " . $text1 . '<br>';
        echo '<br>';

        echo "<b>PHP Array Operators:</b>" . '<br>';
        $arrayColor1 = array("a" => "red", "b" => "green");
        $arrayColor2 = array("c" => "blue", "d" => "yellow");

        echo "Operator + : ";
        print_r($arrayColor1 + $arrayColor2);
        echo "Operator == : ";
        var_dump($arrayColor1 == $arrayColor2);
        echo "Operator === : ";
        var_dump($arrayColor1 === $arrayColor2);
        echo "Operator != : ";
        var_dump($arrayColor1 != $arrayColor2);
        echo "Operator <> : ";
        var_dump($arrayColor1 <> $arrayColor2);
        echo "Operator !== : ";
        var_dump($arrayColor1 !== $arrayColor2);
        echo '<br>';

        echo "<b>PHP Conditional Assignment Operators:</b>" . '<br>';

        $user = "John Doe";
        echo "Operator ?: : " . $status = (empty($user)) ? "anonymous" : "logged in" . '<br>';
        echo "Operator ?? : " . $color = $color ?? "red" . '<br>';
        echo "<pre>========================================================";
        echo "</pre>";
    echo "</pre>";

    echo "<b>PHP if...else...elseif Statements</b>";
    echo "<pre>";
        $hour = date("H");
        if ($hour < "10") {
            echo "Have a good morning!";
        } elseif ($hour < "20") {
            echo "Have a good day!";
        } else {
            echo "Have a good night!";
        }
        echo "<pre>========================================================";
        echo "</pre>";
    echo "</pre>";

    echo "<b>PHP switch Statement</b>";
    echo "<pre>";
        $favColor = "red";

        switch ($favColor) {
            case "red":
                echo "Your favorite color is red!";
                break;
            case "blue":
                echo "Your favorite color is blue!";
                break;
            case "green":
                echo "Your favorite color is green!";
                break;
            default:
                echo "Your favorite color is neither red, blue, nor green!";
        }
        echo "<pre>========================================================";
        echo "</pre>";
    echo "</pre>";

    echo "<b>PHP Loops</b>";
    echo "<pre>";
        echo "<b>PHP while Loop</b>" . '<br>';
        $numberInt = 0;

        while($numberInt <= 30) {
            echo "The number is: $numberInt <br>";
            $numberInt+=10;
        }
        echo '<br>';

        echo "<b>PHP while Loop</b>" . '<br>';
        $numberInt = 6;

        do {
            echo "The number is: $numberInt <br>";
            $numberInt++;
        } while ($numberInt <= 5);
        echo '<br>';

        echo "<b>PHP for Loop</b>" . '<br>';
        for ($numberInt = 0; $numberInt <= 32; $numberInt+=10) {
            echo "The number is: $numberInt <br>";
        }
        echo '<br>';

        echo "<b>PHP foreach Loop</b>" . '<br>';
        $age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");

        foreach($age as $index => $value) {
            echo "$index = $value<br>";
        }
        echo '<br>';

        echo "<b>PHP Break and Continue</b>" . '<br>';
        $numberInt = 0;

        echo "<b>Break numberInt bằng 3 </b>" . '<br>';
        while($numberInt < 5) {
            if ($numberInt == 3) {
                break;
            }
            echo "The number is: $numberInt <br>";
            $numberInt++;
        }
        echo '<br>';

        $numberInt2 = 0;
        echo "<b>continue numberInt bằng 3 </b>" . '<br>';
        while($numberInt2 < 5) {
            if ($numberInt2 == 3) {
                $numberInt2++;
                continue;
            }
            echo "The number is: $numberInt2 <br>";
            $numberInt2++;
        }
        echo "<pre>========================================================";
        echo "</pre>";
    echo "</pre>";

    echo "<b>PHP Functions</b>";
    echo "<pre>";
        function familyName($fname = "Jani") {
            echo "$fname Refsnes! <br>";
        }

        familyName("Jani"); // call the function
        familyName("Hege"); // call the function
        familyName();

        //declare(strict_types=1); // bắt buộc đúng kiểu dữ liệu
        function addNumbers(int $number1, int $number2) {
            return $number1 + $number2;
        }
        echo 'Gọi addNumbers cộng 2 số: ' . addNumbers(5, "5 days") . '<br>';

        function addNumbers2(float $number1, float $number2) : int {
            return $number1 + $number2;
        }
        echo 'Gọi addNumbers cộng 2 số float ép kiểu về int: ' . addNumbers2(1.2, 5.2) . '<br>';
        echo '<br>';

        echo "<b>Passing Arguments by Reference</b>" . '<br>';
        function add_five(&$value) {
            $value += 5;
        }

        $number3 = 2;
        add_five($number3);
        echo 'Số ban đầu number3 = 2 gọi hàm add_five cộng thêm 5 theo tham chiếu number3 = ' . $number3;

        echo "<pre>========================================================";
        echo "</pre>";
    echo "</pre>";

    echo "<b>PHP Arrays</b>";
    echo "<pre>";
        echo "<b>Get The Length of an Array - The count() Function</b>" . '<br>';
        $cars = array("Volvo", "BMW", "Toyota");
        echo 'Số lượng phần tử mảng cars: ' . count($cars) . '<br>';
        echo '<br>';

        echo "<b>PHP Indexed Arrays</b>" . '<br>';
        echo "I like " . $cars[0] . ", " . $cars[1] . " and " . $cars[2] . ".<br>";
        $carslength = count($cars);

        for($i = 0; $i < $carslength; $i++) {
            echo $cars[$i] . "<br>";
        }
        echo '<br>';

        echo "<b>PHP Associative Arrays</b>" . '<br>';
        $age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");

        foreach($age as $index => $value) {
            echo "Key=" . $index . ", Value=" . $value . "<br>";
        }
        echo '<br>';

        echo "<b>PHP Multidimensional Arrays</b>" . '<br>';
        $cars2 = array (
            array("Volvo",22,18),
            array("BMW",15,13),
            array("Saab",5,2),
            array("Land Rover",17,15)
        );
        echo $cars2[0][0].": In stock: ".$cars2[0][1].", sold: ".$cars2[0][2].".<br>";

        for ($row = 0; $row < 4; $row++) {
            echo "<p><b>Car number " . ($row+1) . "</b></p>";
            echo "<ul>";
            for ($col = 0; $col < 3; $col++) {
                echo "<li>".$cars2[$row][$col]."</li>";
            }
            echo "</ul>";
        }

        echo "<b>PHP Sorting Arrays</b>" . '<br>';
        sort($cars);
        echo '<b>Sắp xếp với tăng sort():</b><br>';
        foreach($cars as $index => $value) {
            echo "Key=" . $index . ", Value=" . $value . "<br>";
        }
        echo '<br>';

        rsort($cars);
        echo '<b>Sắp xếp với giảm rsort():</b><br>';
        foreach($cars as $index => $value) {
            echo "Key=" . $index . ", Value=" . $value . "<br>";
        }
        echo '<br>';

        arsort($age);
        echo '<b>Sắp xếp với giảm theo giá trị arsort():</b><br>';
        foreach($age as $index => $value) {
            echo "Key=" . $index . ", Value=" . $value . "<br>";
        }
        echo '<br>';

        krsort($age);
        echo '<b>Sắp xếp với giảm theo khóa krsort():</b><br>';
        foreach($age as $index => $value) {
            echo "Key=" . $index . ", Value=" . $value . "<br>";
        }
        echo '<br>';

        asort($age);
        echo '<b>Sắp xếp với tăng theo giá trị asort():</b><br>';
        foreach($age as $index => $value) {
            echo "Key=" . $index . ", Value=" . $value . "<br>";
        }
        echo '<br>';

        ksort($age);
        echo '<b>Sắp xếp với tăng theo khóa ksort():</b><br>';
        foreach($age as $index => $value) {
            echo "Key=" . $index . ", Value=" . $value . "<br>";
        }
        echo '<br>';

        echo "<pre>========================================================";
        echo "</pre>";
    echo "</pre>";

    echo "<b>PHP Global Variables - Superglobals</b>";
    echo "<pre>";
        echo "<b>PHP GLOBALS</b>" . '<br>';
        $numberInt1 = 75;
        $numberInt2 = 25;

        function addition() {
            $GLOBALS['numberInt3'] = $GLOBALS['numberInt1'] + $GLOBALS['numberInt2'];
        }

        addition();
        echo $numberInt3;
        echo '<br>';

        echo "<b>PHP SERVER</b>" . '<br>';
        echo $_SERVER['PHP_SELF'] . "<br>";
        echo $_SERVER['SERVER_NAME'] . "<br>";
        echo $_SERVER['HTTP_HOST'] . "<br>";
        echo $_SERVER['HTTP_USER_AGENT'] . "<br>";
        echo $_SERVER['SCRIPT_NAME'] . "<br>";
        echo '<br>';

        echo "<b>PHP REQUEST and POST</b>" . '<br>'; ?>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
            Name: <input type="text" name="fullname">
            <input type="submit">
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // collect value of input field
            $name = $_REQUEST['fullname'];
            if (empty($name)) {
                echo "Name is empty";
            } else {
                echo $name;
            }
        }
        echo '<br>';

        echo "<b>PHP GET</b>" . '<br>'; ?>
        <form method="get" action="<?php echo $_SERVER['PHP_SELF'];?>">
            Search: <input type="text" name="search">
            <input type="submit">
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            if ( isset( $_GET['search'] ) ) {
                echo "Search " . $_GET['search'];
            }
        }
        echo "<pre>========================================================";
        echo "</pre>";
    echo "</pre>";

    echo "<b>PHP Regular Expressions</b>";
    echo "<pre>";
        $string1 = "Visit W3Schools";
        $pattern = "/w3schools/i";
        echo 'Hàm preg_match(): ' . preg_match($pattern, $string1) . "<br>";

        $string2 = "The rain in SPAIN falls mainly on the plains.";
        $pattern2 = "/ain/i";
        echo 'Hàm preg_match_all(): ' . preg_match_all($pattern2, $string2)  . "<br>";

        $string3 = "Visit Microsoft!";
        $pattern3 = "/microsoft/i";
        echo 'Hàm preg_replace(): ' . preg_replace($pattern3, "W3Schools", $string3) . "<br>";// Outputs "Visit W3Schools!"

        $string4 = "Apples and bananas.";
        $pattern4 = "/ba(na){2}/i";
        echo 'Grouping: ' . preg_match($pattern4, $string4) . '<br>'; // Outputs 1

        echo "<pre>========================================================";
        echo "</pre>";
    echo "</pre>";

?>