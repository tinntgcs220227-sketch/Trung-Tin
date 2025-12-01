<?php
// Tệp: /Structure/templates/managemessages.html.php
?>
<h2><?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8') ?></h2>

<p><?= count($messages) ?> messages received.</p>

<?php foreach ($messages as $message): ?>
  <blockquote class="admin-question-item"> 
    
    <div style="flex-grow: 1; padding-right: 20px;">
      <strong>Message from: <?= htmlspecialchars($message['username'], ENT_QUOTES, 'UTF-8') ?></strong><br>
      <small>Email: <em><?= htmlspecialchars($message['email'], ENT_QUOTES, 'UTF-8') ?></em></small><br>
      <small>Sent on: <em><?= htmlspecialchars($message['sent_date'], ENT_QUOTES, 'UTF-8') ?></em></small>
      <hr style="border-top: 1px solid #eee; margin: 5px 0;">
      <p style="white-space: pre-wrap; margin: 0; font-size: 1em;">
        <?= htmlspecialchars($message['message'], ENT_QUOTES, 'UTF-8') ?>
      </p>
    </div>
    
    <form action="managemessages.php" method="post" style="flex-shrink: 0;"
          onsubmit="return confirm('Delete this message?');"> 
      <input type="hidden" name="delete_id" value="<?= $message['id'] ?>">
      <input type="submit" value="Delete"
             style="background:#e74c3c;color:white;border:none;padding:6px 10px;
                    border-radius:6px;cursor:pointer;">
    </form>
  </blockquote>
<?php endforeach; ?>