<?php

declare(strict_types=1);

require_once 'app_config.php';
//$dsn = "mysql:host=localhost;dbname=myDatabase;charset=utf8mb4";
//$dsn = "mysql:host=localhost;dbname=myDatabase;charset=utf8mb4";
try {
     $pdo = new PDO('mysql: host=' . DATABASE_HOST .'; dbname=' .DATABASE_NAME. '; charset=utf8mb4' ,
                    DATABASE_USERNAME,
                    DATABASE_PASSWORD,
                    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
     //$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $ex) {
    echo $ex->getMessage() . '<br />';
    echo $pdo->errorInfo() . '<br />';
    echo $pdo->errorCode() . '<br />'; 
}

function user_in_group(string|int $user_id, string $group): bool {
    global $pdo;
    $query_string = <<< SQL
                    SELECT ugr.user_id
                    FROM  user_groups ugr, group_names gnm
                    WHERE 
                    ugr.group_id = gnm.id
                    AND gnm.name = :group 
                    AND ugr.user_id = :user_id
    SQL;
    
    $sth = $pdo->prepare($query_string, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
    $sth->execute(['group'   => $group,
                   'user_id' => $user_id]);
    //$resurs = $sth->fetchAll();
   
    if ($sth->rowCount() ==  1) {
        return true;
    }    
    return false;
}


//function get_web_path($param) {
//    $main_path = str_replace('/users/and/www/shop/', '', $param);
//    $full = "{$main_path}";
//    return $full;
//    //  /Users/and/www/shop/scripts
//}



function get_all_users($database): ? array {
    global $pdo;
    $query_string = <<<SQL
            SELECT user_id, statement, user_name, password, first_name, last_name, user_pic_path, image_id
            FROM $database
    SQL;

    $sth = $pdo->prepare($query_string, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
    $sth->execute();
    $resurs = $sth->fetchAll(PDO::FETCH_ASSOC); //PDO::FETCH_ASSOC  //PDO::FETCH_NUM
    return $resurs;
}



function display_title(string $page_title): void {
         
   
    $user_id   = $_SESSION['user_id']   ?? '';
    $user_name = $_SESSION["user_name"] ?? 'GUEST_in_display_title';
    
    
    echo <<<_END
    <html>
        <head>
            <title>{$page_title}</title>  
        </head>
        <link href="../css/phpmm.css" rel="stylesheet" type="text/css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"> </script>
    <body>
        <div id="page_start">
            <div id="header"><h1>hidden The Missing Manual</h1></div>
            <div id="example"> {$user_name} </div>
            <div id="menu">
    _END;
            
    
    if ( user_in_group($user_id, 'Administrator')) {
        echo <<<_END
                <ul>
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="./show_users.php">Show users list</a></li>
                    <li><a href="admin.php">Manage databases</a></li>
                    <li><a href="index.php"> button 1</a></li>
                    <li><a href="index.php"> button 2</a></li>
                </ul>
            </div>
        _END;
    }
    else {
        echo <<<_END
                <ul>
                    <li><a href="../index.php">Home</a></li>
                    <!--        <li><a href="./show_users.php">Manage users</a></li>
                    <li><a href="admin.php">Manage databases</a></li>                  -->
                    <li><a href="index.php"> button 1</a></li>
                    <li><a href="index.php"> button 2</a></li>
                </ul>
            </div>
        </div>
        _END;
        }
}
