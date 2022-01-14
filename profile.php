<?php require_once 'sys/head.php'; ?>
<?php
if (isset($_POST['send'])) {
    $f_name = mpost('f_name');
    $l_name = mpost('l_name');
    $bio = mpost('bio');
    $location = mpost('location');
    $website = mpost('website');
    $usern = mpost('usern');
    $hihi = $db->query("SELECT * FROM `register` WHERE `uid` = '$usern' LIMIT 1")->rowcount();
    if ($hihi != 0 && $usern != "") {
        $notifail = "Username already exists in the system";
    } else {
        if ($f_name == "" || $l_name == "") {
            $notifail = "Input data is not enough!!";
        } else {
            $db->exec("UPDATE `register` SET `uid` = '$usern', `f_name` = '$f_name', `l_name` = '$l_name', `bio` = '$bio', `location` = '$location', `website` = '$website' WHERE `id` = '$uid'");
            $notidone = "Change Infomation Success";
            $notibonus = '.then(function() { window.location.href = "profile.php"; })';
        }
    }
}
?>
<div class="container-fluid p-0">
    <div class="col md-12">
        <div class="row">
            <div class="col-md-3 text-center d-md-block d-none">
                <?php require_once 'sys/left-sidebar.php'; ?>
            </div>

            <div class="col-lg-6 col-md-8 p-1 border boder-light">
                <div class="navbar-brand p-1 m-0 bg-light d-md-block d-none sticky-top ">
                    <h3>PROFILE</h3>
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
                    <li class="nav-item">
                        <a class="nav-link" href="list-messages.php">
                            <img src="assets/img/message.svg" alt="">
                        </a>
                    </li>
                    <li class="nav-item bg-primary">
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

                <div>
                    <h4>
                        <span><?= $userdata['f_name'] . " " . $userdata['l_name']; ?></span>
                    </h4>
                    <div style="margin-top: -13px">
                        <h6 class="text-secondary"><?= number_format($userdata['posts']); ?> Tweet<?php if ((int) $userdata['posts'] > 1) echo 's'; ?></h6>
                    </div>

                    <div class="image">
                        <img src="assets/img/cover-img.jpg" class="img-fluid" alt="Cover image" style="max-height:17em;width:100%;">

                        <img src="assets/img/avatar.jpg" class="img-fluid rounded-circle mt-n5" alt="Avatar" style="width: 30%;max-height:10em">
                        <div>
                            <div class="m-1 d-flex justify-content-between">
                                <section>
                                    <h4><strong> <?= $userdata['f_name'] . " " . $userdata['l_name']; ?> </strong></h4>
                                    <h6>@<?= $userdata['uid']; ?> </h6>
                                    <h6><i class="far fa-calendar-alt"></i> Joined <?= date("d/m/Y", $userdata['datejoin']); ?></h6>
                                </section>

                                <button type="button" class="btn btn-light border-info rounded-pill" style="height:100%" data-toggle="modal" data-target="#myModal">
                                    <strong>Edit Profile</strong>
                                </button>

                            </div>
                            <!-- Modal -->
                            <div class="modal" id="myModal">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">

                                            <h4 class="modal-title"><strong> Edit Profile </strong></h4>
                                            <button type="button" class="close" data-dismiss="modal">×</button>
                                        </div>

                                        <!-- Modal body -->
                                        <form method="POST">
                                            <div class="modal-body">
                                                <div class="">
                                                    <img src="assets/img/cover-img.jpg" class="img-fluid" alt="Cover image" style="height: 250px; width:100%;">
                                                </div>
                                                <div class="p-5" style="height: 200px;">
                                                    <img src="assets/img/avatar.jpg" class="img-fluid rounded-circle" alt="Avatar" style="width: 168px; margin-top: -140px;">
                                                </div>
                                                <div style="margin-top:-100px">
                                                    <div class="form-floating">
                                                        <textarea name="usern" class="form-control mb-3" placeholder="User Name" style="height: 50px"><?= $userdata['uid']; ?></textarea>
                                                    </div>
                                                    <div class="form-floating">
                                                        <textarea name="f_name" class="form-control mb-3" placeholder="First Name" style="height: 50px"><?= $userdata['f_name']; ?></textarea>
                                                    </div>
                                                    <div class="form-floating">
                                                        <textarea name="l_name" class="form-control mb-3" placeholder="Last Name" style="height: 50px"><?= $userdata['l_name']; ?></textarea>
                                                    </div>
                                                    <div class="form-floating">
                                                        <textarea name="bio" class="form-control mb-3" placeholder="Bio" style="height: 100px"><?= $userdata['bio']; ?></textarea>
                                                    </div>
                                                    <div class="form-floating">
                                                        <textarea name="location" class="form-control mb-3" placeholder="Location" style="height: 50px"><?= $userdata['location']; ?></textarea>
                                                    </div>
                                                    <div class="form-floating">
                                                        <textarea name="website" class="form-control mt-3" placeholder="Website" style="height: 50px"><?= $userdata['website']; ?></textarea>
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button type="submit" name="send" class="btn btn-primary">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <section>
                        <?php require_once 'sys/r-sidebar-ex.php'; ?>
                    </section>

                </div>
            </div>
            <div class="col-md-3 p-1 d-lg-block d-none">
                <?php require_once 'sys/r-sidebar-pr.php'; ?>
            </div>
        </div>
    </div>
</div>