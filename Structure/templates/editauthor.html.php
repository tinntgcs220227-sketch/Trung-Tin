<?php
// Tệp: /Structure/templates/editauthor.html.php
// Các biến: $formTitle, $formAction, $submitValue, $isAdd (đến từ file PHP)

$isAdd = $isAdd ?? false; 
?>
<h2><?= $formTitle ?? 'User Details' ?></h2>
<form action="<?= $formAction ?? 'editauthor.php' ?>" method="post">
  <input type="hidden" name="id" value="<?= $author['id'] ?? ''; ?>">
  
  <label for="name">Name:</label>
  <input type="text" id="name" name="name" value="<?= htmlspecialchars($author['name'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>

  <label for="email">Email:</label>
  <input type="email" id="email" name="email" value="<?= htmlspecialchars($author['email'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
  

  <input type="submit" value="<?= $submitValue ?? 'Save' ?>">
</form>