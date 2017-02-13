<?php include('header.php'); ?>
    <div id="page-wrapper">
        <div class="content-header">
            <div class="container">
                <h3>Rekening Bank <small>Administrator</small></h3>
            </div>
        </div>
        <div class="container-fluid">
            <?php 
            if(isset($_POST['input'])){
              $nama_bank  = $_POST['nama_bank'];
              $no_rek     = $_POST['no_rek'];
              $nasabah  = $_POST['nasabah'];
              
              $cek = mysqli_query($koneksi, "SELECT * FROM bank WHERE no_rek='$no_rek'");
              if(mysqli_num_rows($cek) == 0){
                  $insert = mysqli_query($koneksi, "INSERT INTO bank (nama_bank, no_rek, nasabah)
                                    VALUES('$nama_bank','$no_rek', '$nasabah')") or die(mysqli_error());
                  if($insert){
                    echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Berhasil Di Simpan.</div>';
                  }else{
                    echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data Gagal Di simpan !</div>';
                  }
              }else{
                echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>NIP Sudah Ada..!</div>';
              }
            }

             ?>
            <div class="row">
                <?php
                    $query = mysqli_query($koneksi, "SELECT * FROM user WHERE user_id='$_GET[kd]'");
                    $data  = mysqli_fetch_array($query);
                ?>
                <div class="col-md-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <div class="panel-title"><i class="fa fa-user"></i>Tambah Rekening Bank </div> 
                        </div>
                        <div class="panel-body">
                             <form class="form-horizontal style-form" action="tambah-rekening.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2">Id Bank</label>
                                    <div class="col-sm-8">
                                    <input name="id_bank" type="text" id="id_bank" class="form-control" autocomplete="off" placeholder="Auto Number Tidak perlu di isi" readonly="readonly"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2">Nama Bank</label>
                                    <div class="col-sm-8">
                                  <input name="nama_bank" type="text" id="nama_bank" class="form-control" autocomplete="off" placeholder="Nama Bank" autocomplete="off" required />
                                    
                                  </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2">No Rekening</label>
                                    <div class="col-sm-8">
                                  <input name="no_rek" type="text" id="no_rek" class="form-control" autocomplete="off" placeholder="No Rekening" autocomplete="off" required />
                                    
                                  </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2">Nasabah</label>
                                    <div class="col-sm-8">
                                  <input name="nasabah" type="text" id="nasabah" class="form-control" autocomplete="off" placeholder="Nasabah" autocomplete="off" required />
                                    
                                  </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2"></label>
                                    <div class="col-sm-10">
                                        <input type="submit" name="input" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
                                      <a href="bank.php" class="btn btn-sm btn-danger">Batal </a>
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

