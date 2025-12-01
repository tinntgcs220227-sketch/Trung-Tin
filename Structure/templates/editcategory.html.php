<?php
// Tệp: /Structure/templates/editcategory.html.php
// Các biến: $formTitle, $formAction, $submitValue (đến từ file PHP)
?>
<h2><?= $formTitle ?? 'Module Details' ?></h2>
<form action="<?= $formAction ?? 'editcategory.php' ?>" method="post">
  <input type="hidden" name="id" value="<?= $category['id'] ?? ''; ?>">
  
  <label for="categoryName">Module Name:</label>
  <input type="text" id="categoryName" name="categoryName" 
         value="<?= htmlspecialchars($category['categoryName'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" 
         required>

  <input type="submit" value="<?= $submitValue ?? 'Save' ?>">
</form>