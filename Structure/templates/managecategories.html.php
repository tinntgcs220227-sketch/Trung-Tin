<?php
// Tệp: /Structure/templates/managecategories.html.php
?>
<h2><?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8') ?></h2>

<p><a href="addcategory.php">Add New Module</a></p>

<p><?= count($categories) ?> modules are registered.</p>

<?php foreach ($categories as $category): ?>
  <blockquote class="admin-question-item"> 
    
    <div style="padding-right: 50px;">
      <strong>Module Name: <?= htmlspecialchars($category['categoryName'], ENT_QUOTES, 'UTF-8') ?></strong>
    </div>
    
    <a href="editcategory.php?id=<?= $category['id']; ?>" style="margin-left: auto; margin-right: 10px;">Edit</a>

    <form action="deletecategory.php" method="post" 
          onsubmit="return confirm('WARNING: Are you sure you want to delete this module? All related questions may be affected.');"> 
      <input type="hidden" name="id" value="<?= $category['id'] ?>">
      <input type="submit" value="Delete"
             style="background:#e74c3c;color:white;border:none;padding:6px 10px;
                    border-radius:6px;cursor:pointer;">
    </form>
  </blockquote>
<?php endforeach; ?>