<?php
require_once 'functions.php';


$user_name =   trim((string) filter_input(INPUT_POST, 'user_name',  FILTER_SANITIZE_SPECIAL_CHARS) );
$first_name =  trim((string) filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_SPECIAL_CHARS) );
$last_name =   trim((string) filter_input(INPUT_POST, 'last_name',  FILTER_SANITIZE_SPECIAL_CHARS) );
$password =    trim((string) filter_input(INPUT_POST, 'password',   FILTER_SANITIZE_SPECIAL_CHARS) );
$image_id =    trim((string) filter_input(INPUT_POST, 'image_id',   FILTER_SANITIZE_SPECIAL_CHARS) );

$string_for_request = sprintf("INSERT INTO users" .
        "(user_name, password, first_name, last_name, image_id)" . 
        "VALUES('%s','%s','%s','%s','%d');",
        $user_name,
        $password,
        $first_name,
        $last_name,
        $image_id );

    try {
        $rec = $pdo->exec($string_for_request);

        if ($rec !== false) {
            echo 'Successful';
        }
        else {
            print_r($pdo->errorInfo());
        }
        }
    catch (PDOException $exc) {
        echo $exc->getTraceAsString();
    }
