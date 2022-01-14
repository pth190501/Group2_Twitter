<?php require_once 'head.php'; ?>

<ul class="nav flex-column sticky-top">
    
    <div class="list-group">
    <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
        Who to follow
    </a>
    <?php
    $users = $db->query("SELECT * FROM `register` ORDER BY rand() LIMIT 6");
    foreach ($users as $user) { 
    ?>
        <a href="user.php?id=<?= $user['id']; ?>" class="list-group-item list-group-item-action"><?= $user['f_name'] . " " . $user['l_name']; ?></a>
    <?php } ?>
    </div>
</ul>

<?php require_once 'end.php'; ?>