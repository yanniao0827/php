<?php

require './../config/connect-config.php';
# include './../config/connect-config.php';

$dsn = "mysql:host={$db_host};dbname={$db_name};port={$db_port};charset=utf8mb4";

$pdo = new PDO($dsn, $db_user, $db_pass);
