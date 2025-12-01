<?php
// index.php
require "Check.php"; // Include the authorization check file 
?>
<html>
<head>
    <title>protected page</title>
</head>
<body>
    Welcome to the protected page!!<br />
    you are logged in<br />
    <a href="Logout.php">logout</a>
</body>
</html>