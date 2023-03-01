<?php
//require_once 'functions.php';

function display_title($page_title) {
    $user_id = $_SESSION['user_id'];
    $user_name = $_SESSION["user_name"];
//$user_id_get =   trim((string) filter_input(INPUT_GET, 'user_id', FILTER_DEFAULT) );
//$user_name_get = trim((string) filter_input(INPUT_GET, 'user_name', FILTER_SANITIZE_SPECIAL_CHARS) );
//    <link href="./login.php" rel="alternate" type="text/PHP " /> 
    
    echo <<<_END
    <!DOCTYPE html>\n<html><head >
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
        echo <<<_END
        <li><a href="../index.php">Show Users</a></li>
        <li><a href="admin.php">Manage database</a></li>
        <li><a href="index.php"> button 1</a></li>
        <li><a href="index.php"> button 2</a></li>
        
        _END;
    echo 'SET ADMIN'; 
}
 else {
    echo 'WRONG';
}
    
    
}