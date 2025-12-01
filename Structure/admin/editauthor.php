<?php
// Tệp: /Structure/admin/editauthor.php
session_start();
if (!isset($_SESSION["Authorised"]) || $_SESSION["Authorised"] != "Y") { 
    header("Location: login/Notauthorised.php");
    exit();
}

include '../includes/Databasequestion.php';
include '../includes/DatabaseFunctions.php';

if (isset($_POST['name'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    
    
    updateAuthor($pdo, $id, $name, $email, $password); // GỌI HÀM updateAuthor
    
    header('location: manageauthor.php');
    exit();
}

if (isset($_GET['id'])) {
    $author = getAuthorById($pdo, $_GET['id']);
    
    $title = 'Edit User: ' . $author['name'];
    $formTitle = 'Edit User';
    $formAction = 'editauthor.php';
    $submitValue = 'Save Changes';
    $isAdd = false;

    ob_start();
    include '../templates/editauthor.html.php';
    $output = ob_get_clean();
    include '../templates/admin_layout.html.php';
}
?>