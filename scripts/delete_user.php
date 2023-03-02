<?php
session_start();
require_once 'functions.php';

if (!isset( $_SESSION['user_id'])) {
    header('Location:'. "../index.php" . "?user_id=" );
    exit();
}
if (! user_in_group($_SESSION['user_id'], 'Administrator')) {
    header('Location:'. "../index.php" . "?user_id=" );
    exit();
}

// Get the user ID of the user to delete
$user_id = trim((string) filter_input(INPUT_POST, 'user_id', FILTER_SANITIZE_SPECIAL_CHARS) );

// Build the DELETE statement
$query_string = <<<SQL
        DELETE FROM users
        WHERE user_id = :user_id
SQL;

// Delete the user from the database
try {
    $sth = $pdo->prepare($query_string, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
    $sth->execute(['user_id' => $user_id]);

    if ($sth !== false) {
        echo 'Successful DELETE user FROM users';
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



//if ($sth->rowCount() ==  1) {
//        return true;
//    }    
//    return false;


// Redirect to show_users to re-show users (without this deleted one)
$msg = "The user you specified has been deleted.";
header("Location: show_users.php?success_message={$msg}");

