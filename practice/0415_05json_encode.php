<?php
header('Content-Type: application/json'); //告訴電腦這裡是使用php格式

$ar4 = array(
    'name' => '彥寧',
    'age' => 22,
);

echo json_encode($ar4, JSON_UNESCAPED_UNICODE);
//因為陣列內容裡面有中文字，轉換成json的話會變成跳脫字元unicode無法正常顯示果想要正常顯示就新增JSON_UNESCAPED_UNICODE