<?php
// Tệp: /Structure/contact.php
include 'includes/Databasequestion.php';
include 'includes/DatabaseFunctions.php';

$messageSent = false;

if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    
    if (!empty($username) && !empty($email) && !empty($message)) {
        insertContactMessage($pdo, $username, $email, $message); // GỌI HÀM CREATE
        $messageSent = true;
    }
}

$title = 'Contact Admin';

ob_start();
include 'templates/contact.html.php';
$output = ob_get_clean();

include 'templates/layout.html.php';
?>