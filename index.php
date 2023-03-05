<?php
//error_reporting(E_ALL);
session_start();
//echo " <br />" . "CURENT PATH INDEX " . __DIR__. "<br />";  
//include_once(dirname(__FILE__).'scripts/header.php');
include_once ('./scripts/header.php');
//include_once ('./scripts/functions.php');

//include_once (__DIR__.'./scripts/header.php');
//include_once (__DIR__ . '../shop/scripts/functions.php');

if ( isset( $_SESSION['user_id'])  ) {
    $user_id = $_SESSION['user_id'];
    $user_name = $_SESSION["user_name"];  
}



if (isset($user_id) && isset($user_name)) {
    



if (user_in_group($user_id, 'Administrator')) {
    echo "<pre><div );' >" .                                  // style='background:  rgb(67, 103, 135
         "<button id='but_1' class='button_nav'> КАТАЛОГ </button>" .
         "<button id='but_2' class='button_nav'> BIN     </button> " .
         "<button id='but_3' class='button_nav'> MAP     </button>" .
         "</div></pre>";
    
    echo <<<_END
     <ul>
        <li><a href="./scripts/show_user.php">Show User Page</a></li>
        <li><a href="./scripts/show_users.php">Show users</a></li>
        <li><a href="./scripts/admin.php">Manage database</a></li>
        <!-- <li><a href="index.php"> HOME </a></li> -->
     <ul>
    _END;
}
}    
    
//if (isset($_SESSION['user']))
//    echo " session on ! ";
//
//else  {
//    echo "<pre><div );' >" .                                     // style='background:  rgb(67, 103, 135
//         "<button id='but_1' class='button_nav'> КАТАЛОГ </button>" .
//         "<button id='but_2' class='button_nav'> BIN     </button> " .
//         "<button id='but_3' class='button_nav'> MAP     </button>" .
//         "</div></pre>";
//
//    echo <<<_END
//        <li><a href="../index.php">Show Users</a></li>
//        <li><a href="admin.php">Manage database</a></li>
//        <li><a href="index.php"> button 1</a></li>
//        <li><a href="index.php"> button 2</a></li>
//    _END;
//
//    }
?>

</body>
</html>
