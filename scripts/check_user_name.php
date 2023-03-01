<?php

require_once 'functions.php';

$user_name = trim((string) filter_input(INPUT_POST, 'user_name', FILTER_SANITIZE_SPECIAL_CHARS) );

$user_exists =" имя должно не менее 5 символов";

if (isset ($user_name) & strlen($user_name)>4) {
    
    $query = sprintf("SELECT * FROM users WHERE user_name ='%s' ;",
            $user_name);

    try {
        $response = $pdo->query($query);
        //$response = $pdo->exec($query);

        if ($response->rowCount() >0 ) {
            $user_exists = " занято " . ' - '. date("d.m.Y H:i:s");
        }
        else {
            $user_exists = " свободно " . ' - '. date("d.m.Y H:i:s");
        }
        }
    catch (PDOException $exc){
        $user_exists.= ' '. $exc->getMessage();
    }

}


echo $user_exists ;
