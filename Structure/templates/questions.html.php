<?php
// Tệp: /Structure/templates/questions.html.php

?>
<h2 style="margin-bottom: 20px;">All Questions</h2>

<?php foreach ($questions as $question): ?>
  <blockquote class="public-question-item"
    style="display: flex; align-items: center; padding: 10px 20px;">
    <?php if (!empty($question['image'])): ?>
      <img src="images/<?= htmlspecialchars($question['image'], ENT_QUOTES, 'UTF-8'); ?>" 
           width="60" 
           style="display:block;margin-bottom:10px; border-radius: 5px;">
    <?php endif; ?>

    <p style="font-size: 1.1em; font-weight: bold; padding: 10px 0;">
        <?= nl2br(htmlspecialchars($question['text'], ENT_QUOTES, 'UTF-8')); ?>
    </p>

    <?php if (!empty($question['author_name'])): ?>
      <p style="font-size: 0.9em; color: #5e35b1; margin-bottom: 0; margin-left: 15px">
          Username: <?= htmlspecialchars($question['author_name'], ENT_QUOTES, 'UTF-8') ?>
      </p>
    <?php endif; ?>

    <?php if (!empty($question['categoryName'])): ?>
      <p style="font-size: 0.9em; color: #00bcd4; margin-top: 5px; margin-left: 15px">
          Module: <em><?= htmlspecialchars($question['categoryName'], ENT_QUOTES, 'UTF-8') ?></em>
      </p>
    <?php endif; ?>

  </blockquote>
<?php endforeach; ?>