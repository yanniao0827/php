<?php
require __DIR__ . '/../config/pdo-connect.php';

header('Content-Type: application/json');
// 正確驗證語法
$output = [
    'success' => false, # 新增資料有沒有成功，預設值為false
    'bodyData' => $_POST,
];

// TODO: 欄位資料檢查
// 如果沒有name欄位，直接把$output轉成json格式
if (!isset($_POST['sid'])) {
    echo json_encode($output);
    exit; # 結束 php 程式
}

$birthday = strtotime($_POST['birthday']);
if ($birthday === false) {
    $birthday = null;
} else {
    $birthday = date('Y-m-d', $birthday);
}

$sql = "UPDATE `address_book` SET 
`name`=?,
`email`=?,
`mobile`=?,
`birthday`=?,
`address`=?
WHERE sid=?";

$stmt = $pdo->prepare($sql);
// execute是用來將驗證好的表單資料放進資料庫
$stmt->execute([
    $_POST['name'],
    $_POST['email'],
    $_POST['mobile'],
    $birthday,
    $_POST['address'],
    $_POST['sid']
]);


# 新增了幾筆，新增資料如果成功就是加一筆，失敗就是0，兩個驚嘆號代表轉換成布林值
$output['success'] = !!$stmt->rowCount();


// 讓送出的表單資料以json方式回傳如果沒有這個echo，會出現Unexpected end of JSON input這個錯誤
echo json_encode($output);
