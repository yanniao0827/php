<?php

require __DIR__ . '/../config/pdo-connect.php';

$sql = "SELECT * FROM address_book LIMIT 3"; //LIMIT

$stmt = $pdo->query($sql);
$rows = $stmt->fetchAll();

echo json_encode($rows, JSON_UNESCAPED_UNICODE);
