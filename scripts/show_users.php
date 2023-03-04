<?php
session_start();
require_once 'functions.php';

if (! user_in_group($_SESSION['user_id'], 'Administrator')) {
    header('Location:'. "../index.php" . "?user_id=" );
    exit();
}

$result = get_all_users('users');
display_title('USERS');
echo "<link id='upgrade' rel='url' href='./show_users.php' type='text/php'>";

?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"> </script>
<script type="text/javascript">
    $(function(){
        $('img').on("click", function(){
            var $this = $(this);
            if(this.className === 'free_user'){
                                
                //$("#attention").html(this.alt + " is blocked"); 
                $this.attr('src', '../sources/images/check_false.jpg');
                $this.attr('class', 'block_user');
                
                var user_id = this.id;
                var statement = 3;
                var param = {user_id: user_id, statement: statement};
                
                $.ajax({
                    url: 'statement_change.php',
                    type: 'POST',
                    data: param,
                    contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                    success: function (response){
                        $('#attention').html(response);
                        
                    },
                    error: function (){ alert("ERROR");}
                });
                
                
                return;
            }
            if(this.className === 'block_user'){
                //$("#attention").html(this.alt + ' is unblocked'); 
                $this.attr('src', '../sources/images/check_true.jpg');
                $this.attr('class', 'free_user');
                
                var user_id = this.id;
                var statement = 2;
                var param = {user_id: user_id, statement: statement};
                $.ajax({
                    url: 'statement_change.php',
                    type: 'POST',
                    data: param,
                    contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                    success: function (response){
                        $('#attention').html(response);
                        
                    },
                    error: function (){ alert("ERROR");}
                });
                return;
            }
           
           
           
        });
    });




    $(function(){
        $("img[class='del_user']").click( function(){
            var $this = $(this);
            if(window.confirm('You ar goin to DELETE:\n\t "'  + this.alt + '"\n\n Are You sure? Press OK')){  //CONFIRM
                //$this.attr('src', '../sources/images/check_false.jpg');\
                
                var user_id = this.id;
                var param = {user_id: user_id};
                
                $.ajax({
                    url: 'remove_user.php',
                    type: 'POST',
                    data: param,
                    contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                    success: function (response){
                        $('#attention').html(response);

                        var element = $this.parent();
                        element.remove();
                        $this.display = 'none';

                        newdiv = document.createElement('div');
                        newdiv.id = 'NewDiv';
                        newdiv.innerHTML= 'NEW DIV';
                        document.body.appendChild(newdiv);

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
            <ol>
            <?php
            foreach ($result as $key  ) {
                if($key['statement']=== 0 || $key['statement']=== 2){
                    $statement  = 'check_true.jpg';
                    $class_name = 'free_user';
                } else {
                    $statement  = 'check_false.jpg';
                    $class_name = 'block_user';
                }

                $user_row = strtr(
                        "<li>"
                        . "<a   id='%user_id' href='show_user.php?user_id='  > %first_name %last_name &nbsp; &nbsp; Login: %user_name &nbsp; &nbsp; Password: %password </a>"
                        . "<i>&nbsp;&nbsp;&nbsp;</i>"
                        . "<img id='%user_id' class='$class_name' src='../sources/images/$statement' alt='%first_name %last_name' width='20' /> "
                        . "<i>&nbsp; &nbsp;</i>"
                        . "<img id='%user_id' class='del_user'  src='../sources/images/check_del.jpg'  alt='%first_name %last_name' width='22' /> " . "<br>"
                        . "</li>" . '<br>' ,
                        ['%user_id'    => $key['user_id'],
                         '%first_name' => $key['first_name'],
                         '%last_name'  => $key['last_name'],
                         '%user_name'  => $key['user_name'],
                         '%password'   => $key['password'], 
                        ]       //  , $to_param);
                );                  
                echo $user_row ;
            }
            ?>
            </ol>
        </div>


    </div>

    <div id="footer">
        <p></p> 
    </div>
</body>
</html>