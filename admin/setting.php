<?php require_once 'head.php'; ?>
<?php 
    if (isset($_POST['save'])) {
        $title = mpost('title');
        if ($title != "") {
            $db->exec("UPDATE `setting` SET `title` = '$title'");
        } else {
            echo '<script>alert("Missing data");</script>';
        }
    }
?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Setting web</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <form method="post">
          <div class="card-body">
                  <div class="form-group">
                    <label for="title">Title website</label>
                    <input type="text" name="title" class="form-control" id="title" placeholder="Title website" value=<?= setting('title'); ?>>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Allow signup</label>
                    <select class="custom-select" disabled="">
                          <option>Yes</option>
                        </select>
                  </div>
                </div>
          <!-- /.card-body -->
          <div class="card-footer">
                  <button type="submit" name="save" class="btn btn-primary">Submit</button>
                </div>
        </div>
        </form>
        <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php require_once 'end.php'; ?>