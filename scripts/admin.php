<?php
session_start();
include_once ('./functions.php');
include_once ('./header.php');


if (!isset( $_SESSION['user_id'])) {
    header('Location:'. "../index.php" . "?user_id=" );
    exit();
}
if (! user_in_group($_SESSION['user_id'], 'Administrator')) {
    header('Location:'. "../index.php" . "?user_id=" );
    exit();
}




echo "<link rel='stylesheet' href='../css/styles.css' type='text/css'> ";
echo "<link rel='url' href='./admin.php' type='text/php'>";






$db_request = trim((string) filter_input(INPUT_GET, 'db_request', FILTER_SANITIZE_SPECIAL_CHARS) );
if (isset ($db_request) & strlen($db_request)>0) {
    //$db_request = preg_replace("/[\n\r\t]+/i", ' ', $db_request);  
    try {        
        $cat = $pdo->query($db_request);
        if ($cat->rowCount()>0) {
            $db_request ="";
            try {
                while ($catalog = $cat->fetch()) {
                    $db_request.= $catalog[0] . $catalog[1];
                }
            }
            catch (PDOException $ex) {
                $db_request = $ex->getMessage();
            }
        }
    }
    catch (PDOException $exc) {
        echo $exc->getTraceAsString();
    }
}
else {
    $db_request = 'It was an empty request or CREATE';
}


echo <<< _END
<h3 align='center'> ADMIN OF DATABASES</h3>
<div id='admin_top' class='admin' name='admin'>
<form method="post" action="admin.php" enctype="text/php">
   <textarea class="textarea_admin" id="text_area" rows="5" cols="70" > {$db_request} </textarea></br>
   <fildset class="fild_admin" >
        <input type="submit" value=" SET REQUEST " > 
        <input type="reset" value=" RESET FORM" >
   </fildset>
</form>
</div>
<div></div>
_END;

//<button id='but_err'    class='button_nav' onclick=" make_request_to_sql('text_area') "> Make SQL request ! </button>
//make_request_to_sql(user_id)  //document.location.href='admin/createtables.php
echo <<<_EOD
<div id='admin_first' class='admin' name='admin'>

   <fildset class="fild_admin" >
   <button id='but_err'    class='button_nav' onclick=" make_request_to_sql('text_area') "> Make SQL request ! </button>
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


//mysqli_close($connection);
?>
</body>
</html>