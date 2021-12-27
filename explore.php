<?php require_once 'sys/head.php'; ?>
<?php
if (isset($_POST['heart'])) {
    $idheart = (int) mpost('heart');
    $liked = $db->query("SELECT * FROM `user_like` WHERE `idpost` = '$idheart' AND `uid` = '$uid' LIMIT 1")->fetch();
    if ($liked['id'] != null) {
        $db->exec("DELETE FROM `user_like` WHERE `id` = '" . $liked['id'] . "'");
        $db->exec("UPDATE `posts` SET `num_like` = `num_like` - '1' WHERE `id` = '$idheart';");
    } else {
        $db->exec("INSERT INTO `user_like` (`uid`, `idpost`) VALUES ('$uid', '$idheart');");
        $db->exec("UPDATE `posts` SET `num_like` = `num_like` + '1' WHERE `id` = '$idheart';");
    }

} else if (isset($_POST['submit-cmt'])) {
    $idcmt = (int) mpost('submit-cmt');
    $content = mpost('content-' . $idcmt);
    $db->exec("INSERT INTO `cmt` (`uid`, `content`, `postid`) VALUES ('$uid', '$content', '$idcmt');");
}
?>
<div class="container-fluid p-0">

    <div class="col md-12">

        <div class="row">
            <div class="col-md-3 text-center pe-1 sticky-top ">
                <?php require_once 'sys/left-sidebar.php'; ?>
            </div>

            <div class="col-md-6 border boder-light pt-2 p-0">
                <nav class="navbar navbar-expand- bg-light mb-2 sticky-top p-0">
                    <div class="col border-highlight border-bottom pb-2">
                        <input class="form-control form-control-lg rounded-pill" type="text" placeholder="Search">
                    </div>
                </nav>
            <?php
                $posts = $db->query("SELECT * FROM `posts` ORDER BY `id` DESC LIMIT 999");
                foreach ($posts as $post) {
                    $liked = $db->query("SELECT * FROM `user_like` WHERE `idpost` = '" . $post['id'] . "' AND `uid` = '$uid' LIMIT 1")->rowcount();
                    if ($liked == 1) {
                        $liked = true;
                    } else {
                        $liked = false;
                    }
                    $queryy = $db->query("SELECT * FROM `register` WHERE `id` = '" . $post['uid'] . "'")->fetch(); ?>
                    <div class="container border border-dark mt-2" id="post-<?= $post['id']; ?>">
                        <img src=" assets/img/profile.svg" alt=""> <?= $queryy['f_name'] . " " . $queryy['l_name']; ?>
                        <h5><?= $post['content']; ?></h5>
                        <div>
                            <img src="<?= $post['img']; ?>" alt="" style="width:50%">
                        </div>
                        <form method="POST" action="">
                            <div class="btn-group d-flex justify-content-between" role="group" aria-label="Basic example">
                                <button type="submit" class="border-0 bg-white" name="heart" value="<?= $post['id']; ?>">
                                    <i class="far <?php if ($liked) echo "fa-solid"; ?> fa-heart"></i>&nbsp;<?= (int) $post['num_like']; ?>
                                </button>
                            </div>
                        </form>
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-8 col-lg-12 p-0">
                                <div class="card shadow-0 border-0" style="background-color: #f0f2f5;">
                                    <div class="card-body p-1">
                                        <form method="POST" action="" class="form-outline d-flex">
                                            <input type="text" id="addANote" name="content-<?= $post['id']; ?>" class="form-control m-1" placeholder="Type comment..." style="width:90%" required/>
                                            <button name="submit-cmt" type="submit" class="btn btn-primary m-1" value="<?= $post['id']; ?>" style="width:10%">
                                                <i class="fas fa-paper-plane"></i>
                                            </button>
                                        </form>
                                        <?php
                                        $cmts = $db->query("SELECT * FROM `cmt` WHERE `postid` = '" . $post['id'] . "' ORDER BY `id` DESC LIMIT 3");
                                        foreach ($cmts as $cmt) {
                                            $queryy = $db->query("SELECT * FROM `register` WHERE `id` = '" . $cmt['uid'] . "'")->fetch(); ?>
                                            <div class="card mb-4">
                                                <div class="card-body">
                                                    <p><?= $queryy['f_name'] . " " . $queryy['l_name']; ?></p>

                                                    <div class="d-flex justify-content-between">
                                                        <div class="d-flex flex-row align-items-center">
                                                            <!--img src="## src avatar ##" alt="avatar" width="25" height="25" /-->
                                                            <p class="small mb-0 ms-2"><?= $cmt['content']; ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                <?php } ?>
            </div>

            <div class="col-md-3 ps-1">
                <?php require_once 'sys/r-sidebar-ex.php'; ?>
            </div>
        </div>

    </div>

</div>

<?php require_once 'sys/end-main.php'; ?>