<?php
session_start();
include_once ('./functions.php');
include_once ('./header.php');


if (!isset( $_SESSION['user_id'])) {
    header('Location:'. "../index.php" . "?user_id=" );
    exit();
}
if (! user_in_group($_SESSION['user_id'], 'Administrator')) {
    header('Location:'. "../index.php" . "?user_id=" );
    exit();
}




echo "<link rel='stylesheet' href='../css/styles.css' type='text/css'> ";
echo "<link rel='url' href='./admin.php' type='text/php'>";

//strval($value);

$query_string = trim( strval(filter_input(INPUT_GET, 'query_string', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_NO_ENCODE_QUOTES)) ); //FILTER_SANITIZE_FULL  SPECIAL_CHARS



//$query_string = <<<SQL
//        DELETE FROM users
//        WHERE user_id = :user_id
//SQL;
    
//    $sth->execute(['user_id' => $user_id]);

    
    
$query_string ?? '';

if (! empty($query_string) ) {
    
    
    $sth = $pdo->prepare($query_string, PDO::SQLITE_DETERMINISTIC);
    //$query_string = preg_replace("/[\n\r\t]+/i", ' ', $query_string);
    
    print $query_string .'<br /><br />';
    
    $sth->execute();
    //$sth = $pdo->prepare($query_string);
    //$pdo->exec($query_string);
    //$rows = $sth-fetch();
  
//    if ($sth->rowCount()>0) {
//        $query_string ="";
//        try {
//            while ($catalog = $sth->fetch()) {
//                $query_string.= $catalog[0] . $catalog[1];
//            }
//        }
//        catch (PDOException $ex) {
//            $query_string = $ex->getMessage();
//        }
//    }
     

}
else {
   // $query_string = 'It was an empty request or CREATE';
}

echo <<< _END
    <script type="text/javascript">
        function make_request_to_sql(id){
            var query_string = document.getElementById(id).value;
            if (confirm("Request to database: \\n" + query_string  + "\\n Press OK")) {
                window.location="../../shop/scripts/admin/createtables.php?query_string=" + query_string;
            }
        }
    </script>




<h3 align='center'> ADMIN OF DATABASES</h3>
<div id='admin_top' class='admin' name='admin'>
    <form method="post" action="admin.php" enctype="text/php">
        <textarea class="textarea_admin" id="text_area" rows="5" cols="70" > {$query_string} </textarea></br>
        <fildset class="fild_admin" >
            <input type="submit" value=" SET REQUEST " > 
            <input type="reset" value=" RESET FORM" >
        </fildset>
    </form>
</div>
<div></div>
_END;

//<button id='but_err'    class='button_nav' onclick=" make_request_to_sql('text_area') "> Make SQL request ! </button>
//make_request_to_sql(user_id)  //document.location.href='admin/createtables.php
echo <<<_EOD
<div id='admin_first' class='admin' name='admin'>
    <fildset class="fild_admin" >
        <button id='but_err'    class='button_nav' onclick=" make_request_to_sql('text_area') "> Make SQL request ! </button>
        <button id='but_err'    class='button_nav' onclick="document.location.href='admin/removetables.php'"> REMOVE TABLES ! </button>
   </fildset>
</div>
_EOD;


echo "<div></div>";

?>
</body>
</html>