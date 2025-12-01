<?php
include '../includes/Databasequestion.php';
include '../includes/DatabaseFunctions.php';

if (isset($_POST['text'])) {
    $text = $_POST['text'];
    $authorid = 1; // Giả định ID tác giả
    $categoryid = $_POST['categoryid'] ?? 1; // Lấy categoryid từ form, mặc định là 1 nếu không có

    // Xử lý upload ảnh
    $image = null;
    if (!empty($_FILES['image']['name'])) {
        $targetDir = '../images/';
        $image = basename($_FILES['image']['name']);
        $targetFile = $targetDir . $image;
        move_uploaded_file($_FILES['image']['tmp_name'], $targetFile);
    }

    // GỌI HÀM ĐÃ SỬA: Với tham số categoryid
    insertQuestion($pdo, $text, $authorid, $image, $categoryid); 
    header('location: questions.php');
    exit();
}

$title = 'Add a new question';
ob_start();
include '../templates/addquestion.html.php';
$output = ob_get_clean();
// Đảm bảo sử dụng admin layout
include '../templates/admin_layout.html.php';
?>