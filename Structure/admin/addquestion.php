<?php
// Tệp: /Structure/admin/addquestion.php
session_start();
// BẢO MẬT: Kiểm tra ủy quyền
if (!isset($_SESSION["Authorised"]) || $_SESSION["Authorised"] != "Y") { 
    header("Location: login/Notauthorised.php");
    exit();
}

include '../includes/Databasequestion.php';
include '../includes/DatabaseFunctions.php';

// THÊM: Lấy số lượng tin nhắn chưa đọc vào biến $unreadMessageCount
$unreadMessageCount = countUnreadMessages($pdo);

if (isset($_POST['text'])) {
    $text = $_POST['text'];
    
    // GHI ĐÈ authorid và categoryid từ form
    $authorid = $_POST['authorid'] ?? $_SESSION['user_id'] ?? 1; 
    $categoryid = $_POST['categoryid'] ?? 1; 

    $image = null;
    if (!empty($_FILES['image']['name'])) {
        $targetDir = '../images/';
        $image = basename($_FILES['image']['name']);
        $targetFile = $targetDir . $image;
        move_uploaded_file($_FILES['image']['tmp_name'], $targetFile);
    }

    insertQuestion($pdo, $text, $authorid, $image, $categoryid);
    header('location: questions.php'); 
    exit(); 
}

// THÊM: Truy vấn danh sách Authors và Categories
$authors = getAllAuthors($pdo);
$categories = getAllCategories($pdo);

$title = 'Add a new question';
ob_start();
include '../templates/addquestion.html.php';
$output = ob_get_clean();
include '../templates/admin_layout.html.php';
?>