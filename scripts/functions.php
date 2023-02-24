<?php

//define("DATABASE_HOST","localhost");
//define("DATABASE_USERNAME","root");
//define("DATABASE_PASSWORD","Rasmus");
//define("DATABASE_NAME","shop");
require_once 'app_config.php';

$appname = (string)"магазин";
$userstr = (string)' (GUEST)';
$app = (string)$appname;




//$connection = new mysqli("mysql:host=localhost;dbname=DATABASE_NAME", $username, $password, $database); 
//'mysql: host=localhost; dbname=shop'


 try {
     $pdo =new PDO('mysql: host=' . DATABASE_HOST .'; dbname=' .DATABASE_NAME,
             DATABASE_USERNAME,
             DATABASE_PASSWORD,
             [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);    
} catch (PDOException $ex) {
    echo $ex->getMessage();
    echo $pdo->errorInfo();
    //$pdo->errorCode(PDO::);
}






//if ($connection->connect_error) {
//    //$connection->close();
//    die("Connection failed: " . $connection->connect_error);
//    }
    //else echo "Connection established: with $database";

// function connectToMySQL(string $dbhost = null, string $dbname = null, string $dbuser = null , string $dbpassword = null)
// {
//     # code...
// }


?>
