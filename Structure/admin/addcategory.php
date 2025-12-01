<?php
// Tệp: /Structure/admin/addcategory.php
session_start();
if (!isset($_SESSION["Authorised"]) || $_SESSION["Authorised"] != "Y") { 
    header("Location: login/Notauthorised.php");
    exit();
}

include '../includes/Databasequestion.php';
include '../includes/DatabaseFunctions.php';

if (isset($_POST['categoryName'])) {
    $name = $_POST['categoryName'];
    insertCategory($pdo, $name); // GỌI HÀM CREATE MỚI
    
    header('location: managecategories.php');
    exit();
}

$title = 'Add New Module';
$formTitle = 'Add New Module';
$formAction = 'addcategory.php';
$submitValue = 'Add Module';
$category = ['categoryName' => '']; // Dữ liệu rỗng cho form

ob_start();
include '../templates/editcategory.html.php'; // Template dùng chung
$output = ob_get_clean();
include '../templates/admin_layout.html.php';
?>