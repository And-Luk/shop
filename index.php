<?php

session_start();
include_once ('./scripts/header.php');

$user_id   = $_SESSION['user_id']   ?? null;
$user_name = $_SESSION["user_name"] ?? null;


if (isset($user_id) && isset($user_name)) {
    if (user_in_group($user_id, 'Administrator')) {
        echo <<<_END
        <!-- <pre> -->
            <div>                                 
                <button id='but_1' class='button_nav'>&nbsp; LIST &nbsp;</button>
                <button id='but_2' class='button_nav'>&nbsp;    BIN    &nbsp;</button>
                <button id='but_3' class='button_nav'>&nbsp;    MAP    &nbsp;</button>
                
            </div>
        <!-- </pre> -->
        <ul>
            <b><li><a href="./scripts/show_user.php">Show user page</a></li></b>
            <b><li><a href="./scripts/show_users.php">Show users list</a></li></b>
            <b><li><a href="./scripts/admin.php">Manage database</a></li></b>
            <!-- <li><a href="index.php"> HOME </a></li> -->
        <ul>
    _END;
    }
    else {
        echo <<<_END
            <div>
                <button id='but_1' class='button_nav'>&nbsp;USER BIN&nbsp;</button>
                <button id='but_2' class='button_nav'>&nbsp;  BIN  &nbsp;</button>
                <button id='but_3' class='button_nav'>&nbsp;  MAP  &nbsp;</button>
            </div>
            <ul>
                <!-- <li><a href="../index.php">Show Users</a></li> -->
                <!-- <li><a href="admin.php">Manage database</a></li> -->
                <li><a href="index.php"> button 1</a></li>
                <li><a href="index.php"> button 2</a></li>
            </ul>
        _END;
    }

}    



?>
</body>
</html>
