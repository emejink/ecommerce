<?php error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));include('header.php'); ?>
    <div id="page-wrapper">
        <div class="content-header">
            <div class="container">
                <h3>Konfirmasi <small>Administrator</small></h3>
            </div>
        </div>
        <div class="container-fluid">
          <?php
            $kd = $_GET['kode'];
            $sql = mysqli_query($koneksi, "SELECT * FROM konfirmasi WHERE id_kon='$kd'");
            if(mysqli_num_rows($sql) == 0){
              header("Location: konfirmasi.php");
            }else{
              $row = mysqli_fetch_assoc($sql);
            }
            if(isset($_POST['update'])){
              $id_kon         = $_POST['id_kon'];
              $nopo         = $_POST['nopo'];
              $kd_cus         = $_POST['kd_cus'];
              $bayar_via      = $_POST['bayar_via'];
              $tanggal        = $_POST['tanggal'];
                      $jumlah         = $_POST['jumlah'];
                      //$bukti_transfer = $_POST['bukti_transfer'];
                      $status         = $_POST['status'];
              
              $update = mysqli_query($koneksi, "UPDATE konfirmasi SET status='$status' WHERE id_kon='$id_kon'") or die(mysqli_error());
              if($update){
                echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil disimpan.</div>';
              }else{
                echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data gagal disimpan, silahkan coba lagi.</div>';
              }
            }
            

            ?>
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
                            <div class="panel-title"><i class="fa fa-user"></i>Edit Konfirmasi </div> 
                        </div>
                        <div class="panel-body">
                            <div class="form-panel">
                            <form class="form-horizontal style-form" action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
                              <div class="form-group">
                                  <label class="col-sm-2 col-sm-2 control-label">ID Konfirmasi</label>
                                  <div class="col-sm-8">
                                      <input name="id_kon" type="text" id="id_kon" value="<?php echo $row['id_kon']; ?>" class="form-control" autocomplete="off" readonly="readonly"/>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-2 col-sm-2 control-label">No PO</label>
                                  <div class="col-sm-3">
                                <input name="nopo" type="text" id="nopo" value="<?php echo $row['nopo']; ?>" class="form-control" autocomplete="off" readonly="readonly"/>
                                  
                                </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-2 col-sm-2 control-label">Kode Customer</label>
                                  <div class="col-sm-3">
                                <input name="kd_cus" type="text" id="kd_cus" value="<?php echo $row['kd_cus']; ?>" class="form-control" autocomplete="off" readonly="readonly" />
                                  
                                </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-2 col-sm-2 control-label">Metode Pembayaran</label>
                                  <div class="col-sm-3">
                                <input name="bayar_via" type="text" id="bayar_via" value="<?php echo $row['bayar_via']; ?>" class="form-control" autocomplete="off" readonly="readonly" />
                                  
                                </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-2 col-sm-2 control-label">Tanggal Pembayaran</label>
                                  <div class="col-sm-3">
                                <input name="tanggal" type="text" id="tanggal" value="<?php echo $row['tanggal']; ?>" class="form-control" autocomplete="off" readonly="readonly"/>
                                  
                                </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-2 col-sm-2 control-label">Jumlah</label>
                                  <div class="col-sm-3">
                                <input name="jumlah" type="text" id="jumlah" value="<?php echo $row['jumlah']; ?>" class="form-control" autocomplete="off" readonly="readonly"/>
                                  
                                </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-2 col-sm-2 control-label">Bukti Transfer</label>
                                
                                  <div class="col-sm-3">
                                <img src="<?php echo $row['bukti_transfer']; ?>" class="img-rounded" width="150" height="200" style="border: 2px solid #666;" /> 
                                </div>
                              </div>
                              <div class="form-group">
                              
                                  <label class="col-sm-2 col-sm-2 control-label">Status</label>
                                  <div class="col-sm-3">
                                <select id="status" name="status" class="form-control" autofocus="on" required>
                                <option> -- Pilih Status -- </option>
                                <option value="Bayar">Sudah di Bayar</option>
                                <option value="Belum">Belum di Bayar</option>
                                </select>
                                  
                                </div>
                                <label class="col-sm-2 col-sm-2 control-label">Status Sebelumnya : </label>
                                <div class="col-sm-3">
                                <?php
                                if($row['status'] == 'Bayar'){
                    echo '<span class="label label-success">Sudah di Bayar</span>';
                  }
                                else if ($row['status'] == 'Belum' ){
                    echo '<span class="label label-danger">Belum di Bayar</span>';
                  }
                        ?>
                                
                                </span>
                                </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-2 col-sm-2 control-label"></label>
                                  <div class="col-sm-10">
                                      <input type="submit" name="update" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
                                    <a href="konfirmasi.php" class="btn btn-sm btn-danger">Batal </a>
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

