<?php

?>
<h2><?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8') ?></h2>

<p><?= count($questions) ?> questions have been submitted to the Internet Question Database.</p>

  <?php foreach ($questions as $question): ?>
  <blockquote class="admin-question-item">

    <?php if (!empty($question['image'])): ?>
      <img src="../images/<?= htmlspecialchars($question['image']) ?>"
           alt="question image"
           style="width:60px;height:60px;border-radius:10px;object-fit:cover;margin-right:15px;">
    <?php endif; ?>

    <div>
      <strong><?= htmlspecialchars($question['text'], ENT_QUOTES, 'UTF-8') ?></strong><br>
      <small>Submitted on <?= htmlspecialchars($question['date'], ENT_QUOTES, 'UTF-8') ?></small><br>
      
      <?php if (!empty($question['author_name'])): ?>
        <small>Username: <em><?= htmlspecialchars($question['author_name'], ENT_QUOTES, 'UTF-8') ?></em></small><br>
      <?php endif; ?>

      <?php if (!empty($question['categoryName'])): ?>
        <small>Module: <em><?= htmlspecialchars($question['categoryName'], ENT_QUOTES, 'UTF-8') ?></em></small>
      <?php endif; ?>
    </div>

    <form action="deletequestion.php" method="post" style="margin-left:auto;" 
          onsubmit="return confirm('Please confirm deletion of this post. Data will be lost permanently.');"> 
      <input type="hidden" name="id" value="<?= $question['id'] ?>">
      <input type="submit" value="Delete"
             style="background:#ff4d4d;color:white;border:none;padding:6px 10px;
                    border-radius:6px;cursor:pointer;margin-left:10px;">
    </form>
    <a href="editquestion.php?id=<?= $question['id']; ?>" style="margin-left: 10px;">Edit</a>
  </blockquote>
<?php endforeach; ?>