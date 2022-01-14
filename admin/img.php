<?php require_once 'head.php'; ?>
<?php
    if (isset($_GET['del'])) {
        $iddel = mget('del');
        $db->exec("DELETE FROM `posts` WHERE `id` = '$iddel'");
        echo '<script>alert("Deleted post ' . $iddel . '"); window.location = "posts.php";</script>';
    }
?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Images</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Images</li>
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
          <h3 class="card-title">Images</h3>

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
                      <th style="width: 35%">
                          Images
                      </th>
                      <th style="width: 15%">
                          Likes
                      </th>
                      <th style="width: 15%">
                          Comments
                      </th>
                      <th style="width: 20%">
                      </th>
                  </tr>
              </thead>
              <tbody>
                  <?php 
                  $posts = $db->query("SELECT * FROM `posts` WHERE `img` <> '' ORDER BY `id` DESC");
                  foreach ($posts as $post) { 
                    $user = $db->query("SELECT * FROM `register` WHERE `id` = '" . $post['uid'] . "'")->fetch();
                  ?>
                      <tr>
                          <td>
                                <?= $post['id']; ?>
                          </td>
                          <td>
                                <?= $user['f_name'] . " " . $user['l_name']; ?>
                          </td>
                          <td>
                                <img src="<?= $post['img']; ?>" style ="max-width:100%">
                          </td>
                          <td>
                                <?= $post['num_like']; ?>
                          </td>
                          <td>
                              <?= $post['num_cmt']; ?>
                          </td>
                          <td class="project-actions text-right">
                              <a class="btn btn-danger btn-sm" href="?del=<?= $post['id']; ?>">
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