<?php require_once 'sys/head.php'; ?>

<?php
if (!isset($_SESSION['user'])) {
    header("Location: /");
    exit;
}
?>
<?php
$u = mget('id');

$another = $db->query("SELECT * FROM `register` WHERE `id` = '$u'")->fetch();
if ($another == null) {
    header("Location: /");
    exit;
}
if (isset($_POST['btn-chat'])) {
    $inp = mpost('input');
    if ($inp != "") {
        $now = time();
        $db->exec("INSERT INTO `messages` (`id`, `from_u`, `to_u`, `time`, `content`) VALUES (NULL, '$uid', '$u', '$now', '$inp');");
    }
}
$abc = $db->query("SELECT * FROM `messages` WHERE ((`to_u` = '$u' AND `from_u` = '$uid') OR (`to_u` = '$uid' AND `from_u` = '$u'))")->rowcount();
$lm = abs($abc - 9);
if ($abc < 9) {
    $data = $db->query("SELECT * FROM `messages` WHERE ((`to_u` = '$u' AND `from_u` = '$uid') OR (`to_u` = '$uid' AND `from_u` = '$u')) ORDER BY `id`");
} else {
    $data = $db->query("SELECT * FROM `messages` WHERE ((`to_u` = '$u' AND `from_u` = '$uid') OR (`to_u` = '$uid' AND `from_u` = '$u')) ORDER BY `id` LIMIT $lm, $abc");
}
?>
<div class="container-fluid p-0">

    <div class="col md-12">

        <div class="row">
            <div class="col-md-3 text-center d-md-block d-none">
                <?php require_once 'sys/left-sidebar.php'; ?>
            </div>
            <div class="col-md-8 border border-light" style="height: 100vh;">
                <nav class="d-flex sticky-top bg-light">
                    <a href="list-messages.php">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                    <img src="assets/img/avatar.jpg" class="mx-2 rounded-circle user_img_msg" style="height: 35px; width: 35px;">
                    <div>
                        <h5 class="ml-2">
                            <a href="user.php?id=<?= $another['id']; ?>"><?= $another['f_name'] . " " . $another['l_name']; ?></a>
                        </h5>
                        <?php if ($another['uid'] !== null) { ?>
                            <h6 class="ml-2 text-secondary" style="margin-top: -10px;"> @<?= $userdata['uid']; ?> </h6>
                        <?php } ?>
                    </div>
                </nav>

                <div class="chat-box mt-2 overflow-scroll" style="height: 85%;">
                    <style>
                        .chat-box {
                            overflow-y: scroll;
                        }

                        .msg_cotainer {
                            margin-top: auto;
                            margin-bottom: auto;
                            margin-left: 10px;
                            border-radius: 25px;
                            background-color: #e9ecef;
                            padding: 10px;
                            position: relative;
                        }

                        .msg_cotainer_send {
                            margin-top: auto;
                            margin-bottom: auto;
                            margin-right: 10px;
                            border-radius: 25px;
                            background-color: #e9ecef;
                            padding: 10px;
                            position: relative;
                        }

                        .msg_time {
                            position: absolute;
                            left: 0;
                            bottom: -27px;
                            color: #212529;
                            font-size: 10px;
                        }

                        .msg_time_send {
                            position: absolute;
                            right: 0;
                            bottom: -27px;
                            color: #212529;
                            font-size: 10px;
                        }
                    </style>
                    <div class="if-user text-center border mb-3">
                        <a href="#" class="link-secondary">
                            <div class="mx-auto">

                                <a type="button" class="btn text-secondary"><?= number_format($another['following']); ?> Following</a>
                                <a type="button" class="btn text-secondary"><?= number_format($another['follower']); ?> Followers</a>

                                <h6 class="text-secondary"><i class="far fa-calendar-alt"></i> Joined <?= date("d/m/Y", $another['datejoin']); ?></h6>
                            </div>
                        </a>
                    </div>

                    <?php foreach ($data as $message) {
                        if ($message['from_u'] != $uid) { ?>
                            <!-- another -->
                            <div class="d-flex justify-content-start mb-4">
                                <div class="s-avt">
                                    <img src="assets/img/avatar.jpg" class="mx-2 rounded-circle user_img_msg" style="height: 35px; width: 35px;">
                                </div>
                                <div class="msg_cotainer">
                                    <?= $message['content']; ?>
                                    <span class="msg_time"><?= date("H:i:s d/m/Y", $message['time']); ?></span>
                                </div>
                            </div>
                            <!--end -->
                        <?php } else { ?>
                            <div class="d-flex justify-content-end mb-4">
                                <div class="msg_cotainer_send">
                                    <?= $message['content']; ?>
                                    <span class="msg_time_send"><?= date("H:i:s d/m/Y", $message['time']); ?></span>
                                </div>
                                <div class="img_cont_msg">
                                    <img src="assets/img/avatar.jpg" class="mx-2 rounded-circle user_img_msg" style="height: 35px; width: 35px;">
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
                
                <div class="panel-footer">
                    <form method="POST">
                        <div class="d-flex" style="width: 100%;">
                            <input type="text" class="form-control rounded-pill border border-dark m-1 " placeholder="  Enter text here..." name="input" style="width: 90%;">
                            <span class="input-group-btn justify-content-end text-center m-1" style="width: 10%;">
                                <button class="btn btn-light btn-sm mt-1" name="btn-chat" style="width: 100%;">
                                    <i class="far fa-paper-plane"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                </div>
                
            </div>

        </div>
    </div>
</div>