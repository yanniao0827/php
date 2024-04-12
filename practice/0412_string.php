<?php
$a = 'Leana';
echo $a . '<br/>';

echo "Hello, $a <br/>";
echo 'Hello, $a <br/>'; //不會顯示Leana，而是顯示Hello, $a
echo "Hello, $a123 <br/>"; //會出現warning，因為找不到$a123是什麼，但即使出現warning還是會運行，只是只會顯示出Hello
echo "Hello, {$a}123 <br/>"; //如果想在變數後面接東西，就使用{}把變數包起來