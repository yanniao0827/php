<?php
session_start();

// 如果有登入就顯示全部資料，沒登入只顯示特定資料
if (isset($_SESSION['admin'])) {
    include __DIR__ . '/list-admin.php';
} else {
    include __DIR__ . '/list-noadmin.php';
}