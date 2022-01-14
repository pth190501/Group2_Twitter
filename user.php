<?php require_once 'sys/head.php'; ?>
<?php
if (!isset($_SESSION['user'])) {
    header("Location: /");
    exit;
}
?>
<?php
if (isset($_GET['id'])) {
    $id = (int) mget('id');
    $userdata = $db->query("SELECT * FROM `register` WHERE `id` = '$id' LIMIT 1")->fetch();
    if ($userdata['id'] != $id || (int) $userdata['id'] == 0) {
        header("Location: index.php");
        exit;
    } else {
        $followthis = $db->query("SELECT * FROM `follow` WHERE `uid` = '$uid' AND `followid` = '$id' LIMIT 1")->fetch();
        if ($followthis['followid'] == $id) {
            $isfollow = true;
        } else {
            $isfollow = false;
        }
        if (isset($_POST['follow'])) {
            if (!$isfollow) {
                $db->exec("INSERT INTO `follow` (`id`, `uid`, `followid`) VALUES (NULL, '$uid', '$id');");
                $db->exec("UPDATE `register` SET `following` = `following` + 1 WHERE `id` = '$uid'");
                $db->exec("UPDATE `register` SET `follower` = `follower` + 1 WHERE `id` = '$id'");
                $isfollow = true;
                $userdata = $db->query("SELECT * FROM `register` WHERE `id` = '$id' LIMIT 1")->fetch();
            } else {
                $db->exec("DELETE FROM `follow` WHERE `followid` = '$id'");
                $db->exec("UPDATE `register` SET `following` = `following` - 1 WHERE `id` = '$uid'");
                $db->exec("UPDATE `register` SET `follower` = `follower` - 1 WHERE `id` = '$id'");
                $isfollow = false;
                $userdata = $db->query("SELECT * FROM `register` WHERE `id` = '$id' LIMIT 1")->fetch();
            }
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
        } else if (isset($_POST['submit-cmt'])) {
            $idcmt = (int) mpost('submit-cmt');
            $content = mpost('content-' . $idcmt);
            $db->exec("INSERT INTO `cmt` (`uid`, `content`, `postid`) VALUES ('$uid', '$content', '$idcmt');");
        }
    }
} else {
    header("Location: index.php");
    exit;
}
?>
<div class="container-fluid p-0">
    <div class="col md-12">
        <div class="row">
            <div class="col-md-3 text-center d-md-block d-none">
                <?php require_once 'sys/left-sidebar.php'; ?>
            </div>

            <div class="col-lg-6 col-md-8 p-1 border boder-light">
                <div class="">
                    <a href="profile.php">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                    <div>
                        <h4>
                            <span><?= $userdata['f_name'] . " " . $userdata['l_name']; ?></span>
                        </h4>
                        <div style="margin-top: -13px">
                            <h6 class="text-secondary"><?= number_format($userdata['posts']); ?> Tweet<?php if ((int) $userdata['posts'] > 1) echo 's'; ?></h6>
                        </div>
                    </div>
                </div>
                <section>

                    <div class="image">
                        <img src="assets/img/cover-img.jpg" class="img-fluid" alt="Cover image" style="max-height:17em;width:100%;">

                        <img src="assets/img/avatar.jpg" class="img-fluid rounded-circle mt-n5" alt="Avatar" style="width: 30%;max-height:10em">
                        <div>
                            <div class="m-1 d-flex ">
                                <div class="align-items-start" style="width: 40%;">
                                    <h4 class="p-4" style="margin-top: -20px"><strong> <?= $userdata['f_name'] . " " . $userdata['l_name']; ?> </strong></h4>
                                    <?php if ($userdata['uid'] != "") { ?>
                                        <h6 class="p-4 text-secondary" style="margin-top: -50px"> @<?= $userdata['uid']; ?> </h6>
                                    <?php } ?>
                                    <h6 class="p-4 text-secondary" style="margin-top: -50px"><i class="far fa-calendar-alt"></i> Joined <?= date("d/m/Y", $userdata['datejoin']); ?></h6>
                                    <a class="btn btn-link text-secondary"><?= number_format($userdata['following']); ?> Following</a>
                                    <a class="btn btn-link text-secondary"><?= number_format($userdata['follower']); ?> Followers</a>
                                </div>


                                <script>
                                    function myFunction() {
                                        var elem = document.getElementById("myButton1"),
                                            text = elem.textContent || elem.innerText;

                                        if (text === "Following")
                                            elem.innerHTML = "Follow";
                                        else
                                            elem.innerHTML = "Following";
                                    }
                                </script>

                                <div class="d-flex justify-content-end align-items-center" style="width: 60%;">
                                    <div class="border border-dark rounded-circle m-1 text-center" style="height: auto;width:auto">
                                        <a href="messages.php?id=<?= $userdata['id']; ?>">

                                            <img src="assets/img/message.svg" alt="">
                                        </a>
                                    </div>
                                    <form method="POST">
                                        <button type="submit" name="follow" value="<?= $id; ?>" id="myButton1" class="btn border-dark rounded-pill" data-toggle="modal" data-target="#myModal">
                                            Follow<?php if ($isfollow) echo 'ing'; ?>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                </section>

                <?php
                //my post
                $posts = $db->query("SELECT * FROM `posts` WHERE `uid` = '$id' ORDER BY `id` DESC LIMIT 999");
                foreach ($posts as $post) {
                    $liked = $db->query("SELECT * FROM `user_like` WHERE `idpost` = '" . $post['id'] . "' AND `uid` = '$uid' LIMIT 1")->rowcount();
                    if ($liked == 1) {
                        $liked = true;
                    } else {
                        $liked = false;
                    }
                    $queryy = $db->query("SELECT * FROM `register` WHERE `id` = '" . $post['uid'] . "'")->fetch(); ?>
                    <div class="container border border-dark mt-2" id="post-<?= $post['id']; ?>">
                        <img src=" assets/img/profile.svg" alt=""> <a href="user.php?id=<?= $post['uid']; ?>"><?= $queryy['f_name'] . " " . $queryy['l_name']; ?></a>
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
                                            <input type="text" id="addANote" name="content-<?= $post['id']; ?>" class="form-control m-1" placeholder="Type comment..." style="width:90%" required />
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
                                                    <img src=" assets/img/profile.svg" alt=""> <a href="user.php?id=<?= $cmt['uid']; ?>"><?= $queryy['f_name'] . " " . $queryy['l_name']; ?></a>


                                                    <div class="d-flex justify-content-between">
                                                        <div class="d-flex flex-row align-items-center">
                                                            <!--img src="## src avatar ##" alt="avatar" width="25" height="25" /-->

                                                            <p><?= $cmt['content']; ?></p>
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
            <div class="col-md-3 p-1 d-lg-block d-none">
                <?php require_once 'sys/r-sidebar-pr.php'; ?>
            </div>
        </div>
    </div>
</div>