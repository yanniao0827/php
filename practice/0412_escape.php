<?php
$a = "123\n456\"789\'000\\"; //在雙引號中，\'不會運作
$b = '123\n456\"789\'000\\'; //在單引號中，\'跟\\是可以正常運作的
echo $a . '<br>';
echo $b;