<?php
//echo " <br />" . "CURENT PATH INDEX " . __DIR__. "<br />";  
//include_once(dirname(__FILE__).'scripts/header.php');
include_once ('./scripts/header.php');
//include_once ('./scripts/functions.php');

//include_once (__DIR__.'./scripts/header.php');
//include_once (__DIR__ . '../shop/scripts/functions.php');


if (isset($_SESSION['user']))
    echo " session on ! ";

    else  {echo "<pre><div );' >" .                                     // style='background:  rgb(67, 103, 135
            "<button id='but_1' class='button_nav'> КАТАЛОГ </button>" .
            "<button id='but_2' class='button_nav'> BIN     </button> " .
            "<button id='but_3' class='button_nav'> MAP     </button>" .
                "</div></pre>";
    }
?>

</body>
</html>
