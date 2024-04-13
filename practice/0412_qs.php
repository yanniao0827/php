<?php
sleep(10);
$a = isset($_GET['a']) ? intval($_GET['a']) : 0; //代表如果c有值就代入該值，沒有值就代入0
$b = !empty($_GET['b']) ? intval($_GET['b']) : 0; //代表如果d不是空值就代入該值，沒有值就代入0
echo $a + $b; //c跟d的值也可以在瀏覽器手動輸入