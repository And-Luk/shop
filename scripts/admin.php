<?php

//echo " <br />" . "CURENT PATH ADMIN " . __DIR__. "<br />";  
include_once ('./functions.php');
include_once ('./header.php');

echo "<link rel='stylesheet' href='../css/styles.css' type='text/css'> ";
//../shop/js/javascript.js


echo "<link rel='url' href='./admin.php' type='text/php'>";
echo <<< _END
<h3 align='center'> ADMIN OF DATABASES</h3>
<div id='admin_top' class='admin' name='admin'>
<form method="post" action="admin.php" enctype="text/php">
   <textarea class="textarea_admin" id="text_request" rows="5" cols="70" > </textarea></br>
   <fildset class="fild_admin" >
        <input type="submit" value=" SET REQUEST " > 
        <input type="reset" value=" RESET FORM" >
   </fildset>
</form>
</div>
<div></div>
_END;
echo <<<_EOD
<div id='admin_first' class='admin' name='admin'>

   <fildset class="fild_admin" >
   <button id='but_err'    class='button_nav' onclick="document.location.href='admin/createtables.php'"> CREATE TABLES ! </button>
   <button id='but_err'    class='button_nav' onclick="document.location.href='admin/removetables.php'"> REMOVE TABLES ! </button>


   </fildset>

</div>
_EOD;

//echo $_REQUEST['write_request'];
echo "<div></div>";
//<script> </script>;
// if (isset($_SESSION['user']))
//     echo " session on ! ";

//     else  {echo "<pre><div );' >" .                                     // style='background:  rgb(67, 103, 135
//             "<button id='but_1' class='button_nav'> КАТАЛОГ </button>" .
//             "<button id='but_2' class='button_nav'> BIN     </button> " .
//             "<button id='but_3' class='button_nav'> MAP     </button>" .
//                 "</div></pre>";
//     }


?>
</body>
</html>