<?php

//define("DATABASE_HOST","localhost");
//define("DATABASE_USERNAME","root");
//define("DATABASE_PASSWORD","Rasmus");
//define("DATABASE_NAME","shop");

require_once 'app_config.php';
$appname = (string)"магазин";

$userstr = (string)' (GUEST)';
$app = (string)$appname;

$servername = 'localhost';
$username = 'root';
$password = 'Rasmus';
$database = 'shop';

//$connect = new mysqli($database, $username, $password, $servername)

$connection = new mysqli("mysql:host=localhost;dbname=DATABASE_NAME", $username, $password, $database); 



 try {
     $pdo =new PDO("mysql:host=localhost;dbname=DATABASE_NAME", DATABASE_USERNAME, DATABASE_PASSWORD);    
} catch (PDOException $ex) {
    echo $ex->getMessage();
}






if ($connection->connect_error) {
    //$connection->close();
    die("Connection failed: " . $connection->connect_error);
    }
    //else echo "Connection established: with $database";

// function connectToMySQL(string $dbhost = null, string $dbname = null, string $dbuser = null , string $dbpassword = null)
// {
//     # code...
// }


?>
