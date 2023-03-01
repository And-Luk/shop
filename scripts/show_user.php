<?php

session_start();
require_once 'functions.php';
display_title('SHOW USER');

//$user_id = $_SESSION['user_id'];
//$user_name = $_SESSION["user_name"];


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



?>


   
    <div>
        <h1> Enter </h1>
        <p> User Page  </p>
        
        <div>
            <p> <?php echo '$user_id not work this' ; ?>  </p>
            <p> <?php echo '$user_name not work this' ; ?> </p>
            
            
            
        </div>
        
        <br />
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

    <div id="footer">
        <p></p> 
    </div>
</body>
</html>




