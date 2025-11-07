<?php
include 'includes/DatabaseConnection.php';
include 'includes/DatabaseFunctions.php';

$title = 'Joke List';

// Lấy tất cả jokes
$jokes = allJokes($pdo);
$totalJokes = totalJokes($pdo);

ob_start();
include 'templates/jokes.html.php';
$output = ob_get_clean();

include 'templates/layout.html.php';
?>
