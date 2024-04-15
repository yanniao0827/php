<?php

header('Content-Type: text/plain');

$str = '{"name":"彥寧","age":22}'; //如果不是正確的json格式，會顯示null
$obj = json_decode($str); //後面的值如果不設定，預設值null
$ar = json_decode($str, true); //如果要轉成陣列，後面要加true

var_dump($obj);
var_dump($ar);