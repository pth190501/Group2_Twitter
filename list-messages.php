<?php require_once 'sys/head.php'; ?>
<?php
$user_chat = $db->query("SELECT DISTINCT `to_u`, `from_u` FROM `messages` WHERE (`from_u` = '$uid' OR `to_u` = '$uid') ORDER BY `id` DESC LIMIT 20");
?>
<div class="container-fluid p-0">

    <div class="col md-12">

    <div class="row">
            <div class="col-md-3 text-center d-md-block d-none">
                <?php require_once 'sys/left-sidebar.php'; ?>
            </div>

            <div class="col-lg-6 col-md-8 p-0 border boder-light">
                <div class="navbar-brand p-1 m-0 bg-light d-md-block d-none sticky-top ">
                    <h3>MESSAGES</h3>
                </div>
                <ul class="nav nav-tabs justify-content-center bg-light sticky-top d-md-none">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="home.php">
                            <img src="assets/img/home.svg" alt="">
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="explore.php">
                            <img src="assets/img/tag.svg" alt="">
                        </a>
                    </li>
                    <li class="nav-item bg-primary">
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
                <div id="plist" class="people-list">
                    <ul class="list-unstyled chat-list mt-2 mb-0">
                        <?php foreach ($user_chat as $hihi) {
                            
                            if ($hihi['from_u'] != $uid) {
                                $udata = $db->query("SELECT * FROM `register` WHERE `id` = '" . $hihi['from_u'] . "'")->fetch();
                                
                            } else {
                                $udata = $db->query("SELECT * FROM `register` WHERE `id` = '" . $hihi['to_u'] . "'")->fetch();
                            }
                            
                        ?>
                            <li class="clearfix d-flex flex-row bg-light mb-1">
                                <div class="avatar text-center col-md-4">
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRE42iGEKR4W3on8ukuIllzImlzLYc1hQPO8MgN2wgoRHYkPz4nsyvWQuZB0pa8Vn4_PT0&amp;usqp=CAU" alt="avatar" class="rounded-circle" style="max-width:50%">
                                </div>
                                <div class="about col-md-8">
                                    <div class="name"><a href="messages.php?id=<?= $udata['id']; ?>"><?= $udata['f_name'] . " " . $udata['l_name']; ?></a></div>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

