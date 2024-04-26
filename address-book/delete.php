<?php

require __DIR__ . '/../config/pdo-connect.php';

$sid = isset($_GET['sid']) ? intval($_GET['sid']) : 0;
//如果今天要刪除的id小於1，代表根本沒東西能刪，所以就直接結束這個php然後跳回list頁面
if ($sid < 1) {
    header('Location: list.php');
    exit;
}

$sql = "DELETE FROM address_book WHERE sid=$sid";
$pdo->query($sql);

# $_SERVER['HTTP_REFERER']: 從哪個頁面連過來的
$comeFrom = 'list.php';
if (isset($_SERVER['HTTP_REFERER'])) {
    $comeFrom = $_SERVER['HTTP_REFERER'];
}

header("Location: $comeFrom");
