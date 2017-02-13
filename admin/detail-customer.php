<?php include('header.php'); ?>
    <div id="page-wrapper">
        <div class="content-header">
            <div class="container">
                <h3>Customers <small>Administrator</small></h3>
            </div>
        </div>
        <div class="container-fluid">

            <div class="row">
              <?php
                    $query = mysqli_query($koneksi, "SELECT * FROM customer WHERE kd_cus='$_GET[kd]'");
                    $data  = mysqli_fetch_array($query);
              ?>
                <div class="col-md-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <div class="panel-title"><i class="fa fa-user"></i>Edit Data Customer </div> 
                        </div>
                        <div class="panel-body">
                            <div class="form-panel">
                              <table id="example" class="table table-hover table-bordered">
                                <tr>
                                <td>Kode</td>
                                <td><?php echo $data['kd_cus']; ?></td>
                                <td rowspan="9"><div class="pull-right image">
                                        <img src="<?php echo $data['gambar']; ?>" class="img-rounded" height="300" width="250" alt="User Image" style="border: 3px solid #333333;" />
                                    </div></td>
                                </tr>
                                <tr>
                                <td width="250">Nama</td>
                                <td width="550"><?php echo $data['nama']; ?></td>
                                </tr>
                                <tr>
                                <td>Alamat</td>
                                <td><?php echo $data['alamat']; ?></td>
                                </tr>
                                <tr>
                                <td>No Telepon</td>
                                <td><?php echo $data['no_telp']; ?></td>
                                </tr>
                                <tr>
                                <td>Username</td>
                                <td><?php echo $data['username']; ?></td>
                                </tr>
                                <tr>
                                <td>Password</td>
                                <td><?php echo $data['password']; ?></td>
                                </tr>
                             </table>
                            
                          <div class="text-right">
                          <a href="customer.php" class="btn btn-sm btn-warning"> Kembali <i class="fa fa-arrow-circle-right"></i></a>
                          </div>  
                             
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

