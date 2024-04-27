<?php
require __DIR__ . '/../config/pdo-connect.php';

header('Content-Type: application/json');
// 正確驗證語法
$output = [
    'success' => false, # 新增資料有沒有成功，預設值為false
    'bodyData' => $_POST,
    'err' => 0, #方便查看php是在哪裡結束的
];


// 如果沒有name欄位，直接把$output轉成json格式
if (empty($_POST['email']) or empty($_POST['password'])) {
    $output['err'] = 400;
    echo json_encode($output);
    exit; # 結束 php 程式
}


#判斷帳號是否正確
$sql = "SELECT * FROM members WHERE email=?";
$stmt = $pdo->prepare($sql);

// execute是用來將驗證好的表單資料放進資料庫
$stmt->execute([$_POST['email']]);
$row = $stmt->fetch();
if (empty($row)) {
    # 帳號是錯的
    $output['err'] = 420;
    echo json_encode($output);
    exit; # 結束 php 程式
}

if (password_verify($_POST['password'], $row['password'])) {
    $output['success'] = true;
    # 把登入完成的狀態記錄在 session
    $_SESSION['admin'] = [
        'id' => $row['id'],
        'email' => $row['email'],
        'nickname' => $row['nickname'],
    ];
} else {
    # 密碼是錯的
    $output['err'] = 440;
}

// 讓送出的表單資料以json方式回傳如果沒有這個echo，會出現Unexpected end of JSON input這個錯誤
echo json_encode($output);
