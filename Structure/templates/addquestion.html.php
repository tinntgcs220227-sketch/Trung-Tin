<form action="" method="post" enctype="multipart/form-data">
    <label for='text'>Type your question here:</label>
    <textarea name="text" rows="3" cols="40"></textarea>
    
    <label for="authorid">Select Username:</label>
    <select name="authorid" id="authorid">
        <?php foreach ($authors as $author): ?>
            <option value="<?= $author['id']; ?>">
                <?= htmlspecialchars($author['name'], ENT_QUOTES, 'UTF-8'); ?>
            </option>
        <?php endforeach; ?>
    </select>
    
    <label for="categoryid">Select Module:</label>
    <select name="categoryid" id="categoryid">
        <?php foreach ($categories as $category): ?>
            <option value="<?= $category['id']; ?>">
                <?= htmlspecialchars($category['categoryName'], ENT_QUOTES, 'UTF-8'); ?>
            </option>
        <?php endforeach; ?>
    </select>
    
    <label for='image'>Select Image:</label>
    <input type="file" id="image" name="image" accept="image/*"><br> 
    
    <input type="submit" name="submit" value="Add">
</form>