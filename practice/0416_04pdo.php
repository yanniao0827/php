<?php

require './../config/connect-config.php';
# include './../config/connect-config.php';

//dsn指data sourse name，用來設定要連接的資料庫
$dsn = "mysql:host={$db_host};dbname={$db_name};port={$db_port};charset=utf8mb4";

//PDO的連接語法
$pdo = new PDO($dsn, $db_user, $db_pass);
