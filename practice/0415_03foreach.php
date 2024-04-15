<?php
$ar4 = array(
    'name' => 'Leana',
    'Hello',
    'age' => 22,
    30
);

// 類似for迴圈的用法，會列出前面的key跟後面的值，用-連接
foreach ($ar4 as $key => $value) {
    echo "$key-$value <br>";
}
;

// 只會列出值
foreach ($ar4 as $value) {
    echo "$value <br>";
}