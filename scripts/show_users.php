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
        $('img').on("click", function(){
            var $this = $(this);
            if(this.className === 'free_user'){
                $("#attention").html(this.alt + " is blocked"); 
                $this.attr('src', '../sources/images/check_false.jpg');
                $this.attr('class', 'block_user');
                return;
            }
            if(this.className === 'block_user'){
                $("#attention").html(this.alt + ' is unblocked'); 
                $this.attr('src', '../sources/images/check_true.jpg');
                $this.attr('class', 'free_user');
                
//                var user_name = $("#user_name").val().trim();
//                var param = {user_name: user_name};
//                $.ajax({
//                    url: 'check_user_name.php',
//                    type: 'POST',
//                    data: param,
//                    contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
//                    success: function (response){ $("#user_name_i").html(response); },
//                    error: function (){ alert("ERROR");}

                return;
            }
            
        });
    });




    $(function(){
        $("img[class='del_user']").click( function(){
            var $this = $(this);
            if(window.confirm('You ar goin to DELETE:\t "'  + this.alt + '"\n Are You sure? Press OK'  )){
                $("#attention").html('You have blocked right now: "' + this.alt + '" '); 
                $this.attr('src', '../sources/images/check_false.jpg');
                
                
                var user_id = $this;     //this.id;  //
                var param = {user_id: user_id};   //{user_id: user_id};
                $.ajax({
                    url: 'delete_user.php',
                    type: 'POST',
                    data: param,
                    contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                    success: function (response){ $("#attention").html(this.alt + ' is deleted' + response); },
                    
                    error: function (){ alert("ERROR");}
                });



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
                        . "<img class='free_user' id='%s' src='../sources/images/check_true.jpg' width='20' alt='%s %s' /> "
                        . "<i>&nbsp; &nbsp;</i>"
                        . "<img class='del_user' id='%s' src='../sources/images/check_del.jpg' width='22' alt='%s %s' /> "
                        . "<br>"
                        . "</li>" . '<br>',
                        $key['user_id'], $key['first_name'], $key['last_name'], $key['user_name'], $key['password'],
                        $key['user_id'],$key['first_name'], $key['last_name'],
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