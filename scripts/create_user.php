<?php
require_once 'functions.php';


$user_name =   trim((string) filter_input(INPUT_POST, 'user_name',  FILTER_SANITIZE_SPECIAL_CHARS) );
$password =    trim((string) filter_input(INPUT_POST, 'password',   FILTER_SANITIZE_SPECIAL_CHARS) );
$first_name =  trim((string) filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_SPECIAL_CHARS) );
$last_name =   trim((string) filter_input(INPUT_POST, 'last_name',  FILTER_SANITIZE_SPECIAL_CHARS) );
// $image_id =    trim((string) filter_input(INPUT_POST, 'image_id',   FILTER_SANITIZE_SPECIAL_CHARS) ) ;
#_____________________________________________________________________________________________________

$upload_dir = '../sources/uploads/profile_pics';
$image_fieldname = 'user_pic';
$image_errors = [
    1 => 'Max size in php.ini',
    2 => 'Max size in HTML',
    3 => 'only partial of file',
    4 => 'was\'t choiced any file',
];

if($_FILES[$image_fieldname]['error'] != 0 ){
    print 'The server can not get a picture';
    echo $image_errors($_FILES[$image_fieldname]['error']);
}

@is_uploaded_file($_FILES[$image_fieldname]['tmp_name']) or
        print "{$_FILES[$image_fieldname]['tmp_name']} not a file! ";

@getimagesize($_FILES[$image_fieldname]['tmp_name']) or
        print "{$_FILES[$image_fieldname]['tmp_name']} not an image ";

$now_is = time();
while (file_exists($upload_filename = $upload_dir . $now_is .'-'. $_FILES[$image_fieldname]['name'] )){
    $now_is++;
}

@move_uploaded_file($_FILES[$image_fieldname]['tmp_name'], $upload_filename) or
        print "rules does not exist for folder {$image_fieldname}";

        
        

#-------------------------------------------------------------------------------------------------------
$query_string = <<<SQL
        INSERT INTO users
               (user_name, password, first_name, last_name, image_id)
        VALUES (:user_name, :password, :first_name, :last_name , :image_id)
SQL;

$image_id_INT = is_int($image_id) ? $image_id : 0;

try {
    $sth = $pdo->prepare($query_string, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
    $sth->execute(['user_name'  => $user_name,
                   'password'   => $password,
                   'first_name' => $first_name,
                   'last_name'  => $last_name,
                   'image_id'   => $image_id_INT]);

    if ($sth !== false) {
        
        //$sth->   PDO::lastInsertId(?string $name = null): string|false
        session_start();
        $_SESSION['user_id']       = $pdo->lastInsertId();
        $_SESSION['statement']     = 2;
        $_SESSION['user_name']     = $user_name;
        $_SESSION['password']      = $password;
        $_SESSION['first_name']    = $first_name;
        $_SESSION['last_name']     = $last_name;
        $_SESSION['user_pic_path'] = 'through clear LOGIN';
        $_SESSION['image_id']      = 0;
        
        header('Location:'. "./show_user.php"  ); //. "?user_name=$user_name"
        exit();
        
        //echo 'Successful INSERT INTO users';
        
        
        
        
        
        
        
    }
    else {
        echo 'There is a problem ' . '<br>';
        print_r($pdo->errorInfo()) . '<br>';
        print_r($sth->errorInfo()) . '<br>';
    }
}
catch (PDOException $exc) {
    echo $exc->getTraceAsString() . '<br>';
}


//$query_string = sprintf("INSERT INTO users" .
//        "(user_name, password, first_name, last_name, image_id)" . 
//        "VALUES('%s','%s','%s','%s','%d');",
//        $user_name,
//        $password,
//        $first_name,
//        $last_name,
//        $image_id );