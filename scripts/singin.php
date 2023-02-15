<!-- <?php echo " <br />" . " SINGIN.PHP " . __DIR__. "<br />";  ?> -->

<html>
    
<head>
    <link href="../css/phpmm.css" rel="stylesheet" type="text/css" />
</head>
<body > <!-- bgcolor="#607050"  -->
    <div id="header"><h1>hidden text</h1></div>
    <div id="example"> New user </div>
    
    <div>
        <h1>Регистрация нового пользователя</h1>
        <p> Введите свои данные</p>
        <form action="getFormSingin" method="POST">
            <fieldset>
                <label for="first_name">Имя:</label>
                <input type="text" name="first_name" size="20"/><br />
                <label for="last_name">Фамилия:</label>
                <input type="text" name="last_name" size="20"/><br />
                <label for="email">Адрес эл. почты:</label>
                <input type="text" name="email" size="50"/><br />
                <label for="user_handel">Никнейм: </label>
                <input type="text" name="user_handel" size="20"/><br />
                <label for=""></label>
                <input type="text" name="" size=""/><br />
                <label for=""></label>
                <input type="text" name="" size=""/><br />
                <label for=""></label>
                <input type="text" name="" size=""/><br />
                <label for=""></label>
                <input type="text" name="" size=""/><br />
            </fieldset>
            <fieldset class="center">
                <input type="submit" value="Зарегистрироваться"/>
                <input type="reset" value="Очистить форму"/>
            </fieldset>


        </form>
        <!-- <button id='but_err' class='button_nav' onclick="document.location.href='../index.php'"> HOME </button> -->
    </div>




<div id="footer"> footer </div>
</body>
</html>


<?php 
echo <<<_END
    <button id='but_err' class='button_nav' onclick="document.location.href='../index.php'"> HOME </button>
_END;

//echo " <br />" . " SINGIN.PHP " . __DIR__. "<br />";
?>
