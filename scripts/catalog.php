<?php

require_once("./header.php");
require_once("./catalog/element.php");
echo "<link id='catalog' rel='url' href='./catalog.php' type='text/php'>";

echo <<<_END
<p align= "center"> START of ITEMS  </p> 
_END;


$create_factory = new CreateFactory;
$temp_array  = $create_factory->getArray();


$draw_factory = new DrawFactory($temp_array);
$draw_factory->draw();


echo <<<_END
<br />
<p align= "center"> END of ITEMS  </p> 
<br />
_END;
?>
</body>
</html>