<?php

//require_once("../header.php");
require_once("../functions.php");
echo<<<_EOD
<style>
    body {
        background-color: #313315c3;;
    }
</style>
<br></br><br></br><br></br><br></br>
<h4 align='center'> all databases have created<h4>
_EOD;



//$query_string = filter_input(INPUT_GET, 'query_string');
$query_string = urldecode( trim((string) filter_input(INPUT_GET, 'query_string') ) );


//$query_string = urldecode( $_GET['query_string'] );




    
$query_string ?? '';

if (! empty($query_string) ) {
    $query_string = preg_replace("/[\n\r\t]+/i", ' ', $query_string);
    
    echo '<pre>';
    print $query_string .'<br /><br />';
    print_r($query_string).'<br /><br />';

    echo '</pre>';
    
    $sth = $pdo->prepare($query_string);

    print_r($sth).'<br /><br />';
    
    print $query_string .'<br /><br />';
    
    $sth->execute();
    
    

    
    
}









?>
</body>
</html>