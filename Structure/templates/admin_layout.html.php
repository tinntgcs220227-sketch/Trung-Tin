<?php
// Tệp: /Structure/templates/admin_layout.html.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?= $title ?></title>
  <link rel="stylesheet" href="../questions.css?v=1.1">
</head>

<body id="admin">
  <header>
    <h1>Admin Area - Internet Question Database</h1>
  </header>

  <nav>
    <ul>
      <li><a href="index.php">Admin Home</a></li>
      <li><a href="questions.php">Question list</a></li>
      <li><a href="addquestion.php">Add New Question</a></li>
      <li><a href="manageauthor.php">Manage Users</a></li>
      <li><a href="managecategories.php">Manage Modules</a></li>
      <li><a href="managemessages.php">
          Messages 
          <?php if (isset($unreadMessageCount) && $unreadMessageCount > 0): ?>
            <span style="background-color: #e74c3c; color: white; border-radius: 50%; padding: 2px 8px; margin-left: 5px; font-size: 0.8em; display: inline-block;">
              <?= $unreadMessageCount ?>
            </span>
          <?php endif; ?>
      </a></li>
      
      <li><a href="login/Logout.php">Public Site/Logout</a></li>

    </ul>
  </nav>

  <main>
    <?= $output ?>
  </main>

  <footer>
    <p>Admin Area © 2025 - Internet question Database</p>
  </footer>
</body>
</html>