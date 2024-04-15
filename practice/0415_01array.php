<?php
#這裡使用text/plain是為了方便檢視結果
header('Content-Type: text/plain');

$ar1 = array(1, 2, 3, 4, 5);
$ar2 = [1, 2, 30, 7];
$ar3 = array(
    'name' => 'Leana',
    'age' => 22,
);
#在php的陣列中可以中間穿插字串資料，但如果沒有給key，print_r中會自動從[0]開始給key
$ar4 = array(
    'name' => 'Leana',
    'Hello',
    'age' => 22,
    30
);

#如果要檢視陣列也可以使用var_dump，但是使用print_r會比較清晰
var_dump($ar1);

print_r($ar1);
print_r($ar2);
print_r($ar3);
print_r($ar4);