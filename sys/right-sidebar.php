<?php require_once 'head.php'; ?>

<ul class="nav flex-column sticky-top">
    <div class="list-group">
    <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
        Lastest Posts
    </a>
    <?php
    $posts = $db->query("SELECT * FROM posts ORDER BY id DESC LIMIT 6");
    foreach ($posts as $post) { ?>
        <a href="#post-<?= $post['id']; ?>" class="list-group-item list-group-item-action"><?= $post['content']; ?></a>
    <?php } ?>
    </div>
</ul>