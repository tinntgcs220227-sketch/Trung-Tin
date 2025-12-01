<?php
// Tệp: /Structure/templates/manageauthors.html.php
?>
<h2><?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8') ?></h2>

<p><a href="addauthor.php">Add New User</a></p>

<p><?= count($authors) ?> users are registered.</p>

<?php foreach ($authors as $author): ?>
  <blockquote class="admin-question-item"> 
    
    <div style="padding-right: 50px;">
      <strong>Name: <?= htmlspecialchars($author['name'], ENT_QUOTES, 'UTF-8') ?></strong><br>
      <small>Email: <em><?= htmlspecialchars($author['email'], ENT_QUOTES, 'UTF-8') ?></em></small>
    </div>
    
    <a href="editauthor.php?id=<?= $author['id']; ?>" style="margin-left: auto; margin-right: 10px;">Edit</a>

    <form action="deleteauthor.php" method="post" 
          onsubmit="return confirm('Are you sure you want to delete user <?= htmlspecialchars($author['name']) ?>?');"> 
      <input type="hidden" name="id" value="<?= $author['id'] ?>">
      <input type="submit" value="Delete"
             style="background:#e74c3c;color:white;border:none;padding:6px 10px;
                    border-radius:6px;cursor:pointer;">
    </form>
  </blockquote>
<?php endforeach; ?>