<?php
header('Content-Type: application/json');
// 讓送出的表單資料以json方式回傳
echo json_encode($_POST);
// 如果沒有這個echo，會出現Unexpected end of JSON input這個錯誤