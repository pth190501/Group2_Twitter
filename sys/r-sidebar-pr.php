<?php require_once 'head.php'; ?>

<ul class="nav flex-column sticky-top"> 
    <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
        You might like
    </a>
    <?php
    $posts = $db->query("SELECT * FROM posts ORDER BY id DESC LIMIT 8");
    foreach ($posts as $post) { ?>
        <a href="home.php#post-<?= $post['id']; ?>" class="list-group-item list-group-item-action"><?= $post['content']; ?></a>
    <?php } ?>
    </div>
</ul>