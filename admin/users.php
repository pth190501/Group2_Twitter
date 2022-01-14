<?php require_once 'head.php'; ?>
<?php
    if (isset($_GET['del'])) {
        $iddel = mget('del');
        $db->exec("DELETE FROM `register` WHERE `id` = '$iddel'");
        $db->exec("DELETE FROM `posts` WHERE `uid` = '$iddel'");
        echo '<script>alert("Deleted user ' . $iddel . '"); window.location = "users.php";</script>';
    }
?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Users</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Users</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Users</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          #
                      </th>
                      <th style="width: 20%">
                          Name
                      </th>
                      <th style="width: 15%">
                          Tweets
                      </th>
                      <th style="width: 15%">
                          Follower
                      </th>
                      <th style="width: 20%">
                          Joined
                      </th>
                      <th style="width: 10%" class="text-center">
                          Status
                      </th>
                      <th style="width: 20%">
                      </th>
                  </tr>
              </thead>
              <tbody>
                  <?php 
                  $users = $db->query("SELECT * FROM `register` ORDER BY `id` DESC");
                  foreach ($users as $user) { ?>
                      <tr>
                          <td>
                              <?= $user['id']; ?>
                          </td>
                          <td>
                                <?= $user['f_name'] . " " . $user['l_name']; ?>
                          </td>
                          <td>
                                <?= $user['posts']; ?>
                          </td>
                          <td>
                                <?= $user['follower']; ?>
                          </td>
                          <td>
                                <?= date("d/m/Y", $user['datejoin']); ?>
                          </td>
                          <td class="project-state">
                              <span class="badge badge-success">Active</span>
                          </td>
                          <td class="project-actions text-right">
                              <a class="btn btn-primary btn-sm" href="profile.php?id=<?= $user['id']; ?>">
                                  <i class="fas fa-folder">
                                  </i>
                                  View
                              </a>
                              <a class="btn btn-danger btn-sm" href="?del=<?= $user['id']; ?>">
                                  <i class="fas fa-trash">
                                  </i>
                                  Delete
                              </a>
                          </td>
                      </tr>
                <?php } ?>
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php require_once 'end.php'; ?>