<?php
// Tệp: /Structure/templates/layout.html.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?></title>
  <link rel="stylesheet" href="questions.css?v=1.1"> 
</head>
<body>
  <header>
    <h1>Question Management System</h1>
  </header>

  <nav>
    <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="questions.php">Questions list</a></li>
      <li><a href="contact.php">Contact</a></li>
      <li><a href="admin/login/Login.html">Admin Login</a></li>
    </ul>
  </nav>

  <main>
    <?= $output; ?>
  </main>

  <footer>
    <p>&copy; <?= date('Y'); ?> Question System</p>
  </footer>
</body>
</html>