<?php
require __DIR__ . '/../config/pdo-connect.php';

$perPage = 20; //每一頁我最多顯示20筆

$t_sql = "SELECT COUNT(1) FROM address_book";

$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0]; //資料的總筆數

$totalPages = ceil($totalRows / $perPage);

//去判斷有沒有給page資料，有給就顯示該頁數，沒有就列出第一頁
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

//第一個%s的位置指從第幾筆資料開始顯示，第二個%s是指要列出幾筆資料
// SELECT * FROM `address_book` ORDER BY sid DESC LIMIT 0, 20 ，從第0筆顯示20筆資料，指通訊簿第一頁
// SELECT * FROM `address_book` ORDER BY sid DESC LIMIT 20, 20 ，從第20筆顯示20筆資料，指通訊簿第二頁
// SELECT * FROM `address_book` ORDER BY sid DESC LIMIT 40, 20 ，從40筆顯示20筆資料，指通訊簿第三頁
// SELECT * FROM `address_book` ORDER BY sid DESC LIMIT 60, 20 ，從第60筆顯示20筆資料，指通訊簿第四頁
$sql = sprintf(
    "SELECT * FROM `address_book` ORDER BY sid DESC LIMIT %s, %s",
    ($page - 1) * $perPage,
    $perPage
);

$rows = $pdo->query($sql)->fetchAll();
echo json_encode(['page' => $page, 'totalRows' => $totalRows, 'totalPages' => $totalPages, 'rows' => $rows]);
