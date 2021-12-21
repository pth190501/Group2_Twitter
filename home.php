<?php require_once 'sys/head.php'; ?>
    
   <?php
if (!isset($_SESSION['user'])) {
    header("Location: /");
    exit;
}
?>
<?php
if (isset($_POST['submit'])) {
    $content = mpost('content');
    $db->exec("INSERT INTO `posts` (`uid`, `content`, `img`) VALUES ('$uid', '$content', '');");
    $notidone = "Post Success";
} else if (isset($_POST['heart'])) {
    $idheart = (int) mpost('heart');
    $liked = $db->query("SELECT * FROM `user_like` WHERE `idpost` = '$idheart' AND `uid` = '$uid' LIMIT 1")->fetch();
    if ($liked['id'] != null) {
        $db->exec("DELETE FROM `user_like` WHERE `id` = '" . $liked['id'] . "'");
        $db->exec("UPDATE `posts` SET `num_like` = `num_like` - '1' WHERE `id` = '$idheart';");
    } else {
        $db->exec("INSERT INTO `user_like` (`uid`, `idpost`) VALUES ('$uid', '$idheart');");
        $db->exec("UPDATE `posts` SET `num_like` = `num_like` + '1' WHERE `id` = '$idheart';");
    }
    //$notidone = "Like Success";
} else if (isset($_POST['submit-cmt'])) {
    $idcmt = (int) mpost('submit-cmt');
    $content = mpost('content-' . $idcmt);
    $db->exec("INSERT INTO `cmt` (`uid`, `content`, `postid`) VALUES ('$uid', '$content', '$idcmt');");
}
?>
    <div class="container-fluid p-0">
        
        <div class="col md-12">

            <div class="row">
                <div class="col-md-3 text-center">
                <?php require_once 'sys/left-side.php'; ?>
                </div>

                <div class="col-md-6">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <div class="navbar-brand">
                            <h3>HOME</h3>
                        </div>
                        <div class="navbar-nav ml-md-auto">
                        <button type =" reset " class="border-0 bg-light">
                            <img src="assets/img/star.svg" alt="">
                        </button>
                        </div>
                    </nav>
                    <div class="container">
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="What's happenning?" id="floatingTextarea2" style="height: 100px"></textarea>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="btn-group mt-1 bg-white" role="group" aria-label="Basic example">
                            <button type="button" class="border-0 bg-white p-1">
                                <img src="assets/img/addimg.svg" alt="">
                            </button>
                            <button type="button" class="border-0 bg-white p-1">
                                <img src="assets/img/addgif.svg" alt="">
                            </button>
                            <button type="button" class="border-0 bg-white p-1">
                                <img src="assets/img/addemoji.svg" alt="">
                            </button>
                            <button type="button" class="btn btn-primary rounded-pill" style ="width:100px">
                                Tweet
                            </button>
                        </div>
                        <div class="container border border-dark mt-2">
                            <img src="assets/img/profile.svg" alt=""> Your Name
                            <h5>Content Status</h5>
                            <div>
                                <img src="assets/img/Back-logo.png" alt="" style ="width:50%">
                            </div>
                            <div class="btn-group d-flex justify-content-between" role="group" aria-label="Basic example">
                                <button type="button" class="border-0 bg-white">
                                <i class="far fa-heart"></i>
                                </button>
                                <button type="button" class="border-0 bg-white">
                                    <i class="far fa-comment"></i>
                                </button>
                                <button type="button" class="border-0 bg-white">
                                <i class="far fa-share-square"></i>
                                </button>
                            </div>
                        </div>
                        
                        <?php
                //my post
                $posts = $db->query("SELECT * FROM `posts` WHERE `uid` = '$uid' ORDER BY `id` DESC LIMIT 999");
                foreach ($posts as $post) {
                    $liked = $db->query("SELECT * FROM `user_like` WHERE `idpost` = '" . $post['id'] . "' AND `uid` = '$uid' LIMIT 1")->rowcount();
                    if ($liked == 1) {
                        $liked = true;
                    } else {
                        $liked = false;
                    }
                    $queryy = $db->query("SELECT * FROM `register` WHERE `id` = '" . $post['uid'] . "'")->fetch(); ?>
                    <div class="container border border-dark mt-2" id="post-<?= $post['id']; ?>">
                        <img src="assets/img/profile.svg" alt=""> <?= $queryy['l_name'] . " " . $queryy['l_name']; ?>
                        <h5><?= $post['content']; ?></h5>
                        <div>
                            <img src="assets/img/Back-logo.png" alt="" style="width:50%">
                        </div>
                        <form method="POST" action="">
                            <div class="btn-group d-flex justify-content-between" role="group" aria-label="Basic example">
                                <button type="submit" class="border-0 bg-white" name="heart" value="<?= $post['id']; ?>">
                                    <i class="far <?php if ($liked) echo "fa-solid"; ?> fa-heart"></i>&nbsp;<?= (int) $post['num_like']; ?>
                                </button>
                                <button type="button" class="border-0 bg-white">
                                    <i class="far fa-comment"></i>
                                </button>
                                <button type="button" class="border-0 bg-white">
                                    <i class="far fa-share-square"></i>
                                </button>
                            </div>
                        </form>
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-8 col-lg-12">
                                <div class="card shadow-0 border" style="background-color: #f0f2f5;">
                                    <div class="card-body p-4">
                                        <div class="form-outline mb-4">
                                            <input type="text" id="addANote" name="content-<?= $post['id']; ?>" class="form-control" placeholder="Type comment..." />
                                            <button name="submit-cmt" type="submit" class="btn btn-primary rounded-pill" value="<?= $post['id']; ?>" style="width:100px">
                                            Send
                                            </button>
                                        </div>
                                    <?php 
                                    $cmts = $db->query("SELECT * FROM `cmt` WHERE `postid` = '" . $post['id'] . "' ORDER BY `id` DESC LIMIT 3");
                                    foreach ($cmts as $cmt) { 
                                    $queryy = $db->query("SELECT * FROM `register` WHERE `id` = '" . $cmt['uid'] . "'")->fetch(); ?>
                                        <div class="card mb-4">
                                            <div class="card-body">
                                                <p><?= $cmt['content']; ?></p>

                                                <div class="d-flex justify-content-between">
                                                    <div class="d-flex flex-row align-items-center">
                                                        <!--img src="## src avatar ##" alt="avatar" width="25" height="25" /-->
                                                        <p class="small mb-0 ms-2"><?= $queryy['l_name'] . " " . $queryy['l_name']; ?></p>
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
                    <?php }
                
                ?>

                        
                    </div>
                </div>

                <div class="col-md-3">
                    <?php require_once 'sys/right-side.php'; ?>
                </div>
            </div>
            
        </div>

    </div>

<?php require_once 'sys/end.php'; ?>
