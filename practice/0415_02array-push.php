<?php
#這裡使用text/plain是為了方便檢視結果
header('Content-Type: text/plain');

for ($i = 1; $i < 40; $i++) {
    $ar[] = $i;
}

print_r($ar);

array_push($ar, '43');
print_r($ar);
echo "\n\n"; //換行

echo implode('.', $ar); //將陣列用.接起來變成字串
echo "\n\n";

shuffle($ar); //將陣列內容亂數排序
echo implode('.', $ar);
echo "\n\n";

$st1 = '1,2,6,8,10,45';
$ar2 = explode(',', $st1); //將字串以,分隔變成陣列
print_r($ar2);