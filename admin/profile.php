<?php require_once 'head.php'; ?>
<?php
    if (!isset($_GET['id'])) {
        header("Location: index.php");
        exit;
    } else {
        $idd = mget('id');
        $user = $db->query("SELECT * FROM `register` WHERE `id` = '$idd'")->fetch();
        if ($user == null) {
            header("Location: index.php");
            exit;
        } else {
            $posts = $db->query("SELECT * FROM `posts` WHERE `uid` = '$idd'");
        }
    }
    
    if (isset($_GET['del'])) {
        $iddel = mget('del');
        $db->exec("DELETE FROM `posts` WHERE `id` = '$iddel'");
        echo '<script>alert("Deleted post ' . $iddel . '"); window.location = "profile.php?id=' . $idd . '";</script>';
        $posts = $db->query("SELECT * FROM `posts` WHERE `uid` = '$idd'");
    }
    if (isset($_POST['save'])) {
        $f_name = mpost('fname');
        $l_name = mpost('lname');
        $mail = mpost('mail');
        $passnew = mpost('passnew');
        $usern = mpost('username');
        
        if ($f_name == "" || $l_name == "" || $mail == "") {
            echo '<script>alert("Missing data");</script>';
        } else {
            $db->exec("UPDATE `register` SET `f_name` = '$f_name', `l_name` = '$l_name', `mail` = '$mail' WHERE `id` = '$idd'");
            if ($passnew != 'nochange') {
                $db->exec("UPDATE `register` SET `password` = '" . hashp($passnew) . "' WHERE `id` = '$idd'");
            }
            if ($usern != "") {
                $hihi = $db->query("SELECT * FROM `register` WHERE `uid` = '$usern' AND `id` <> '$uid' LIMIT 1")->rowcount();
                if ($hihi != 0) {
                    echo '<script>alert("Username has been exist");</script>';
                } else {
                    $db->exec("UPDATE `register` SET `uid` = '$usern' WHERE `id` = '$idd'");
                }
            }
        }
        $user = $db->query("SELECT * FROM `register` WHERE `id` = '$idd'")->fetch();
    }
?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="../../dist/img/user4-128x128.jpg"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?= $user['f_name'] . " " . $user['l_name']; ?></h3>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Followers</b> <a class="float-right"><?= $user['follower']; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Following</b> <a class="float-right"><?= $user['following']; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Tweets</b> <a class="float-right"><?= $user['posts']; ?></a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                <p class="text-muted"><?= $user['location']; ?></p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Bio</strong>

                <p class="text-muted"><?= $user['bio']; ?></p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Website</strong>

                <p class="text-muted"><?= $user['website']; ?></p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Tweets</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <?php
                    foreach ($posts as $post) { ?>
                        <div class="post">
                          <div class="user-block">
                            <img class="img-circle img-bordered-sm" src="" alt="">
                            <span class="username">
                              <a href="#"><?= $user['f_name'] . " " . $user['l_name']; ?></a>
                              <a href="?id=<?= $idd; ?>&del=<?= $post['id']; ?>" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                            </span>
                          </div>
                          <!-- /.user-block -->
                          <p>
                            <?= $post['content']; ?>
                          </p>
                            <?php if ($post['img'] != '') { ?>
                                <img src="<?= $post['img']; ?>">
                            <?php } ?>
                        </div>
                    <?php } ?>
                    <!-- /.post -->
                  </div>

                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal" method="post">
                      <div class="form-group row">
                        <label for="fname" class="col-sm-2 col-form-label">First Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name" value="<?= $user['f_name']; ?>" autocomplete="off">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="lname" class="col-sm-2 col-form-label">Last Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name" value="<?= $user['l_name']; ?>" autocomplete="off">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="mail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="mail" name="mail" placeholder="Email" value="<?= $user['mail']; ?>" autocomplete="off">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="username" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?= $user['uid']; ?>" autocomplete="off">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="passnew" class="col-sm-2 col-form-label">Password (If want change)</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="passnew" name="passnew" placeholder="If want change this" autocomplete="off" value="nochange">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" name="save" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php require_once 'end.php';