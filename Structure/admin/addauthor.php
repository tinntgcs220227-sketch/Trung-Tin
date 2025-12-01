<?php
// Tệp: /Structure/admin/addauthor.php
session_start();
if (!isset($_SESSION["Authorised"]) || $_SESSION["Authorised"] != "Y") { 
    header("Location: login/Notauthorised.php");
    exit();
}

include '../includes/Databasequestion.php';
include '../includes/DatabaseFunctions.php';

if (isset($_POST['email'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    

    addAuthor($pdo, $name, $email, $password); // GỌI HÀM addAuthor
    
    header('location: manageauthor.php');
    exit();
}

$title = 'Add New User';
$formTitle = 'Add New User';
$formAction = 'addauthor.php';
$submitValue = 'Add User';
$author = ['name' => '', 'email' => '']; 
$isAdd = true; 

ob_start();
include '../templates/editauthor.html.php'; // Template dùng chung
$output = ob_get_clean();
include '../templates/admin_layout.html.php';
?>