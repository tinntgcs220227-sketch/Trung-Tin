<?php
// Tệp: /Structure/admin/manageauthors.php
session_start();
if (!isset($_SESSION["Authorised"]) || $_SESSION["Authorised"] != "Y") { 
    header("Location: login/Notauthorised.php");
    exit();
}

try{
    include '../includes/Databasequestion.php';
    include '../includes/DatabaseFunctions.php';

    $authors = getAllAuthors($pdo); // GỌI HÀM getAllAuthors
    
    $title = 'Manage Users';

    ob_start();
    include '../templates/manageauthor.html.php'; // Template hiển thị danh sách
    $output = ob_get_clean();
}catch (PDOException $e){
    $title = 'An error has occured';
    $output= 'Database error: ' . $e->getMessage();
}
include '../templates/admin_layout.html.php';
?>