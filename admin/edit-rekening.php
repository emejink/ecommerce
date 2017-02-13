<?php include('header.php'); ?>
    <div id="page-wrapper">
        <div class="content-header">
            <div class="container">
                <h3>Rekening Bank <small>Administrator</small></h3>
            </div>
        </div>
        <div class="container-fluid">
           <?php
            $kd = $_GET['kode'];
            $sql = mysqli_query($koneksi, "SELECT * FROM bank WHERE id_bank='$kd'");
            if(mysqli_num_rows($sql) == 0){
              header("Location: bank.php");
            }else{
              $row = mysqli_fetch_assoc($sql);
            }
            if(isset($_POST['update'])){
              $id_bank   = $_POST['id_bank'];
              $nama_bank   = $_POST['nama_bank'];
              $no_rek      = $_POST['no_rek'];
              $nasabah   = $_POST['nasabah'];
              
              $update = mysqli_query($koneksi, "UPDATE bank SET nama_bank='$nama_bank', no_rek='$no_rek', nasabah='$nasabah' WHERE id_bank='$id_bank'") or die(mysqli_error());
              if($update){
                echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil disimpan.</div>';
              }else{
                echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data gagal disimpan, silahkan coba lagi.</div>';
              }
            }

            ?>
            <div class="row">
                
                <div class="col-md-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <div class="panel-title"><i class="fa fa-user"></i>Edit Data Rekening Bank </div> 
                        </div>
                        <div class="panel-body">
                            <div class="form-panel">
                            <form class="form-horizontal style-form" action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2">Id Bank</label>
                                    <div class="col-sm-8">
                                        <input name="id_bank" type="text" id="id_bank" value="<?php echo $row['id_bank']; ?>" class="form-control" autocomplete="off" readonly="readonly">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2">Nama Bank</label>
                                    <div class="col-sm-8">
                                  <input name="nama_bank" type="text" id="nama_bank" value="<?php echo $row['nama_bank']; ?>" class="form-control" required />
                                    
                                  </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2">No Rekening</label>
                                    <div class="col-sm-8">
                                  <input name="no_rek" type="text" id="no_rek" value="<?php echo $row['no_rek']; ?>" class="form-control" required />
                                    
                                  </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2">Nasabah</label>
                                    <div class="col-sm-8">
                                  <input name="nasabah" type="text" id="nasabah" value="<?php echo $row['nasabah']; ?>" class="form-control" required />
                                    
                                  </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2"></label>
                                    <div class="col-sm-10">
                                        <input type="submit" name="update" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
                                      <a href="rekening.php" class="btn btn-sm btn-danger">Batal </a>
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

