<?php
require __DIR__ . '/../../config/pdo-connect.php';

$perPage = 20; //每一頁我最多顯示20筆

$t_sql = "SELECT COUNT(1) FROM address_book";

$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0]; //資料的總筆數

$totalPages = ceil($totalRows / $perPage);

echo json_encode([$totalRows, $totalPages]);
