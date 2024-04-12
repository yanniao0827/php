<?php

echo $_GET['a'] + $_GET['b'];
echo "<br>";

$c = isset($_GET['c']) ? intval($_GET['c']) : 0; //代表如果c有值就代入該值，沒有值就代入0
$d = !empty($_GET['d']) ? intval($_GET['d']) : 0; //代表如果d不是空值就代入該值，沒有值就代入0
echo $c + $d; //c跟d的值也可以在瀏覽器手動輸入