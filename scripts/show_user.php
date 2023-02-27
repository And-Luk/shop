<?php

session_start();
require_once 'functions.php';

$user_id = trim((string) filter_input(INPUT_SERVER, 'user_id', FILTER_DEFAULT) );
$user_name = trim((string) filter_input(INPUT_POST, 'user_name', FILTER_SANITIZE_SPECIAL_CHARS) );

if (strlen($user_id)> 0) {
    echo 'SET';
}
 else {
    echo 'WRONG';
}

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

<html>   

    <link href="../css/phpmm.css" rel="stylesheet" type="text/css" />
    <link href="./login.php" rel="alternate" type="text/PHP " />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"> </script>
    
    <script type="text/javascript">
        

    </script>

        
        

<body >
 
    

    
    <div id="header"><h1>hidden text</h1></div>
    <div id="example"> New user </div>
    
    <div>
        <h1> Enter </h1>
        <p> User Page  </p>
        
        <div>
            <p> <?php echo $user_id; ?>  </p>
            <p> <?php echo $user_name; ?> ERROR </p>
            
            
            
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




