<?php
session_start();
require_once 'functions.php';


if (!isset( $_SESSION['user_id'])) {
    header('Location:'. "../index.php" . "?user_id=" );
    exit();
}
if (! user_in_group($_SESSION['user_id'], 'Administrator')) {
    header('Location:'. "../index.php" . "?user_id=" );
    exit();
}


display_title('USERS');
echo "<link id='upgrade' rel='url' href='./show_users.php' type='text/php'>";

$result = get_all_users('users');
//echo '' ; <!--    onblur="check_user_name('user_name')"   <img src="pic.jpg" alt=""  value="  -->

echo <<<_END
_END;

?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"> </script>
<script type="text/javascript">
    $(function(){
        $("img").click( function(){
            var picon = $(this);
            if(window.confirm('You ar goin to block:\t "'  + this.alt + '"\n Are You sure? Press OK'  )){
                $("#attention").html('You have blocked right now: "' + this.alt + '" '); 
                picon.attr('src', '../sources/images/check_false.jpg');
            }
        });
        
 
        
        
        });
        
</script>


    <div>
        <h1> Users </h1>
        <p id="attention"> &nbsp; </p>
        
<!--  <p> <?php echo '$user_id not work this' ; ?>  </p>-->
<!--  <p> <?php echo '$user_name not work this' ; ?> </p>-->
        
        <div id="content">
            <ul>
            <?php
            foreach ($result as $key  ) {
                $user_row = sprintf(
                        "<li>"
                        . "<a href='show_user.php?user_id=%d'> %s %s &nbsp; &nbsp; Login: %s &nbsp; &nbsp; Password: %s </a>"
                        . "<i>&nbsp;&nbsp;&nbsp;</i>"
                        . "<img class='block_user' id='%s' src='../sources/images/check_yes.jpg' width='20' alt='%s %s' /> "
                        . "<br>"
                        . "</li>" . '<br>',
                        $key['user_id'], $key['first_name'], $key['last_name'], $key['user_name'], $key['password'],
                        $key['user_id'],$key['first_name'], $key['last_name']
                        );
                echo $user_row ;

                // echo $key['user_pic_path'] . '  ';
                // echo $key['image_id']     . '  '. '<br>';
            }
            //print_r($result); 
            //var_dump($result);
            ?>
            </ul>
        </div>
        
        <br />
<!--        <form action="../index.php" method='post'>
            <fieldset  class="center">
                <?php
                   // echo <<<_END
                   //     <button id='but_err' class='button_nav' onclick="document.location.href='../index.php'"> TO HOME </button>
                   //    _END;
                  
                ?>
            </fieldset>
        </form>-->

    </div>

    <div id="footer">
        <p> </p> 
    </div>
</body>
</html>