<?php
//echo " <br />" . "CURENT PATH HEADER " . __DIR__. "<br />"; 
//session_start();
 error_reporting(E_ALL);
include_once ('functions.php');  //include_once ('functions.php');

echo "<!DOCTYPE html>\n<html><head >";

echo "<title>$app$userstr</title>" . "<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>";
echo "<link rel='stylesheet' href='../../shop/css/styles.css' type='text/css'> ";

//function CONFIRM WORKS
echo<<<_EOD
<script type="text/javascript">
     function make_request_to_sql(id){
          var sometext = document.getElementById(id).value ;
          if (confirm("Вы уверены, что что хотите сделать запрос к БД" + "\\n \\t Press OK\\n \\n" + sometext)) {
               window.location="admin.php?db_request="+sometext;
          }
          //this.alert(sometext);
     }
</script>
_EOD;


echo "</head><body >" . "<center><canvas id='logo' width='624' height='86'>$app <i>  IT was hided </i></canvas></center>";  //width='624' height='86'
echo "<div  id='cap' class='appname' name='capname' align='center'> <i> Have one &nbsp;</i>$app$userstr</div>" .
     "<script src='../../shop/js/javascript.js' type='text/javascript'></script>";

echo "<link id='logol' rel='url' href='./scripts/header.php' type='text/php'>";

echo <<<  _EOD
     <div id='capbutton' class='buttonname' name='capbuttonname' align='right'>
         <button id='but_login'  class='button_nav' onclick="document.location.href='../../shop/scripts/login.php'" >&nbsp LOGIN &nbsp  </button>
         <button id='but_logout' class='button_nav' value="5"> LOGOUT  </button>
         <button id='but_sigin'  class="button_nav" onclick="document.location.href='../../shop/scripts/singin.php'"> SINGIN  </button>     

         <button id='but_err'    class='button_nav' onclick="document.location.href='../../shop/index.php'"> HOME </button>
         <button id='but_err'    class='button_nav' onclick="document.location.href='../../shop/index.php'"> page index </button>
         <button id='but_err'    class='button_nav' onclick="document.location.href='../../shop/scripts/catalog.php'"> move to catalog </button>
         <img src="../../shop/sources/green.png" height="40">

         <!-- <image src="sources/green.png" height="40"></image> -->
         <!--<button id='but_err'    class='button_nav' onclick="document.script='../shop/scripts/catalog.php'"> ERROR &nbsp;</button> -->

     </div>


<div id='test_div'>

</div>
_EOD;

//echo " <br />" . "CURENT PATH HEADER " . __DIR__ . " have done " . "<br />";

?>