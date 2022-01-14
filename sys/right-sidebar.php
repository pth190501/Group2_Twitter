<?php require_once 'head.php'; ?>

<<<<<<< HEAD
<nav class="navbar navbar-expand-lg navbar-light bg-light ">
                    <form class="d-flex">
                        <input class="form-control rounded-pill" type="search" placeholder="Search Twitter" aria-label="Search">
                        <button class="btn btn-success mx-2 " type="submit">Search</button>
                    </form>
                </nav>
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                    Trend for you
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">A link item</a>
                    <a href="#" class="list-group-item list-group-item-action">A link item</a>
                    <a href="#" class="list-group-item list-group-item-action">A link item</a>
                    <a href="#" class="list-group-item list-group-item-action">A link item</a>
                    <a href="#" class="list-group-item list-group-item-action">A link item</a>
                    <a href="#" class="list-group-item list-group-item-action">A link item</a>
                </div>
=======
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
>>>>>>> fa191a29b8e22bc509f32b14ae11752e8a7046cd
