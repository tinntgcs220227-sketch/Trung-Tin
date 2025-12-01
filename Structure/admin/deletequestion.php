<?php
// Tệp: /Structure/admin/deletequestion.php
session_start();
// BẢO MẬT: Kiểm tra ủy quyền
if (!isset($_SESSION["Authorised"]) || $_SESSION["Authorised"] != "Y") { 
    header("Location: login/Notauthorised.php");
    exit();
}

// SỬA ĐỔI: Sử dụng require_once để đảm bảo tệp được nạp thành công
include '../includes/Databasequestion.php';
include '../includes/DatabaseFunctions.php';

if (isset($_POST['id'])) {
    // Biến $pdo đã được định nghĩa trong Databasequestion.php
    deleteQuestion($pdo, $_POST['id']); // Lỗi undefined function xảy ra ở đây
    header('location: questions.php');
    exit(); 
}
?>