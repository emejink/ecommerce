<?php include('header.php'); ?>
    <div id="page-wrapper">
        <div class="content-header">
            <div class="container">
                <h3>Produk <small>Administrator</small></h3>
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
                            <div class="panel-title"><i class="fa fa-user"></i>Detail Data Admin </div> 
                        </div>
                        <div class="panel-body">
                            <div class="form-panel">
                              <table id="example" class="table table-hover table-bordered">
                                  <tr>
                                  <td>Username</td>
                                  <td><?php echo $data['username']; ?></td>
                                  <td rowspan="5"><div class="pull-right image">
                                        <img src="<?php echo $data['gambar']; ?>" class="img-rounded" height="300" width="250" alt="User Image" style="border: 2px solid #666;" />
                                    </div></td>
                                  </tr>
                                  <tr>
                                  <td width="250">Password</td>
                                  <td width="565" colspan="1"><?php echo $data['password']; ?></td>
                                  </tr>
                                  <tr>
                                  <td>Fullname</td>
                                  <td colspan="1"><?php echo $data['fullname']; ?></td>
                                  </tr>
                              </table>
                              <div class="text-right">

                             <a href="admin.php" class="btn btn-sm btn-warning">Kembali <i class="fa fa-arrow-circle-right"></i></a>
                             
                          </div>
                        </div>
                    </div>
                </div>
            <!-- end row -->
            </div>
        
        <!-- /.container-fluid -->
        </div>
    </div><!-- /#wrapper -->

<?php include('footer.php'); ?>

