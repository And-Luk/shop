<?php
session_start();
require_once 'functions.php';

//if (!isset( $_SESSION['user_id'])) {
//    header('Location:'. "../index.php" . "?user_id=" );
//    exit();
//}
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
            if(window.confirm('You ar goin to DELETE:\n\t "'  + this.alt + '"\n\n Are You sure? Press OK')){  //CONFIRM
                //$this.attr('src', '../sources/images/check_false.jpg');\
                
                //var $this ;
                var user_id = this.id;
                var param = {user_id: user_id};
                var user_name = this.alt;
                
                $.ajax({
                    url: 'remove_user.php',
                    type: 'POST',
                    data: param,
                    contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                    success: function (response){
                        $('#attention').html(response);

                        var element = $this.parent();
                        element.remove();
                        
                    },
                    error: function (){
                        alert("ERROR");
                        
                        
                    }
                });
                

                
            }  //CONFIRM
        });
    });

</script>


    <div>
        <h1> Users </h1>
        <p id="attention"> &nbsp; </p>
        <div id="content">

            <ul>
            <?php
            foreach ($result as $key  ) {
//                $user_row = sprintf(
//                        "<li>"
//                        . "<a   alt='%d' href='show_user.php?user_id='  > %s %s &nbsp; &nbsp; Login: %s &nbsp; &nbsp; Password: %s </a>"
//                        . "<i>&nbsp;&nbsp;&nbsp;</i>"
//                        . "<img id='%s' class='free_user' src='../sources/images/check_true.jpg' width='20' alt='%s %s' /> "
//                        . "<i>&nbsp; &nbsp;</i>"
//                        . "<img id='%s' class='del_user'  src='../sources/images/check_del.jpg'  width='22' alt='%s %s' /> "
//                        . "<br>"
//                        . "</li>"
//                        . '<br>', 
//                        
//                        $key['user_id'], $key['first_name'], $key['last_name'], $key['user_name'], $key['password'],
//                        $key['user_id'], $key['first_name'], $key['last_name'],
//                        $key['user_id'], $key['first_name'], $key['last_name']
//                        );
                $user_row = strtr(
                        "<li>"
                        . "<a   id='%user_id' href='show_user.php?user_id='  > %first_name %last_name &nbsp; &nbsp; Login: %user_name &nbsp; &nbsp; Password: %password </a>"
                        . "<i>&nbsp;&nbsp;&nbsp;</i>"
                        . "<img id='%user_id' class='free_user' src='../sources/images/check_true.jpg' alt='%first_name %last_name' width='20' /> "
                        . "<i>&nbsp; &nbsp;</i>"
                        . "<img id='%user_id' class='del_user'  src='../sources/images/check_del.jpg'  alt='%first_name %last_name' width='22' /> "
                        . "<br>"
                        . "</li>"
                        . '<br>' ,
                        [ '%user_id'    => $key['user_id'],
                          '%first_name' => $key['first_name'],
                          '%last_name'  => $key['last_name'],
                          '%user_name'  => $key['user_name'],
                          '%password'   => $key['password'] ] ); //    ,
                       // $to);
                echo $user_row ;


            }

            ?>
            </ul>
        </div>
        
        <br />

    </div>

    <div id="footer">
        <p> </p> 
    </div>
</body>
</html>