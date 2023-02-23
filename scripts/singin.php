<?php

//echo $_REQUEST['user'];

$first_name ='';
$last_name ='';
$email ='';
$user ='';

if (isset($_REQUEST['user'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $user = $_POST['user'];
}
else {
    $_REQUEST[] = array();
}



?>
<!-- <?php 
echo <<<EOD
<button id='but_err' class='button_nav'> HOME  </button>
 onclick="document.location.href='../index.php'" 
EOD;


?> -->

<html>
    
<head>
    <!-- <link href="../css/styles.css" rel="stylesheet" type="text/css" /> -->
    <link href="../css/phpmm.css" rel="stylesheet" type="text/css" />
    <link href="./singin.php" rel="stylesheet" type="text/PHP " />
    
</head>
<body > <!-- bgcolor="#607050"  -->
    <div id="header"><h1>hidden text</h1></div>
    <div id="example"> New user </div>
    
    <div>
        <h1>Регистрация нового пользователя</h1>
        <p> Введите свои данные</p>
        <form action="singin.php" method="POST">
            <fieldset>
                <label for="first_name">Имя:</label>
                <input type="text" name="first_name" size="20" value="<?php echo $first_name; ?>" /><br />
                <label for="last_name">Фамилия:</label>
                <input type="text" name="last_name" size="20" value="<?php echo $last_name; ?>" /><br />
                <label for="email">Адрес эл. почты:</label>
                <input type="text" name="email" size="50" value="<?php echo $email; ?>" /><br />
                <label for="user">Никнейм: </label>
                <input type="text" name="user" size="20" value="<?php echo $user; ?>" /><br />
                <label for=""></label>
                <input type="text" name="" size=""/><br />
                <label for=""></label>
                <input type="text" name="" size="$alue"/><br />
                <label for=""></label>
                <input type="text" name="" size=""/><br />
                <label for=""></label>
                <input type="text" name="" size=""/><br />
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



