<?php include('header.php'); ?>
    <div id="page-wrapper">
        <div class="content-header">
            <div class="container">
                <h3>Admin <small>Administrator</small></h3>
            </div>
        </div>
        <div class="container-fluid">

            <div class="row">
                <?php
                    $query = mysqli_query($koneksi, "SELECT * FROM user WHERE user_id='$_GET[kd]'");
                    $data  = mysqli_fetch_array($query);
                ?>
                <div class="col-md-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <div class="panel-title"><i class="fa fa-user"></i>Tambah Data Admin </div> 
                        </div>
                        <div class="panel-body">
                             <form class="form-horizontal style-form" action="insert-admin.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
                              <div class="form-group">
                                  <label class="col-sm-2 col-sm-2">User ID</label>
                                  <div class="col-sm-8">
                                      <input name="user_id" type="text" id="user_id" class="form-control" placeholder="Tidak perlu di isi" autofocus="on" readonly="readonly" />
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-2 col-sm-2">Username</label>
                                  <div class="col-sm-8">
                                      <input name="username" type="text" id="username" class="form-control" placeholder="Username" autocomplete="off" required />
                                      <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-2 col-sm-2">Password</label>
                                  <div class="col-sm-8">
                                      <input name="password" type="text" id="password" class="form-control" placeholder="password" autocomplete="off" required />
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-2 col-sm-2">Fullname</label>
                                  <div class="col-sm-8">
                                      <input name="fullname" class="form-control" id="fullname" type="text" placeholder="Fullname" autocomplete="off" required />
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-2 col-sm-2">Gambar</label>
                                  <div class="col-sm-8">
                                      <input name="nama_file" id="nama_file" type="file" />
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-2 col-sm-2"></label>
                                  <div class="col-sm-8">
                                      <input type="submit" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
                                      <a href="admin.php" class="btn btn-sm btn-danger">Batal </a>
                                  </div>
                              </div>
                          </form>
                        </div>
                    </div>
                </div>
            <!-- end row -->
            </div>
        
        <!-- /.container-fluid -->
        </div>
    </div><!-- /#wrapper -->

<?php include('footer.php'); ?>

