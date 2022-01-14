<?php require_once 'sys/head.php'; ?>
<?php
if (!isset($_SESSION['user'])) {
    header("Location: /");
    exit;
}
?>
<?php
if (isset($_POST['submit'])) {
    if (mpost('content') != '') {
        $url = "";
        if ($_FILES['upimg']['tmp_name'] != "") {
            $client_id = "623143b86f63543";
            $handle = fopen($_FILES['upimg']['tmp_name'], "r");
            $data = fread($handle, filesize($_FILES['upimg']['tmp_name']));
            $pvars = array('image' => base64_encode($data));
            $timeout = 30;
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, 'https://api.imgur.com/3/image.json');
            curl_setopt($curl, CURLOPT_TIMEOUT, $timeout);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Client-ID ' . $client_id));
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $pvars);
            $out = curl_exec($curl);
            curl_close($curl);
            $pms = json_decode($out, true);
            $url = $pms['data']['link'];
            if ($url == '') {
                $path = $_FILES['upimg']['tmp_name'];
                $type = pathinfo($path, PATHINFO_EXTENSION);
                $data = file_get_contents($path);
                $url = 'data:image/' . $type . ';base64,' . base64_encode($data);
            }
        }
        $content = mpost('content');
        $db->exec("INSERT INTO `posts` (`uid`, `content`, `img`) VALUES ('$uid', '$content', '$url')");
        $db->exec("UPDATE `register` SET `posts` = `posts` + 1 WHERE `id` = '$uid'");
        $notidone = "Post Success";
    } else {
        $notifail = "Input data is not enough!!";
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
} else if (isset($_GET['del'])) {
    $idp = mget('del');
    $hello = $db->query("SELECT * FROM `posts` WHERE `id` = '$idp'")->fetch();
    if ($hello['uid'] != $uid) {
        echo "Bug à";
        header("Location: /");
        exit;
    } else {
        $db->exec("DELETE FROM `posts` WHERE `id` = '$idp'");
    }
}
?>
<div class="container-fluid p-0">
    <div class="col md-12">

        <div class="row">
            <div class="col-md-3 text-center d-md-block d-none">
                <?php require_once 'sys/left-sidebar.php'; ?>
            </div>

            <div class="col-lg-6 col-md-8 p-0 border boder-light">
                <div class="navbar-brand p-1 m-0 bg-light d-md-block d-none sticky-top ">
                    <h3>HOME</h3>
                </div>
                <ul class="nav nav-tabs justify-content-center bg-light sticky-top d-md-none">
                    <li class="nav-item">
                        <a class="nav-link bg-primary" aria-current="page" href="home.php">
                            <img src="assets/img/home.svg" alt="">
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="explore.php">
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

                <form method="POST" name='sentTW' action="" enctype="multipart/form-data">
                    <div class="container">
                        <div class="form-floating">
                            <textarea name="content" class="form-control m-1" placeholder="What's happenning?" id="floatingTextarea2" style="height: 100px"></textarea>
                        </div>
                        <div class="row">
                            <div class="col align-self-start">
                                <div class="btn-group bg-white" role="group" aria-label="Basic example">
                                    <div class="image-upload">
                                        <label for="file-input">
                                            <img src="assets/img/addimg.svg" />
                                        </label>
                                        <input id="file-input" name="upimg" type="file" style="display:none" />
                                    </div>

                                </div>
                            </div>
                            <div class="col align-self-end d-flex justify-content-end">
                                <button name="submit" type="submit" class="btn btn-primary rounded-pill" style="width:100px">
                                    Tweet
                                </button>
                            </div>

                        </div>
                </form>
                <!-- content -->
                <?php
                //my post
                $limit = rand(1, 4);
                $posts = $db->query("SELECT * FROM `posts` WHERE `uid` = '$uid' ORDER BY `id` DESC LIMIT 999");
                foreach ($posts as $post) {
                    $liked = $db->query("SELECT * FROM `user_like` WHERE `idpost` = '" . $post['id'] . "' AND `uid` = '$uid' LIMIT $limit")->rowcount();
                    if ($liked == 1) {
                        $liked = true;
                    } else {
                        $liked = false;
                    }
                    $queryy = $db->query("SELECT * FROM `register` WHERE `id` = '" . $post['uid'] . "'")->fetch(); ?>
                    <div class="container border border-dark mt-2" id="post-<?= $post['id']; ?>">
                        <div class="nav d-flex flex-row align-items-center">
                            <div class="info">
                                <img src="assets/img/avatar.jpg" alt="" class ="rounded-circle" style="width:40px">
                                <a href="user.php?id=<?= $post['uid']; ?>"><?= $queryy['f_name'] . " " . $queryy['l_name']; ?></a>
                            </div>

                            <div class="edit_post">
                                <div class="dropdown">
                                    <button class="btn btn-white border-0 "  style ="outline:none;box-shadow:none;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-ellipsis-h"></i>
                                    </button>

                                    <ul class="dropdown-menu">
                                        <li><a href="edit-post.php?id=<?= $post['id']; ?>">Edit Post</a></li>
                                        <li><a href="?del=<?= $post['id']; ?>">Delete Post</a></li>

                                    </ul>
                                </div>
                            </div>

                        </div>

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
                            <div class="col-md-12 p-0">
                                <div class="card shadow-0 border-0" style="background-color: #f0f2f5;">
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
                <?php }

                ?>

                <!-- content -->
                <?php
                //another
                $follows = $db->query("SELECT * FROM `follow` WHERE `uid` = '$uid' ORDER BY `id` DESC LIMIT 999");
                foreach ($follows as $follow) {
                    $limit = rand(1, 4);
                    $posts = $db->query("SELECT * FROM `posts` WHERE `uid` = '" . $follow['followid'] . "' ORDER BY `id` DESC LIMIT 999");
                    foreach ($posts as $post) {
                        $liked = $db->query("SELECT * FROM `user_like` WHERE `idpost` = '" . $post['id'] . "' AND `uid` = '$uid' LIMIT $limit")->rowcount();
                        if ($liked == 1) {
                            $liked = true;
                        } else {
                            $liked = false;
                        }
                        $queryy = $db->query("SELECT * FROM `register` WHERE `id` = '" . $post['uid'] . "'")->fetch(); ?>
                        <div class="container border border-dark mt-2" id="post-<?= $post['id']; ?>">
                            <img src=" assets/img/profile.svg" alt=""> <a href="user.php?id=<?= $post['uid']; ?>"><?= $queryy['f_name'] . " " . $queryy['l_name']; ?></a>
                            <a href="messages.php?id=<?= $post['uid']; ?>"><i class="far fa-envelope"></i> </a>
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
                                <div class="col-md-12 p-0">
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
                }

                ?>

                <!-- content -->
            </div>
        </div>

        <div class="col-md-3 p-1 d-lg-block d-none">
            <?php require_once 'sys/right-sidebar.php'; ?>
        </div>
    </div>

</div>

</div>

<?php require_once 'sys/end.php'; ?>