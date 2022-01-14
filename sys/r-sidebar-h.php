<?php require_once 'head.php'; ?>

<ul class="nav flex-column sticky-top">
    <form class="d-flex mt-2 mb-2">
        <input class="form-control rounded-pill" type="search" placeholder="Search Twitter" aria-label="Search">
        <button class="btn btn-success mx-2 " type="submit">Search</button>
    </form>
    <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
            Trend for you
        </a>
        <?php
        $posts = $db->query("SELECT * FROM posts ORDER BY id DESC LIMIT 6");
        foreach ($posts as $post) { ?>
            <a href="#post-<?= $post['id']; ?>" class="list-group-item list-group-item-action"><?= $post['content']; ?></a>
        <?php } ?>
    </div>
</ul>