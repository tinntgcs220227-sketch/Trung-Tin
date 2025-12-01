<?php
include '../includes/Databasequestion.php';
include '../includes/DatabaseFunctions.php';

if (isset($_POST['text'])) {
    $id = $_POST['id'];
    $text = $_POST['text'];

    // Xử lý update ảnh
    $image = $_POST['old_image']; 
    if (!empty($_FILES['image']['name'])) {
        $targetDir = '../images/';
        $image = basename($_FILES['image']['name']);
        $targetFile = $targetDir . $image;
        move_uploaded_file($_FILES['image']['tmp_name'], $targetFile);
    }
    
    // Gọi hàm updateQuestion đã được sửa
    updateQuestion($pdo, $id, $text, $image);
    
    // FIX: Sửa lỗi chính tả 'quesstions.php' thành 'questions.php'
    header('location: questions.php'); 
    exit();
}

if (isset($_GET['id'])) {
    $question = getQuestionById($pdo, $_GET['id']);
    $title = 'Edit question';
    ob_start();
    include '../templates/editquestion.html.php';
    $output = ob_get_clean();
    // FIX: Đổi từ layout công khai sang admin_layout.html.php
    include '../templates/admin_layout.html.php'; 
}
?>