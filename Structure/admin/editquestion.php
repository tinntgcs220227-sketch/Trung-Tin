<?php
// Tệp: /Structure/admin/editquestion.php
include '../includes/Databasequestion.php';
include '../includes/DatabaseFunctions.php';

if (isset($_POST['text'])) {
    $id = $_POST['id'];
    $text = $_POST['text'];
    
    // THÊM: Lấy Author ID và Category ID từ form
    $authorid = $_POST['authorid'];
    $categoryid = $_POST['categoryid'];

    $image = $_POST['old_image'];
    if (!empty($_FILES['image']['name'])) {
        $targetDir = '../images/';
        $image = basename($_FILES['image']['name']);
        $targetFile = $targetDir . $image;
        move_uploaded_file($_FILES['image']['tmp_name'], $targetFile);
    }

    // GỌI HÀM UPDATE VỚI CÁC THAM SỐ MỚI
    updateQuestion($pdo, $id, $text, $image, $authorid, $categoryid); 
    header('location: questions.php');
    exit();
}

if (isset($_GET['id'])) {
    $question = getQuestionById($pdo, $_GET['id']);
    
    // THÊM: Truy vấn danh sách Authors và Categories
    $authors = getAllAuthors($pdo);
    $categories = getAllCategories($pdo);
    
    $title = 'Edit question';
    ob_start();
    include '../templates/editquestion.html.php';
    $output = ob_get_clean();
    include '../templates/admin_layout.html.php';
}
?>