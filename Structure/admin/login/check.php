<?php
// Check.php
session_start(); // Start the session to check variables 
if ($_SESSION["Authorised"] != "Y") { // If the 'Authorised' session variable is NOT 'Y' 
    header("Location: Notauthorised.php"); // Redirect user 
}
?>