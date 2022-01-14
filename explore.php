<?php require_once 'sys/head.php'; ?>
<?php
if (!isset($_SESSION['user'])) {
    header("Location: /");
    exit;
}
?>
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
            <div class="col-md-3 text-center d-md-block d-none">
                <?php require_once 'sys/left-sidebar.php'; ?>
            </div>

            <div class="col-lg-6 col-md-8 p-2 border boder-light">
                <div class="navbar-brand p-1 m-0 bg-light d-md-block d-none sticky-top ">
                    <h3>EXPLORE</h3>
                </div>
                <ul class="nav nav-tabs justify-content-center bg-light sticky-top  d-md-none">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="home.php">
                            <img src="assets/img/home.svg" alt="">
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link bg-primary" href="explore.php">
                            <img src="assets/img/tag.svg" alt="">
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="list-messages.php">
                            <img src="assets/img/message.svg" alt="">
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php">
                            <img src="assets/img/profile.svg" alt="">
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">
                            <img src="assets/img/logout.svg" alt="">
                        </a>
                    </li>
                </ul>

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
                        <img src="assets/img/avatar.jpg" alt="" class="rounded-circle" style="width:40px">
                        <a href="user.php?id=<?= $post['uid']; ?>"><?= $queryy['f_name'] . " " . $queryy['l_name']; ?></a>
                        <h5><?= $post['content']; ?></h5>
                        <div>
                            <img src="<?= $post['img']; ?>" alt="" style="width:100%">
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
                                <div class="card shadow-0 border-0 bg-light">
                                    <div class="card-body p-1">
                                        <form method="POST" action="" class="form-outline d-flex col-sm-12 p-0">
                                            <input type="text" id="addANote" name="content-<?= $post['id']; ?>" class="form-control m-1 col-sm-10 " placeholder=" Type comment..." required />
                                            <button name="submit-cmt" type="submit" class="btn btn-primary m-1 col-sm-2" style="max-width:15%" value="<?= $post['id']; ?>">
                                                <i class="fas fa-paper-plane"></i>
                                            </button>
                                        </form>
                                        <?php
                                        $cmts = $db->query("SELECT * FROM `cmt` WHERE `postid` = '" . $post['id'] . "' ORDER BY `id` DESC LIMIT 3");
                                        foreach ($cmts as $cmt) {
                                            $queryy = $db->query("SELECT * FROM `register` WHERE `id` = '" . $cmt['uid'] . "'")->fetch(); ?>
                                            <div class="card mb-4">
                                                <div class="card-body">
                                                    <img src=" assets/img/profile.svg" alt=""> <a href="user.php?id=<?= $cmt['uid']; ?>"><?= $queryy['f_name'] . " " . $queryy['l_name']; ?></a>

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

            <div class="col-md-3 p-1 d-lg-block d-none">
                <?php require_once 'sys/r-sidebar-ex.php'; ?>
            </div>
        </div>

    </div>

</div>

<?php require_once 'sys/end.php'; ?>