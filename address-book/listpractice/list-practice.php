<?php
require __DIR__ . '/../../config/pdo-connect.php';

$sql = "SELECT * FROM address_book LIMIT 3";

$stmt = $pdo->query($sql); //query代表做資料表的查詢
$rows = $stmt->fetchAll(); //將3筆資料全部讀出來
echo json_encode($rows, JSON_UNESCAPED_UNICODE);
