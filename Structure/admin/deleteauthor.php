<?php
// Tệp: /Structure/admin/deleteauthor.php
session_start();
if (!isset($_SESSION["Authorised"]) || $_SESSION["Authorised"] != "Y") { 
    header("Location: login/Notauthorised.php");
    exit();
}

include '../includes/Databasequestion.php';
include '../includes/DatabaseFunctions.php';

if (isset($_POST['id'])) {
    deleteAuthor($pdo, $_POST['id']); // GỌI HÀM deleteAuthor
    header('location: manageauthor.php');
    exit(); 
}
?>