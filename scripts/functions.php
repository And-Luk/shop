<?php

require_once 'app_config.php';
//define("DATABASE_HOST","localhost");
//define("DATABASE_USERNAME","root");
//define("DATABASE_PASSWORD","Rasmus");
//define("DATABASE_NAME","shop");

$appname = (string)"магазин";
$userstr = (string)' (GUEST)';
$app = (string)$appname;


 try {
     $pdo =new PDO('mysql: host=' . DATABASE_HOST .'; dbname=' .DATABASE_NAME,
                    DATABASE_USERNAME,
                    DATABASE_PASSWORD,
                    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);    
} catch (PDOException $ex) {
    echo $ex->getMessage() + '< /br>';
    echo $pdo->errorInfo() + '< /br>';
    echo $pdo->errorCode() + '< /br>'; 
}

?>
