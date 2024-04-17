<?php
require __DIR__ . '/../../config/pdo-connect.php';

$perPage = 20; //每一頁我最多顯示20筆

$t_sql = "SELECT COUNT(1) FROM address_book";

$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0]; //資料的總筆數

$totalPages = ceil($totalRows / $perPage);

//去判斷有沒有給page資料，有給就顯示該頁數，沒有就列出第一頁
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

//如果今天輸入的頁數大於總頁數，就自動跳轉到最後一頁
if ($page > $totalPages) {
    header("Location: ?page={$totalPages}");
    exit;
};

//如果今天輸入的頁數小於1，就自動跳轉到第一頁的資料
if ($page < 1) {
    header('Location:?page=1');
    exit;
};

//第一個%s的位置指從第幾筆資料開始顯示，第二個%s是指要列出幾筆資料
// SELECT * FROM `address_book` ORDER BY sid DESC LIMIT 0, 20 ，從第0筆顯示20筆資料，指通訊簿第一頁
// SELECT * FROM `address_book` ORDER BY sid DESC LIMIT 20, 20 ，從第20筆顯示20筆資料，指通訊簿第二頁
// SELECT * FROM `address_book` ORDER BY sid DESC LIMIT 40, 20 ，從40筆顯示20筆資料，指通訊簿第三頁
// SELECT * FROM `address_book` ORDER BY sid DESC LIMIT 60, 20 ，從第60筆顯示20筆資料，指通訊簿第四頁

//今天資料的總筆數如果是0，總頁數也會是0，那就不用取得分頁資料，因此要去做判斷
$rows = []; #預設rows沒有資料
//今天totalRows有資料，我才要取得分頁的資料
if ($totalRows) {
    $sql = sprintf(
        "SELECT * FROM `address_book` ORDER BY sid DESC LIMIT %s, %s",
        ($page - 1) * $perPage,
        $perPage
    );
    $rows = $pdo->query($sql)->fetchAll();
};

echo json_encode(['page' => $page, 'totalRows' => $totalRows, 'totalPages' => $totalPages, 'rows' => $rows]);
