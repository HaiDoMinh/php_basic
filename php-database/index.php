<?php

    echo "<b>PHP Connect to MySQL</b>";
    echo "<pre>";
        //MySQLi Object-oriented
        $serverName = "localhost";
        $userName = "root";
        $password = "";

        echo "<b>MySQLi Object-oriented:</b>" . '<br>';
        // Create connection
        $connectDB = new mysqli($serverName, $userName, $password);

        // Check connection
        if ($connectDB->connect_error) {
            die("Connection failed: " . $connectDB->connect_error);
        }
        echo "Connected successfully<br>";
        $connectDB->close();

        echo "<b>MySQLi Procedural:</b>" . '<br>';
        // Create connection
        $connectDB2 = mysqli_connect($serverName, $userName, $password);

        // Check connection
        if (!$connectDB2) {
            die("Connection failed: " . mysqli_connect_error());
        }
        echo "Connected successfully<br>";
        mysqli_close($connectDB2);

        echo "<b>PDO:</b>" . '<br>';
        //PDO
        try {
            $connectDB3 = new PDO("mysql:host=$serverName;dbname=myDBPDO", $userName, $password);
            // set the PDO error mode to exception
            $connectDB3->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully<br>";
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

        $connectDB3 = null;

        echo "<pre>========================================================";
        echo "</pre>";
    echo "</pre>";

    echo "<b>PHP Create a MySQL Database</b>";
    echo "<pre>";
        //MySQLi Object-oriented
        $serverName = "localhost";
        $userName = "root";
        $password = "";

        echo "<b>MySQLi Object-oriented:</b>" . '<br>';
        // Create connection
        $connectDB = new mysqli($serverName, $userName, $password);
        // Check connection
        if ($connectDB->connect_error) {
            die("Connection failed: " . $connectDB->connect_error);
        }

        // Create database
        $sql = "CREATE DATABASE IF NOT EXISTS myDB";
        if ($connectDB->query($sql) === TRUE) {
            echo "Database created successfully<br>";
        } else {
            echo "Error creating database: " . $connectDB->error;
        }

        $connectDB->close();

        echo "<b>MySQLi Procedural:</b>" . '<br>';
        // Create connection
        $connectDB2 = mysqli_connect($serverName, $userName, $password);
        // Check connection
        if (!$connectDB2) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Create database
        $sql = "CREATE DATABASE IF NOT EXISTS myDBMySQLi";
        if (mysqli_query($connectDB2, $sql)) {
            echo "Database created successfully<br>";
        } else {
            echo "Error creating database: " . mysqli_error($connectDB2);
        }

        mysqli_close($connectDB2);

        echo "<b>PDO:</b>" . '<br>';
        // PDO
        try {
            $connectDB3 = new PDO("mysql:host=$serverName", $userName, $password);
            // set the PDO error mode to exception
            $connectDB3->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "CREATE DATABASE IF NOT EXISTS myDBPDO";
            // use exec() because no results are returned
            $connectDB3->exec($sql);
            echo "Database created successfully<br>";
        } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }

        $connectDB3 = null;

        echo "<pre>========================================================";
        echo "</pre>";
    echo "</pre>";

    echo "<b>PHP MySQL Create Table</b>";
    echo "<pre>";
        //MySQLi Object-oriented
        $serverName = "localhost";
        $userName = "root";
        $password = "";
        $dbName = "myDB";
        $dbNameMySQLi = "myDBMySQLi";
        $dbNamePDO = "myDBPDO";

        echo "<b>MySQLi Object-oriented:</b>" . '<br>';
        // Create connection
        $connectDB = new mysqli($serverName, $userName, $password, $dbName);
        // Check connection
        if ($connectDB->connect_error) {
            die("Connection failed: " . $connectDB->connect_error);
        }

        // sql to create table
        $sql = "CREATE TABLE IF NOT EXISTS myguests (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            firstname VARCHAR(30) NOT NULL,
            lastname VARCHAR(30) NOT NULL,
            email VARCHAR(50),
            reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";

        if ($connectDB->query($sql) === TRUE) {
            echo "Table MyGuests created successfully<br>";
        } else {
            echo "Error creating table: " . $connectDB->error;
        }

        $connectDB->close();

        echo "<b>MySQLi Procedural</b>" . '<br>';
        // Create connection
        $connectDB2 = mysqli_connect($serverName, $userName, $password, $dbNameMySQLi);
        // Check connection
        if (!$connectDB2) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // sql to create table
        $sql = "CREATE TABLE IF NOT EXISTS myguests (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            firstname VARCHAR(30) NOT NULL,
            lastname VARCHAR(30) NOT NULL,
            email VARCHAR(50),
            reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";

        if (mysqli_query($connectDB2, $sql)) {
            echo "Table MyGuests created successfully<br>";
        } else {
            echo "Error creating table: " . mysqli_error($connectDB2);
        }

        mysqli_close($connectDB2);

        echo "<b>PDO</b>" . '<br>';

        try {
            $connectDB3 = new PDO("mysql:host=$serverName;dbname=$dbNamePDO", $userName, $password);
            // set the PDO error mode to exception
            $connectDB3->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // sql to create table
            $sql = "CREATE TABLE IF NOT EXISTS myguests (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                firstname VARCHAR(30) NOT NULL,
                lastname VARCHAR(30) NOT NULL,
                email VARCHAR(50),
                reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )";

            // use exec() because no results are returned
            $connectDB3->exec($sql);
            echo "Table MyGuests created successfully";
        } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }

        $connectDB3 = null;

        echo "<pre>========================================================";
        echo "</pre>";
    echo "</pre>";

    echo "<b>PHP MySQL Insert Data</b>";
    echo "<pre>";
        //MySQLi Object-oriented
        $serverName = "localhost";
        $userName = "root";
        $password = "";
        $dbName = "myDB";
        $dbNameMySQLi = "myDBMySQLi";
        $dbNamePDO = "myDBPDO";

        echo "<b>MySQLi Object-oriented:</b>" . '<br>';

        // Create connection
        $connectDB = new mysqli($serverName, $userName, $password, $dbName);
        // Check connection
        if ($connectDB->connect_error) {
            die("Connection failed: " . $connectDB->connect_error);
        }

        $sql = "INSERT INTO myguests (firstname, lastname, email)
        VALUES ('John', 'Doe', 'john@example.com')";

        if ($connectDB->query($sql) === TRUE) {
            echo "New record created successfully<br>";
        } else {
            echo "Error: " . $sql . "<br>" . $connectDB->error . "<br>" ;
        }

        $connectDB->close();

        echo "<b>MySQLi Procedural:</b>" . '<br>';
        // Create connection
        $connectDB2 = mysqli_connect($serverName, $userName, $password, $dbNameMySQLi);
        // Check connection
        if (!$connectDB2) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "INSERT INTO myguests (firstname, lastname, email)
        VALUES ('John', 'Doe', 'john@example.com')";

        if (mysqli_query($connectDB2, $sql)) {
            echo "New record created successfully<br>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($connectDB2) . "<br>" ;
        }

        mysqli_close($connectDB2);

        echo "<b>PDO:</b>" . '<br>';

        try {
            $connectDB3 = new PDO("mysql:host=$serverName;dbname=$dbNamePDO", $userName, $password);
            // set the PDO error mode to exception
            $connectDB3->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "INSERT INTO myguests (firstname, lastname, email)
            VALUES ('John', 'Doe', 'john@example.com')";
            // use exec() because no results are returned
            $connectDB3->exec($sql);
            echo "New record created successfully<br>";
        } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage() . "<br>" ;
        }

        $connectDB3 = null;

        echo "<pre>========================================================";
        echo "</pre>";
    echo "</pre>";

    echo "<b>PHP MySQL Get Last Inserted ID</b>";
    echo "<pre>";

        //MySQLi Object-oriented
        $serverName = "localhost";
        $userName = "root";
        $password = "";
        $dbName = "myDB";
        $dbNameMySQLi = "myDBMySQLi";
        $dbNamePDO = "myDBPDO";

        echo "<b>MySQLi Object-oriented:</b>" . '<br>';

        // Create connection
        $connectDB = new mysqli($serverName, $userName, $password, $dbName);
        // Check connection
        if ($connectDB->connect_error) {
            die("Connection failed: " . $connectDB->connect_error);
        }
        $sql = "INSERT INTO myguests (firstname, lastname, email)
        VALUES ('John', 'Doe', 'john@example.com')";
        //print_r($connectDB);
        if ($connectDB->query($sql) === TRUE) {
            $lastId = $connectDB->insert_id;
            echo "New record created successfully. Last inserted ID is: " . $lastId . '<br>';
        } else {
            echo "Error: " . $sql . "<br>" . $connectDB->error . '<br>';
        }

        $connectDB->close();

        echo "<b>MySQLi Procedural:</b>" . '<br>';
        // Create connection
        $connectDB2 = mysqli_connect($serverName, $userName, $password, $dbNameMySQLi);
        // Check connection
        if (!$connectDB2) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "INSERT INTO myguests (firstname, lastname, email)
        VALUES ('John', 'Doe', 'john@example.com')";

        if (mysqli_query($connectDB2, $sql)) {
            $lastId = mysqli_insert_id($connectDB2);
            echo "New record created successfully. Last inserted ID is: " . $lastId . '<br>';
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($connectDB2) . '<br>';;
        }
        mysqli_close($connectDB2);

        echo "<b>PDO:</b>" . '<br>';

        try {
            $connectDB3 = new PDO("mysql:host=$serverName;dbname=$dbNamePDO", $userName, $password);
            // set the PDO error mode to exception
            $connectDB3->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "INSERT INTO myguests (firstname, lastname, email)
            VALUES ('John', 'Doe', 'john@example.com')";
            // use exec() because no results are returned
            $connectDB3->exec($sql);
            $lastId = $connectDB3->lastInsertId();
            echo "New record created successfully. Last inserted ID is: " . $lastId . '<br>';
        } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage() . "<br>" ;
        }

        $connectDB3 = null;

        echo "<pre>========================================================";
        echo "</pre>";
    echo "</pre>";


    echo "<b>Insert Multiple Records Into MySQL Using MySQLi and PDO</b>";
    echo "<pre>";

        //MySQLi Object-oriented
        $serverName = "localhost";
        $userName = "root";
        $password = "";
        $dbName = "myDB";
        $dbNameMySQLi = "myDBMySQLi";
        $dbNamePDO = "myDBPDO";

        echo "<b>MySQLi Object-oriented:</b>" . '<br>';

        // Create connection
        $connectDB = new mysqli($serverName, $userName, $password, $dbName);
        // Check connection
        if ($connectDB->connect_error) {
            die("Connection failed: " . $connectDB->connect_error);
        }

        $sql = "INSERT INTO myguests (firstname, lastname, email)
        VALUES ('John', 'Doe', 'john@example.com');";
        $sql .= "INSERT INTO myguests (firstname, lastname, email)
        VALUES ('Mary', 'Moe', 'mary@example.com');";
        $sql .= "INSERT INTO myguests (firstname, lastname, email)
        VALUES ('Julie', 'Dooley', 'julie@example.com')";

        if ($connectDB->multi_query($sql) === TRUE) {
            echo "New records created successfully.<br>";
        } else {
            echo "Error: " . $sql . "<br>" . $connectDB->error . '<br>';
        }

        $connectDB->close();

        echo "<b>MySQLi Procedural:</b>" . '<br>';
        // Create connection
        $connectDB2 = mysqli_connect($serverName, $userName, $password, $dbNameMySQLi);
        // Check connection
        if (!$connectDB2) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "INSERT INTO myguests (firstname, lastname, email)
        VALUES ('John', 'Doe', 'john@example.com');";
        $sql .= "INSERT INTO myguests (firstname, lastname, email)
        VALUES ('Mary', 'Moe', 'mary@example.com');";
        $sql .= "INSERT INTO myguests (firstname, lastname, email)
        VALUES ('Julie', 'Dooley', 'julie@example.com')";

        if (mysqli_multi_query($connectDB2, $sql)) {
            echo "New records created successfully.<br>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($connectDB2) . '<br>';
        }
        mysqli_close($connectDB2);

        echo "<b>PDO:</b>" . '<br>';

        try {
            $connectDB3 = new PDO("mysql:host=$serverName;dbname=$dbNamePDO", $userName, $password);
            // set the PDO error mode to exception
            $connectDB3->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // begin the transaction
            $connectDB3->beginTransaction();
            // our SQL statements
            $connectDB3->exec("INSERT INTO myguests (firstname, lastname, email)
            VALUES ('John', 'Doe', 'john@example.com')");
            $connectDB3->exec("INSERT INTO myguests (firstname, lastname, email)
             VALUES ('Mary', 'Moe', 'mary@example.com')");
            $connectDB3->exec("INSERT INTO myguests (firstname, lastname, email)
            VALUES ('Julie', 'Dooley', 'julie@example.com')");

            // commit the transaction
            $connectDB3->commit();
            echo "New records created successfully<br>";

        } catch(PDOException $e) {
            // roll back the transaction if something failed
            $connectDB3->rollback();
            echo "Error: " . $e->getMessage() . '<br>';
        }

        $connectDB3 = null;

        echo "<pre>========================================================";
        echo "</pre>";
    echo "</pre>";

    echo "<b>PHP MySQL Prepared Statements</b>";
    echo "<pre>";

        //MySQLi Object-oriented
        $serverName = "localhost";
        $userName = "root";
        $password = "";
        $dbName = "myDB";
        $dbNameMySQLi = "myDBMySQLi";
        $dbNamePDO = "myDBPDO";

        echo "<b>MySQLi Object-oriented:</b>" . '<br>';

        // Create connection
        $connectDB = new mysqli($serverName, $userName, $password, $dbName);
        // Check connection
        if ($connectDB->connect_error) {
            die("Connection failed: " . $connectDB->connect_error);
        }

        // prepare and bind
        $statements = $connectDB->prepare("INSERT INTO myguests (firstname, lastname, email) VALUES (?, ?, ?)");
        $statements->bind_param("sss", $firstName, $lastName, $email);

        // set parameters and execute
        $firstName = "John";
        $lastName = "Doe";
        $email = "john@example.com";
        $statements->execute();

        $firstName = "Mary";
        $lastName = "Moe";
        $email = "mary@example.com";
        $statements->execute();

        $firstName = "Julie";
        $lastName = "Dooley";
        $email = "julie@example.com";
        $statements->execute();

        echo "New records created successfully<br>";

        $statements->close();
        $connectDB->close();

        echo "<b>MySQLi Procedural:</b>" . '<br>';
        // Create connection
        $connectDB2 = mysqli_connect($serverName, $userName, $password, $dbNameMySQLi);
        // Check connection
        if (!$connectDB2) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // prepare and bind
        $statements = $connectDB2->prepare("INSERT INTO myguests (firstname, lastname, email) VALUES (?, ?, ?)");
        $statements->bind_param("sss", $firstName, $lastName, $email);

        // set parameters and execute
        $firstName = "John";
        $lastName = "Doe";
        $email = "john@example.com";
        $statements->execute();

        $firstName = "Mary";
        $lastName = "Moe";
        $email = "mary@example.com";
        $statements->execute();

        $firstName = "Julie";
        $lastName = "Dooley";
        $email = "julie@example.com";
        $statements->execute();

        echo "New records created successfully<br>";

        $statements->close();
        mysqli_close($connectDB2);

        echo "<b>PDO:</b>" . '<br>';

        try {
            $connectDB3 = new PDO("mysql:host=$serverName;dbname=$dbNamePDO", $userName, $password);
            // set the PDO error mode to exception
            $connectDB3->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // prepare sql and bind parameters
            $statements = $connectDB3->prepare("INSERT INTO myguests (firstname, lastname, email)
             VALUES (:firstname, :lastname, :email)");
            $statements->bindParam(':firstname', $firstName);
            $statements->bindParam(':lastname', $lastName);
            $statements->bindParam(':email', $email);

            // insert a row
            $firstName = "John";
            $lastName = "Doe";
            $email = "john@example.com";
            $statements->execute();

            // insert another row
            $firstName = "Mary";
            $lastName = "Moe";
            $email = "mary@example.com";
            $statements->execute();

            // insert another row
            $firstName = "Julie";
            $lastName = "Dooley";
            $email = "julie@example.com";
            $statements->execute();

            echo "New records created successfully<br>";
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage() . '<br>';
        }

        $connectDB3 = null;

        echo "<pre>========================================================";
        echo "</pre>";
    echo "</pre>";
?>