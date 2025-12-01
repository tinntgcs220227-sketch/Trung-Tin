<?php
// Tệp: /Structure/admin/deletecategory.php
session_start();
if (!isset($_SESSION["Authorised"]) || $_SESSION["Authorised"] != "Y") { 
    header("Location: login/Notauthorised.php");
    exit();
}

include '../includes/Databasequestion.php';
include '../includes/DatabaseFunctions.php';

if (isset($_POST['id'])) {
    deleteCategory($pdo, $_POST['id']); // GỌI HÀM DELETE MỚI
    header('location: managecategories.php');
    exit(); 
}
?>