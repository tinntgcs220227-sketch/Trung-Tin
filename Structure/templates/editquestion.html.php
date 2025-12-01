<form action="editquestion.php" method="post" enctype="multipart/form-data">
  <input type="hidden" name="id" value="<?= $question['id']; ?>">
  
  <label for="text">Question Text:</label>
  <textarea id="text" name="text" rows="6" cols="40" required><?= htmlspecialchars($question['text'], ENT_QUOTES, 'UTF-8'); ?></textarea>
  
  <label for="authorid">Select Username:</label>
  <select name="authorid" id="authorid">
      <?php foreach ($authors as $author): ?>
          <option value="<?= $author['id']; ?>"
              <?php if ($author['id'] == $question['authorid']) echo 'selected'; ?>>
              <?= htmlspecialchars($author['name'], ENT_QUOTES, 'UTF-8'); ?>
          </option>
      <?php endforeach; ?>
  </select>

  <label for="categoryid">Select Module:</label>
  <select name="categoryid" id="categoryid">
      <?php foreach ($categories as $category): ?>
          <option value="<?= $category['id']; ?>"
              <?php if ($category['id'] == $question['categoryid']) echo 'selected'; ?>>
              <?= htmlspecialchars($category['categoryName'], ENT_QUOTES, 'UTF-8'); ?>
          </option>
      <?php endforeach; ?>
  </select>

  <label for="image">Change Image:</label>
  <?php if (!empty($question['image'])): ?>
    <p>Current Image:</p>
    <img src="../images/<?= htmlspecialchars($question['image'], ENT_QUOTES, 'UTF-8'); ?>" width="200">
  <?php endif; ?>

  <input type="file" id="image" name="image" accept="image/*">
  <input type="hidden" name="old_image" value="<?= htmlspecialchars($question['image'], ENT_QUOTES, 'UTF-8'); ?>">

  <input type="submit" value="Save Changes">
</form>