<pre><?php
$a = 5;
$b = 7;


var_dump($a && $b);
var_dump($a || $b);
echo $a && $b;
echo "<br>";
echo $a || $b;
echo "<br>";

$c = $a and $b; //此時顯示的結果不會是布林值，因為and的優先權比=還要低，因此顯示出的結果是int(5)
var_dump($c);

$d = ($a and $b); //如果要顯示布林值，要用()包起來
var_dump($d);

?></pre>