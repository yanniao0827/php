<?php
#自訂常數 用define("(自訂名稱)","(自訂值)"); 來宣告
define("MY_CONSTANT", "常數值"); //常數值在設定後無法被變更
echo MY_CONSTANT;

echo "<br>";

#變數 用$宣告，第一個字不能是數字
$i = 1;
echo isset($i) ? "i有被設定資料型別" : "i沒有被設定資料型別"; //isset用來看變數是否有被設定資料型別

echo "<br>";
echo isset($k) ? "k有被設定資料型別" : "k沒有被設定資料型別";

echo "<br>";
$my_var = 66;
$b = "22";
$c = 'abc';

echo $my_var + $b; //會將$b轉換數字做運算，得到解果88
echo $my_var + $c;
//會出現fatal error 代表最嚴重的錯誤，因為$c無法轉換成數字