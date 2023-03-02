<?php
require_once 'functions.php';


$user_name =   trim((string) filter_input(INPUT_POST, 'user_name',  FILTER_SANITIZE_SPECIAL_CHARS) );
$password =    trim((string) filter_input(INPUT_POST, 'password',   FILTER_SANITIZE_SPECIAL_CHARS) );
$first_name =  trim((string) filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_SPECIAL_CHARS) );
$last_name =   trim((string) filter_input(INPUT_POST, 'last_name',  FILTER_SANITIZE_SPECIAL_CHARS) );
$image_id =    trim((string) filter_input(INPUT_POST, 'image_id',   FILTER_SANITIZE_SPECIAL_CHARS) ) ;

$query_string = <<<SQL
        INSERT INTO users
               (user_name, password, first_name, last_name, image_id)
        VALUES (:user_name, :password, :first_name, :last_name , :image_id)
SQL;

$image_id_INT = is_int($image_id) ? $image_id : 0;

try {
    $sth = $pdo->prepare($query_string, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
    $sth->execute(['user_name'  => $user_name,
                   'password'   => $password,
                   'first_name' => $first_name,
                   'last_name'  => $last_name,
                   'image_id'   => $image_id_INT]);

    if ($sth !== false) {
        echo 'Successful INSERT INTO users';
    }
    else {
        echo 'There is a problem ' . '<br>';
        print_r($pdo->errorInfo()) . '<br>';
        print_r($sth->errorInfo()) . '<br>';
    }
}
catch (PDOException $exc) {
    echo $exc->getTraceAsString() . '<br>';
}


//$query_string = sprintf("INSERT INTO users" .
//        "(user_name, password, first_name, last_name, image_id)" . 
//        "VALUES('%s','%s','%s','%s','%d');",
//        $user_name,
//        $password,
//        $first_name,
//        $last_name,
//        $image_id );