<?php

require_once 'app_config.php';
//define("DATABASE_HOST","localhost");
//define("DATABASE_USERNAME","root");
//define("DATABASE_PASSWORD","Rasmus");
//define("DATABASE_NAME","shop");

$appname = (string)"магазин";
$userstr = (string)' (GUEST)';
$app = (string)$appname;
//$page_title ='';


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

function user_in_group($user_id, $group){
      
    $query_string = 'SELECT COUNT(*)
                    FROM  user_groups ugr, group_names gnm
                    WHERE gnm.name = :group
                    AND ugr.group_id = gnm.id
                    AND ugr.group_id = :user_id';
    $sth = $pdo->prepare($query_string, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
    
    $sth->execute(['group' => $group, 'user_id' => $user_id]);
    $resurs = $sth->fetchAll();
   
    if ($resurs > 0) {
        return true;
    }    
    return false;
}



function display_title($page_title) {
    $user_id = $_SESSION['user_id'];
    $user_name = $_SESSION["user_name"];
//$user_id_get =   trim((string) filter_input(INPUT_GET, 'user_id', FILTER_DEFAULT) );
//$user_name_get = trim((string) filter_input(INPUT_GET, 'user_name', FILTER_SANITIZE_SPECIAL_CHARS) );
//    <link href="./login.php" rel="alternate" type="text/PHP " /> 
    
    echo <<<_END
    <html>
    <head>
    <title>{$page_title}</title>
    <link href="../css/phpmm.css" rel="stylesheet" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"> </script>

   <body>
    <div id="page_start">
    <div id="header"><h1>hidden The Missing Manual</h1></div>
    <div id="example"> {$user_name} </div>
    <div id="menu">
      <ul>
        <li><a href="index.html">Home</a></li>
    
    _END;
    
    if (user_in_group($user_id, 'Administrator')) {
    echo 'SET ADMIN'; 
}
 else {
    echo 'WRONG';
}
    
    
}



?>
