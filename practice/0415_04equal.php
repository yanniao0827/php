<?php
header('Content-Type: text/plain');

$ar4 = array(
    'name' => 'Leana',
    'age' => 22,
);

$ar5 = $ar4; //會複製ar4的內容變成一個新陣列
$ar5['name'] = 'Angel'; //將新陣列的name改內容，因此不會影響前一個陣列的內容

print_r($ar4);
print_r($ar5);

$ar5 = &$ar4; //設定陣列位址，指向相同陣列，這時ar4跟ar5指的是同一個陣列
$ar5['name'] = 'Teresa'; //這時兩個陣列的值都會被改動

print_r([
    'ar4' => $ar4,
    'ar5' => $ar5,
]);

