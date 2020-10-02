<?php

    echo "<b>PHP Date and Time</b>";
    echo "<pre>";
        echo "Today is " . date("Y/m/d") . "<br>";
        echo "Today is " . date("Y.m.d") . "<br>";
        echo "Today is " . date("Y-m-d") . "<br>";
        echo "Today is " . date("l") . "<br>";
        echo "The time is " . date("h:i:sa") . "<br>";

        date_default_timezone_set("America/New_York");
        echo "Set timezone America/New_York. The time is " . date("h:i:sa") . "<br>";

        $time=mktime(11, 14, 54, 8, 12, 2014);
        echo "Tạo date dùng  mktime() : " . $time . "<br>";
        echo "Tạo date dùng  mktime() : " . date("Y-m-d h:i:sa", $time) . "<br>";

        $time2=strtotime("10:30pm April 15 2014");
        echo "Tạo date dùng strtotime() : " . date("Y-m-d h:i:sa", $time2) . "<br>";

        $time4=strtotime("+3 days", $time2);
        $time3=strtotime("+3 Months", $time2 );
        echo "Tạo date: " . $time2 . "<br>";
        echo "Tạo date: " . $time3 . "<br>";

        echo "Tạo date: " . date("Y-m-d h:i:sa", $time4) . $time4 . "<br>";
        echo "Tạo date dùng strtotime() + 3 tháng : " . date("Y-m-d h:i:sa", $time3) . "<br>";

        $startdate = strtotime("Saturday");
        $enddate = strtotime("+6 weeks", $startdate);
        echo 'Sáu ngày thứ 7 tiếp theo: <br>';
        while ($startdate < $enddate) {
            echo date("M d", $startdate) . "<br>";
            $startdate = strtotime("+1 week", $startdate);
        }
        echo "<pre>========================================================";
        echo "</pre>";
    echo "</pre>";

    echo "<b>PHP Include Files</b>";
        echo "<pre>";
        include 'welcome.php';
        echo "I have a $car.<br>";

        require 'welcome.php';
        echo "I have a $car.<br>";
        echo "<pre>========================================================";
        echo "</pre>";
    echo "</pre>";

    echo "<b>PHP File Handling</b>";
    echo "<pre>";
        echo readfile("webdictionary.txt");
        echo "<pre>========================================================";
        echo "</pre>";
    echo "</pre>";

    echo "<b>PHP File Open/Read/Close</b>";
    echo "<pre>";
        $myfile = fopen("webdictionary.txt", "r") or die("Unable to open file!");
        echo fread($myfile,filesize("webdictionary.txt"));
        fclose($myfile);
        echo '<br>';

        $myfile2 = fopen("webdictionary.txt", "r") or die("Unable to open file!");
        echo 'Su dung fgets: ' . fgets($myfile2) . '<br>';
        fclose($myfile2);

        $myfile3 = fopen("webdictionary.txt", "r") or die("Unable to open file!");
        // Output one character until end-of-file
        while(!feof($myfile3)) {
            echo 'Su dung fgetc: ' . fgetc($myfile3) . '<br>';
        }
        fclose($myfile3);
        echo "<pre>========================================================";
        echo "</pre>";
    echo "</pre>";

    echo "<b>PHP File Create/Write</b>";
    echo "<pre>";
        $myfile4 = fopen("filesave.txt", "w") or die("Unable to open file!");
        $stringSaveFile = "John Doe\n";
        fwrite($myfile4, $stringSaveFile);
        $stringSaveFile2 = "Việt Nam\n";
        fwrite($myfile4, $stringSaveFile2);
        fclose($myfile4);

        $myfile5 = fopen("filesave.txt", "w") or die("Unable to open file!");
        $stringSaveFile3 = "Mickey Mouse\n";
        fwrite($myfile5, $stringSaveFile3);
        $stringSaveFile4 = "Minnie Mouse\n";
        fwrite($myfile5, $stringSaveFile4);
        fclose($myfile5);
        echo "<pre>========================================================";
        echo "</pre>";
    echo "</pre>";

    echo "<b>PHP File Upload</b>";
    echo "<pre>";?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
            Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload Image" name="submit">
        </form>
        <?php
            $targetDir = "uploads/";
            isset($_FILES["fileToUpload"]["name"]) ?
                $targetFile = $targetDir . basename($_FILES["fileToUpload"]["name"]) : $targetFile = '';

            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));
            echo pathinfo($targetFile,PATHINFO_EXTENSION )  . '<br>';

            // Check if image file is a actual image or fake image
            if(isset($_POST["submit"])) {
                print_r($_FILES["fileToUpload"]);

//                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);// ten tep tam thoi duoc giu cho tren may chu
//                print_r($check);
//                if($check !== false) {
//                    echo "File is an image - " . $check["mime"] . ".<br>"; // file anh duoi va duoi la j: image/png
//                    $uploadOk = 1;
//                } else {
//                    echo "File is not an image.<br>";
//                    $uploadOk = 0;
//                }

                // Check if file already exists
                if (file_exists($targetFile)) {
                    echo "Sorry, file already exists.<br>";
                    $uploadOk = 0;
                }

                // Check file size
                if ( isset($_FILES["fileToUpload"]["size"]) && $_FILES["fileToUpload"]["size"] > 500000) {
                    echo "Sorry, your file is too large.<br>";
                    $uploadOk = 0;
                }

                // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif" && $imageFileType != "") {
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>";
                    $uploadOk = 0;
                }

                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.<br>";
                    // if everything is ok, try to upload file
                } else {
                    if( isset($_FILES["fileToUpload"]["tmp_name"]) ) {
                        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                            echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.<br>";
                        } else {
                            echo "Sorry, there was an error uploading your file.<br>";
                        }
                    }
                }
            }
        echo "<pre>========================================================";
        echo "</pre>";
    echo "</pre>";

    echo "<b>PHP Cookies</b>";
    echo "<pre>";
        $cookieName = "user";
        $cookieValue = "John Doe";
        setcookie($cookieName, $cookieValue, time() + (86400 * 30), "/"); // 86400 = 1 day
        // Delete
        //setcookie("user", "", time() - 3600);
        if(!isset($_COOKIE[$cookieName])) {
            echo "Cookie named '" . $cookieName . "' is not set!<br>";
        } else {
            echo "Cookie '" . $cookieName . "' is set!<br>";
            echo "Value is: " . $_COOKIE[$cookieName] . '<br>';
        }

        if(count($_COOKIE) > 0) {
            echo "Cookies are enabled.<br>";
        } else {
            echo "Cookies are disabled.<br>";
        }
        echo "<pre>========================================================";
        echo "</pre>";
    echo "</pre>";

    echo "<b>PHP Cookies</b>";
    echo "<pre>";
        session_start();

        // Set session variables
        $_SESSION["favcolor"] = "green";
        $_SESSION["favanimal"] = "cat";
        echo "Session variables are set.";

        // Echo session variables that were set on previous page
        echo "Favorite color is " . $_SESSION["favcolor"] . ".<br>";
        echo "Favorite animal is " . $_SESSION["favanimal"] . ".<br>";

        print_r($_SESSION);

        $_SESSION["favcolor"] = "yellow";
        print_r($_SESSION);

        // remove all session variables
        session_unset();

        // destroy the session
        session_destroy();
        echo "<pre>========================================================";
        echo "</pre>";
    echo "</pre>";

    echo "<b>PHP Filters</b>";
    echo "<pre>";
        $stringFiter1 = "<h1>Hello World!</h1>";
        echo $stringFiter1;
        $newString = filter_var($stringFiter1, FILTER_SANITIZE_STRING);
        echo $newString . '<br>';

        $numberFilter1 = 100;

        if (filter_var($numberFilter1, FILTER_VALIDATE_INT) === 0 || !filter_var($numberFilter1, FILTER_VALIDATE_INT) === false) {
            echo("Integer is valid. <br>");
        } else {
            echo("Integer is not valid. <br>");
        }

        $ip = "127.0.0.1";

        if (!filter_var($ip, FILTER_VALIDATE_IP) === false) {
            echo("$ip is a valid IP address. <br>");
        } else {
            echo("$ip is not a valid IP address. <br>");
        }

        $email = "john.doe@example.com";

        // Remove all illegal characters from email
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);

        // Validate e-mail
        if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            echo("$email is a valid email address. <br>");
        } else {
            echo("$email is not a valid email address. <br>");
        }

        $url = "https://www.w3schools.com";

        // Remove all illegal characters from a url
        $url = filter_var($url, FILTER_SANITIZE_URL);

        // Validate url
        if (!filter_var($url, FILTER_VALIDATE_URL) === false) {
            echo("$url is a valid URL. <br>");
        } else {
            echo("$url is not a valid URL. <br>");
        }
        echo "<pre>========================================================";
        echo "</pre>";
    echo "</pre>";

    echo "<b>PHP Filters Advanced</b>";
    echo "<pre>";
        $numberFilter2 = 122;
        $min = 1;
        $max = 200;

        if (filter_var($numberFilter2, FILTER_VALIDATE_INT, array("options" => array("min_range"=>$min, "max_range"=>$max))) === false) {
            echo("Variable value is not within the legal range. <br>");
        } else {
            echo("Variable value is within the legal range. <br>");
        }

        $ip = "2001:0db8:85a3:08d3:1319:8a2e:0370:7334";

        if (!filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) === false) {
            echo("$ip is a valid IPv6 address. <br>");
        } else {
            echo("$ip is not a valid IPv6 address. <br>");
        }

        $url = "https://www.w3schools.com";

        if (!filter_var($url, FILTER_VALIDATE_URL, FILTER_FLAG_QUERY_REQUIRED) === false) {
            echo("$url is a valid URL with a query string. <br>");
        } else {
            echo("$url is not a valid URL with a query string. <br>");
        }

        $stringFiter1 = "<h1>Hello WorldÆØÅ!</h1>";

        $newstring = filter_var($stringFiter1, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
        echo $newstring;

        echo "<pre>========================================================";
        echo "</pre>";
    echo "</pre>";

    echo "<b>PHP Callback Functions</b>";
    echo "<pre>";
        function mycallback($item) {
            return strlen($item);
        }

        $strings = ["apple", "orange", "banana", "coconut"];
        $lengths = array_map("mycallback", $strings);
        print_r($lengths);

        $strings = ["apple", "orange", "banana", "coconut"];
        $lengths = array_map( function($item) { return strlen($item); } , $strings); //anonymous functions
        print_r($lengths);

        function exclaim($str) {
            return $str . "!<br>";
        }

        function ask($str) {
            return $str . "?<br>";
        }

        function printFormatted($str, $format) {
            // Calling the $format callback function
            echo $format($str);
        }

        // Pass "exclaim" and "ask" as callback functions to printFormatted()
        printFormatted("Hello world", "exclaim");
        printFormatted("Hello world", "ask");

        echo "<pre>========================================================";
        echo "</pre>";
    echo "</pre>";

    echo "<b>PHP and JSON</b>";
    echo "<pre>";
        $age = array("Peter"=>35, "Ben"=>37, "Joe"=>43);
        echo 'Hàm json_encode chuyen mang ->json<br>';
        echo json_encode($age) . '<br>';

        echo 'Hàm json_encode:<br>';
        $jsonObj = '{"Peter":35,"Ben":37,"Joe":43}';
        var_dump(json_decode($jsonObj));
        $obj = json_decode($jsonObj);

        echo $obj->Peter . '<br>';
        echo $obj->Ben . '<br>';
        echo $obj->Joe . '<br>';

        $arrJsonDecode = json_decode($jsonObj, true);

        echo $arrJsonDecode["Peter"] . '<br>';
        echo $arrJsonDecode["Ben"] . '<br>';
        echo $arrJsonDecode["Joe"] . '<br>';

        echo 'Dùng foreach:<br>';
        foreach($obj as $key => $value) {
            echo $key . " => " . $value . "<br>";
        }
        echo "<pre>========================================================";
        echo "</pre>";
    echo "</pre>";

    echo "<b>PHP Exceptions</b>";
    echo "<pre>";
        function divide($dividend, $divisor) {
            if($divisor == 0) {
                throw new Exception("Division by zero", 1);
            }
            return $dividend / $divisor;
        }

        try {
            echo divide(5, 0);
        } catch(Exception $ex) {
            $code = $ex->getCode();
            $message = $ex->getMessage();
            $file = $ex->getFile();
            $line = $ex->getLine();
            echo "Exception thrown in $file on line $line: [Code $code] $message <br>";
        }

        class MyCustomException extends Exception {}

        function doStuff() {
            try {
                throw new InvalidArgumentException("You are doing it wrong!", 112);
            } catch(Exception $ex) {
                throw new MyCustomException("Something happened", 911, $ex);
            }
        }

        try {
            doStuff();
        } catch(Exception $e) {
            do {
                printf("%s:%d %s (%d) [%s]\n", $e->getFile(), $e->getLine(), $e->getMessage(), $e->getCode(), get_class($e));
            } while($e = $e->getPrevious());
        }
        echo "<pre>========================================================";
        echo "</pre>";
    echo "</pre>";


?>