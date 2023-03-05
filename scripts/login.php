<?php

session_start();
require_once 'functions.php';
//define("VALID_USERNAME", "admin");
//define("VALID_PASSWORD", "root");
$page_title = 'LOGIN'; 
$message ='';


//if (null === $user_name = $_SESSION['user_id']) {
//    $user_name = trim((string) filter_input(INPUT_POST, 'user_name', FILTER_SANITIZE_SPECIAL_CHARS) );
//    $password = trim((string) filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS) );
//
//}

    $user_name = trim((string) filter_input(INPUT_POST, 'user_name', FILTER_SANITIZE_SPECIAL_CHARS) );
    $password = trim((string) filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS) );




if (isset($user_name) & isset($password) & strlen($user_name)>4 & strlen($password)>4 ) {
    
    $query_string = <<<SQL
        SELECT user_id, statement, user_name, password, first_name, last_name, user_pic_path, image_id
        FROM users
        WHERE user_name = :user_name 
        AND password = :password
SQL; 
    

    try {
        
        $sth = $pdo->prepare($query_string, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
        $sth->execute([
                        'user_name' => $user_name,
                        'password' => $password,
                      ]);


            if ($sth->rowCount()===0) {
                $message = " Password or Login is WRONG ! ";
            }
            else {
                //$message = $user_name;
                $_SESSION['user_name'] = $user_name;
                $_SESSION['password'] = $password;
                
                $resurs = $sth->fetch();
                
                $_SESSION['user_id']       = $resurs['user_id'];
                $_SESSION['statement']     = $resurs['$statement'];
                $_SESSION['first_name']    = $resurs['$first_name'];
                $_SESSION['last_name']     = $resurs['$last_name'];
                $_SESSION['user_pic_path'] = $resurs['$user_pic_path'];
                $_SESSION['image_id']      = $resurs['$image_id'];

                header("Location: show_user.php?user_id=" . $resurs['user_id'] . "&user_name=". $user_name );
                
                //$message = 'Confirm: user_id = '. $resurs['user_id'];
                //$message = 'Confirm: user_id = '. $user_id[0];
            }
        }
    catch (PDOException $exc){
        $user_exists.= ' '. $exc->getMessage();
    }
    
}

?>

<html>   
    <title>{$page_title}</title>
    <link href="../css/phpmm.css" rel="stylesheet" type="text/css" />
    <link href="./login.php" rel="alternate" type="text/PHP " />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"> </script>
    
    <script type="text/javascript">
        
//        $(document).ready(
//                function(){
//                    $("#signup_form").validate(
//                        {
//                            rules: {password: {minlength: 5},
//                            confirm_password: {minlength: 5, equelTO: "#password" }},
//                        
//                            messages:{password: {minlenth: " it has to be longer "},
//                            confirm_password: {minlenth: " it has to be longer ",equelTO: "#password" }}            
//                                                        
//                        });
//                }
//
//            );
        
        
        
//        $(function(){
//            $("#user_name").on("blur",function(){
//                
//                var user_name = $("#user_name").val().trim();
//                var param = {user_name: user_name};
//                $.ajax({
//                    url: 'login.php',
//                    type: 'POST',
//                    data: param,
//                    contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
//                    success: function (response){ $("#user_name_i").html(response); },
//                    error: function (){ alert("ERROR");}
//                }); 
//        });
        
        $(function(){
            $("input[type='reset']").click(function(){$("#user_name_i").html(''); });
        });
    </script>

        
        

<body >
   
    <div id="header"><h1>hidden text</h1></div>
    <div id="example"> <?= $user_name ?>  </div>
    <div>
        <h1> Enter </h1>
        <p> Авторизируйтесь </p>
        <form action="login.php" method="POST"  id="signup_form" >
            <fieldset>
                
                <label for="user_name">Логин:</label>
                <input type="text" name="user_name" size="25"  id="user_name" />
                <i id="user_name_i"> <?= $message ?> </i>
                <br />
                                
                <label for="password">Пароль: </label>
                <input type="password" name="password" size="20" " /><br />

                <p>&nbsp;</p>

                
            </fieldset>
            <br />
            <fieldset class="center">
                <input type="submit" value="Войти"/>
                <input type="reset" value="Очистить "   />
            </fieldset>
            <br />

            <br />
        </form>
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




