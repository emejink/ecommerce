<?php include('header.php'); ?>
    <div id="page-wrapper">
        <div class="content-header">
            <div class="container">
                <h3>Customer <small>Administrator</small></h3>
            </div>
        </div>
        <div class="container-fluid">

            <div class="row">
                <?php
                $kd = $_GET['kd_cus'];
                $sql = mysqli_query($koneksi, "SELECT * FROM customer WHERE kd_cus='$kd'");
                if(mysqli_num_rows($sql) == 0){
                  header("Location: customer.php");
                }else{
                  $row = mysqli_fetch_assoc($sql);
                }

                ?>
                <div class="col-md-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <div class="panel-title"><i class="fa fa-user"></i>Edit Data Customer </div> 
                        </div>
                        <div class="panel-body">
                            <div class="form-panel">
                            <form class="form-horizontal style-form" action="update-customer.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
                              <div class="form-group">
                                  <label class="col-sm-2 col-sm-2">Kode</label>
                                  <div class="col-sm-8">
                                      <input name="kd_cust" type="text" id="kd_cust" value="<?php echo $row['kd_cus']; ?>" class="form-control" autocomplete="off" placeholder="Auto Number Tidak perlu di isi"/>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-2 col-sm-2">Nama</label>
                                  <div class="col-sm-8">
                                <input name="nama" type="text" id="nama" value="<?php echo $row['nama']; ?>" class="form-control" autocomplete="off" placeholder="Nama Customer" autocomplete="off" required />
                                  
                                </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-2 col-sm-2">Alamat</label>
                                  <div class="col-sm-8">
                                <input name="alamat" type="text" id="alamat" value="<?php echo $row['alamat']; ?>" class="form-control" autocomplete="off" placeholder="Alamat Customer" autocomplete="off" required />
                                  
                                </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-2 col-sm-2">No Telepon</label>
                                  <div class="col-sm-8">
                                <input name="no_telp" type="text" id="no_telp" value="<?php echo $row['no_telp']; ?>" class="form-control" autocomplete="off" placeholder="No Telepon" autocomplete="off" required />
                                  
                                </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-2 col-sm-2">Username</label>
                                  <div class="col-sm-8">
                                <input name="username" type="text" id="username" value="<?php echo $row['username']; ?>" class="form-control" autocomplete="off" placeholder="Username" autocomplete="off" required />
                                  
                                </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-2 col-sm-2">Password</label>
                                  <div class="col-sm-8">
                                <input name="password" type="text" id="password" value="<?php echo $row['password']; ?>" class="form-control" autocomplete="off" placeholder="Password" autocomplete="off" required />
                                  
                                </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-2 col-sm-2">Foto Sebelumnya</label>
                                
                                  <div class="col-sm-8">
                                <img src="<?php echo $row['gambar']; ?>" class="img-rounded" width="150" height="200" style="border: 2px solid #666;" /> 
                                </div>
                              </div>
                              <div class="form-group">
                              
                                  <label class="col-sm-2 col-sm-2">Foto</label>
                                  <div class="col-sm-8">
                                <input name="nama_file" type="file" id="nama_file" class="form-control" required />
                                  
                                </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-2 col-sm-2"></label>
                                  <div class="col-sm-10">
                                      <input type="submit" name="update" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
                                    <a href="index.php" class="btn btn-sm btn-danger">Batal </a>
                                  </div>
                              </div>
                          </form>
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

