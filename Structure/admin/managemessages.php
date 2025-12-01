<?php
// Tệp: /Structure/admin/managemessages.php
session_start();
// BẢO MẬT: Kiểm tra ủy quyền
if (!isset($_SESSION["Authorised"]) || $_SESSION["Authorised"] != "Y") { 
    header("Location: login/Notauthorised.php");
    exit();
}

include '../includes/Databasequestion.php';
include '../includes/DatabaseFunctions.php';

// Xử lý Xóa tin nhắn
if (isset($_POST['delete_id'])) {
    deleteContactMessage($pdo, $_POST['delete_id']); // GỌI HÀM DELETE
    header('location: managemessages.php');
    exit();
}

try{
    // THÊM: LOGIC RESET BỘ ĐẾM KHI ADMIN TRUY CẬP TRANG
    markAllMessagesAsRead($pdo); // Đánh dấu tất cả là đã đọc
    // Lấy lại số lượng tin nhắn chưa đọc (sẽ là 0) để cập nhật hiển thị trên layout
$unreadMessageCount = countUnreadMessages($pdo);

    $messages = getAllContactMessages($pdo); // GỌI HÀM READ
    
    $title = 'Manage Contact Messages';

    ob_start();
    include '../templates/managemessages.html.php';
    $output = ob_get_clean();
}catch (PDOException $e){
    $title = 'An error has occured';
    $output= 'Database error: ' . $e->getMessage();
}
include '../templates/admin_layout.html.php';
?>