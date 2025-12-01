<?php
// Tệp: /Structure/admin/editcategory.php
session_start();
if (!isset($_SESSION["Authorised"]) || $_SESSION["Authorised"] != "Y") { 
    header("Location: login/Notauthorised.php");
    exit();
}

include '../includes/Databasequestion.php';
include '../includes/DatabaseFunctions.php';

if (isset($_POST['categoryName'])) {
    $id = $_POST['id'];
    $name = $_POST['categoryName'];
    
    updateCategory($pdo, $id, $name); // GỌI HÀM UPDATE MỚI
    
    header('location: managecategories.php');
    exit();
}

if (isset($_GET['id'])) {
    $category = getCategoryById($pdo, $_GET['id']);
    
    $title = 'Edit Module: ' . $category['categoryName'];
    $formTitle = 'Edit Module';
    $formAction = 'editcategory.php';
    $submitValue = 'Save Changes';

    ob_start();
    include '../templates/editcategory.html.php';
    $output = ob_get_clean();
    include '../templates/admin_layout.html.php';
}
?>