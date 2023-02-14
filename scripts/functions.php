<?php
$appname = (string)"магазин";

$userstr = (string)' (GUEST)';
$app = (string)$appname;

$servername = 'localhost';
$username = 'root';
$password = 'Rasmus';
$database = 'shop';


$connection = new mysqli($servername, $username, $password, $database); 

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
