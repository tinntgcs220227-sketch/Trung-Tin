<?php foreach($jokes as $joke): ?>
    <blockquote>
        <?=htmlspecialchars($joke['joketext'], ENT_QUOTES, 'UTF-8')?>
        (by <a href="mailto:<?=htmlspecialchars($joke['email'], ENT_QUOTES, 'UTF-8');?>">
        <?=htmlspecialchars($joke['name'], ENT_QUOTES, 'UTF-8'); ?></a>)    
        <a href="editjoke.php?id=<?= $joke['id'] ?>">Edit</a>

        <?php if (!empty($joke['images'])): ?>
            <div>
                <img src="images/<?= htmlspecialchars($joke['images'], ENT_QUOTES, 'UTF-8') ?>" 
                    width="200" height="150">
            </div>
        <?php endif; ?>

        <form action="deletejoke.php" method="post">
            <input type="hidden" name="id" value="<?=$joke['id']?>">
            <input type="submit" value="Delete">
</form>
</blockquote>
<?php endforeach;?>