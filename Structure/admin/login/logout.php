<?php
// Logout.php
session_start(); // Start the session 
session_destroy(); // Completely destroy the session and all stored data [cite: 174, 153]
header("Location: ../../index.php"); // Redirect back to the login page 
?>