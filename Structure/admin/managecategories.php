<?php
// Tệp: /Structure/admin/managecategories.php
session_start();
// BẢO MẬT: Kiểm tra ủy quyền
if (!isset($_SESSION["Authorised"]) || $_SESSION["Authorised"] != "Y") { 
    header("Location: login/Notauthorised.php");
    exit();
}

try{
    include '../includes/Databasequestion.php';
    include '../includes/DatabaseFunctions.php';

    $categories = getAllCategories($pdo); // Hàm đã có
    
    $title = 'Manage Modules';

    ob_start();
    include '../templates/managecategories.html.php'; // Template mới
    $output = ob_get_clean();
}catch (PDOException $e){
    $title = 'An error has occured';
    $output= 'Database error: ' . $e->getMessage();
}
include '../templates/admin_layout.html.php';
?>