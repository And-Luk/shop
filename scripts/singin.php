<?php
session_start();
require_once 'functions.php';

if ( isset( $_SESSION['user_id'])  ) {
    $user_id    = $_SESSION['user_id'];
    $statement  = $_SESSION['statement'];
    $user_name  = $_SESSION['user_name'];
    $password   = $passwd = $_SESSION['password'];
    $first_name = $_SESSION['first_name'];
    $last_name  = $_SESSION['last_name'];
    

    //$user_pic_path = $_SESSION['user_pic_path'];
    //$image_id = $_SESSION['image_id'];
    $email      ='not used now';
}

?>



<html>   

    <link href="../css/phpmm.css" rel="stylesheet" type="text/css" />
    <link href="./singin.php" rel="alternate" type="text/PHP " />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"> </script>
    
    <script type="text/javascript">
        
        $(function(){
            $("#user_name").on("blur",function(){
                
                var user_name = $("#user_name").val().trim();
                var param = {user_name: user_name};
                $.ajax({
                    url: 'check_user_name.php',
                    type: 'POST',
                    data: param,
                    contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                    success: function (response){ $("#user_name_i").html(response); },
                    error: function (){ alert("ERROR");}
                }); 
                
                
//            try{
//                //alert("error");
//                }
//                catch(err){
//                    this.InnerHtml( err.toString());
//                }
                
            });
                
                
        });
        
        $(function(){
            $("input[type='reset']").click(function(){$("#user_name_i").html(''); });
        });

       
    </script>

        
<!-- <script type="text/javascript">
        function check_user_name(name){
            //var user_name = document.getElementByName(name); not
            var user_name = document.getElementById(name) ;
            
            request = new asuncRequest();
            //equest.open("POST","some.php",true);
            
            user_name.value = ' set ERRR no';
        }
</script> -->
        

<body>
    
    <div id="header"><h1>hidden text</h1></div>
    <div id="example"> New user </div>
    
    <div>
        <h1>Регистрация нового пользователя</h1>
        <p> Введите свои данные</p>
        <form action="create_user.php" method="POST" enctype="mulipart/form-data" id="user_form">
            <fieldset>
                <label for="user_name">Логин:</label>
                <input type="text" name="user_name" size="25"  id="user_name" value="<?= $user_name ?>" />
                <i id="user_name_i"></i>
                <br />
                
                
                
                <label for="first_name">Имя:</label>
                <input type="text" name="first_name" size="25" value="<?= $first_name ?>" /><br />
                
                <label for="last_name">Фамилия:</label>
                <input type="text" name="last_name" size="25" value="<?= $last_name ?>" /><br />
                
                <label for="password">Пароль: </label>
                <input type="password" name="password" size="20" value="<?= $password ?>" /><br />
                
                <label for="passwd">подтверждение пароля: </label>
                <input type="password" name="passwd" size="20" value="<?= $password ?>" /><br />
                
                <label for="email">Эл. почта: </label>
                <input type="text" name="email" size="25" value="<?= $email ?>" /><br />
                
                <label for="user_pic">Photo:</label>
                <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
                <input type="file"   name="user_pic" size="30" /><br />
                
                

                <p> </p>
            </fieldset>
            <br />
            <fieldset class="center">
                <input type="submit" value="Зарегистрироваться"/>
                <input type="reset" value="Очистить форму"   />
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



