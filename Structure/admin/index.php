<?php
include '../includes/Databasequestion.php';
include '../includes/DatabaseFunctions.php';

// THÊM: Lấy số lượng tin nhắn chưa đọc vào biến $unreadMessageCount
$unreadMessageCount = countUnreadMessages($pdo);

$title = 'Internet Question Database';
ob_start();
include '../templates/home.html.php';
$output = ob_get_clean();
include '../templates/admin_layout.html.php';
?>