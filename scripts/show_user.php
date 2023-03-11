<?php

session_start();
require_once 'functions.php';





$user_id    = $_SESSION['user_id']    ?? null ;
$statement  = $_SESSION['statement']  ?? null ;
$user_name  = $_SESSION['user_name']  ?? null ;
$password   = $_SESSION['password']   ?? null ;
$first_name = $_SESSION['first_name'] ?? null ;
$last_name  = $_SESSION['last_name']  ?? null ;
$user_pic   = $_SESSION['user_pic_path'] ?? '';
$email      = $_SESSION['email']      ?? 'not used now';


//$message ='';
//if (isset($user_name) & isset($password) & strlen($user_name)>4 & strlen($password)>4 ) {
//    
//    $query = sprintf("SELECT user_id FROM users WHERE user_name ='%s' AND password ='%s' ;",
//                        $user_name, $password);
//
//
//    try {
//        $response = $pdo->query($query);
//
//            if ($response->rowCount()==0) {
//                $message = " Пароль не верен !";
//            }
//            else {
//                $resurs = $response->fetch();
//                header("Location: ../index.php");
//                $message = 'Confirm: user_id = '. $resurs['user_id'];
//                //$message = 'Confirm: user_id = '. $user_id[0];
//            }
//        }
//    catch (PDOException $exc){
//        $user_exists.= ' '. $exc->getMessage();
//    }
//    
//}


display_title('SHOW USER');
?>
   
        <div>
            <h1> Enter </h1>
            <p> User Page  </p>
            <div>
                <img class="catalog" src="<?= $user_pic ?>" width="100px" align= "left">
                <p> <?= '$user_id not work this' ?>  </p>
                <p> <?= '$user_name not work this' ?> </p>
            </div>
        
            <br />
             <!-- <form action="../index.php" method='post'>
                <fieldset  class="center">
                    <button id='but_err' class='button_nav' onclick="document.location.href='../index.php'"> TO HOME </button> 
                </fieldset>
            </form> -->
             
        <form action="../index.php" method='post'>
            <fieldset  class="center">
                <?php
                    echo <<<_END
                        <button id='but_err' class='button_nav' onclick="document.location.href='../index.php'"> TO HOME </button>
                        _END;
                    //echo " <br />" . " SINGIN.PHP " . __DIR__. "<br />";
                ?>
            </fieldset>
        </form>
             
        </div>

        <div id="footer" >
            <p></p> 
        </div>
    </div>
</body>
</html>




