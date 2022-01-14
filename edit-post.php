<?php require_once 'sys/head.php'; ?>

<?php
if (!isset($_SESSION['user'])) {
    header("Location: /");
    exit;
}
if (!isset($_GET['id'])) {
    header("Location: /");
    exit;
}
$idp = mget('id');
$hello = $db->query("SELECT * FROM `posts` WHERE `id` = '$idp'")->fetch();
if ($hello['uid'] != $uid) {
    echo "Bug à";
    header("Location: /");
    exit;
}
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
            $db->exec("UPDATE `posts` SET `img` = '$url' WHERE `id` = '$idp'");
        }
        $content = mpost('content');
        $db->exec("UPDATE `posts` SET `content` = '$content' WHERE `id` = '$idp'");
        $notidone = "Edit Success";
        $notibonus = '.then(function() { window.location.href = "home.php"; })';
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
                    <h3>EDIT POST</h3>
                </div>
                <ul class="nav nav-tabs justify-content-center bg-light sticky-top  d-md-none">
                <a class="nav-link" href="home.php">
                            <img src="assets/img/return.svg" alt="">
                            Back
                        </a>
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="home.php">
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
                </ul>
                </nav>
                <form method="POST" name='sentTW' action="" enctype="multipart/form-data">
                    <div class="container pt-1">
                        <div class="form-floating">
                            <textarea name="content" class="form-control mb-1" placeholder="What's happenning?" id="floatingTextarea2" style="height: 100px"><?= $hello['content']; ?></textarea>
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
                            <div class="col align-self-end d-flex justify-content-end pb-1">
                                <button name="submit" type="submit" class="btn btn-primary rounded-pill" style="width:100px">
                                    Save
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
                <?php if ($hello['img'] != "") { ?>
                    <img src="<?= $hello['img']; ?>" style="max-width: 100%;">
                <?php } ?>
            </div>
            <div class="col-md-3 p-1 d-lg-block d-none">
            <?php require_once 'sys/right-sidebar.php'; ?>
        </div>
        </div>

    </div>

</div>

<?php require_once 'sys/end.php'; ?>