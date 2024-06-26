<?php
require __DIR__ . '/../config/pdo-connect.php';
require __DIR__ . '/admin_required.php';
header('Content-Type: application/json');
// 正確驗證語法
$output = [
    'success' => false, # 新增資料有沒有成功，預設值為false
    'bodyData' => $_POST,
    'newId' => 0,
];

// TODO: 欄位資料檢查
// 如果沒有name欄位，直接把$output轉成json格式
if (!isset($_POST['name'])) {
    echo json_encode($output);
    exit; # 結束 php 程式
}

$birthday = strtotime($_POST['birthday']);
if ($birthday === false) {
    $birthday = null;
} else {
    $birthday = date('Y-m-d', $birthday);
}

$sql = "INSERT INTO `address_book`(
    `name`, `email`, `mobile`, `birthday`, `address`, `created_at`) VALUES (
      ?, /* name */
      ?, /* email */
      ?, /* mobile */
      ?, /* birthday */
      ?, /* address */
      NOW() )"; /* created_at */

$stmt = $pdo->prepare($sql);
// execute是用來將驗證好的表單資料放進資料庫
$stmt->execute([
    $_POST['name'],
    $_POST['email'],
    $_POST['mobile'],
    $birthday,
    $_POST['address']
]);

//錯誤驗證語法，如果今天表單內領面有單引號就會失敗
// $sql = sprintf("INSERT INTO `address_book`(
//     `name`, `email`, `mobile`, `birthday`, `address`, `created_at`) VALUES (
//       '%s',
//       '%s',
//       '%s',
//       '%s',
//       '%s', NOW() )",
//     $_POST['name'],
//     $_POST['email'],
//     $_POST['mobile'],
//     $_POST['birthday'],
//     $_POST['address']
// );
// $stmt = $pdo->query($sql);

# 新增了幾筆，新增資料如果成功就是加一筆，失敗就是0，兩個驚嘆號代表轉換成布林值
$output['success'] = !!$stmt->rowCount();
# 新增資料成功後，取得最近的一筆資料的primary key，在這裡不是用pdoStatement，而是用pdo方法中的lastInsertId()，讓我們新增的資料可以照著auto increment方式進行
$output['newId'] = $pdo->lastInsertId();

// 讓送出的表單資料以json方式回傳如果沒有這個echo，會出現Unexpected end of JSON input這個錯誤
echo json_encode($output);
