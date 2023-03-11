<?php

//session_start();
include_once ('functions.php');  //include_once ('functions.php');

echo <<<_EOD
<!DOCTYPE html>
    <html>
        <head>
            <title>$app $userstr</title>
            <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
            <link rel='stylesheet' href='../../shop/css/styles.css' type='text/css'>

            <script type="text/javascript">
                function confir_on_click() {
                    if (confirm("Are You sure " + "\\n PRESS OK" )) {
                        window.location="../../shop/scripts/logout.php" ;
                    }
                }
            </script>        


        </head>
        <body>
            <center><canvas id='logo' width='624' height='86'>$app <i>  IT was hided </i></canvas></center>
            <div  id='cap' class='appname' name='capname' align='center'>
                <i> какая то надпись &nbsp;</i>$app $userstr
            </div>
            <script src='../../shop/js/javascript.js' type='text/javascript'></script>
            <link id='logol' rel='url' href='./scripts/header.php' type='text/php'>
            <div id='capbutton' class='buttonname' name='capbuttonname' align='right'>
                <button id='but_err'    class='button_nav' onclick="document.location.href='../../shop/index.php'">&nbsp; HOME &nbsp;</button>
        
                
                
                
                <button id='but_err'    class='button_nav' onclick="document.location.href='../../shop/scripts/catalog.php'">&nbsp; CATALOG &nbsp;</button>
                <button id='but_sigin'  class="button_nav" onclick="document.location.href='../../shop/scripts/singin.php' ">&nbsp;  SINGIN  &nbsp;</button>
                <button id='but_err'    class='button_nav' onclick="document.location.href='../../shop/scripts/show_user.php'"> User page </button>
                <button id='but_logout' class='button_nav' onclick=" confir_on_click(); "> LOGOUT  </button>
                <button id='but_login'  class='button_nav' onclick="document.location.href='../../shop/scripts/login.php' " >&nbsp; LOGIN &nbsp;</button>
                
                
                <!-- <img src="../../shop/sources/images/green.png" height="40"> -->
                <!-- <image src="sources/images/green.png" height="40"></image> -->
                <!-- <button id='but_err'    class='button_nav' onclick="document.script='../shop/scripts/catalog.php'"> ERROR &nbsp;</button> -->
            </div>
_EOD;
