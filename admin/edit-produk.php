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
            $kd = $_GET['kode'];
      $sql = mysqli_query($koneksi, "SELECT * FROM produk WHERE kode='$kd'");
      if(mysqli_num_rows($sql) == 0){
        header("Location: produk.php");
      }else{
        $row = mysqli_fetch_assoc($sql);
      }

      ?>
                <div class="col-md-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <div class="panel-title"><i class="fa fa-user"></i>Edit Data Produk </div> 
                        </div>
                        <div class="panel-body">
                            <div class="form-panel">
                             <form class="form-horizontal style-form" action="update-produk.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2">Kode</label>
                                    <div class="col-sm-8">
                                        <input name="kode" type="text" id="kode" value="<?php echo $row['kode']; ?>" class="form-control" autocomplete="off" placeholder="Auto Number Tidak perlu di isi" readonly="readonly"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2">Nama Produk</label>
                                    <div class="col-sm-3">
                                  <input name="nama" type="text" id="nama" value="<?php echo $row['nama']; ?>" class="form-control" autocomplete="off" placeholder="Nama Produk" autocomplete="off" required />
                                    
                                  </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2">Jenis Produk</label>
                                    <div class="col-sm-3">
                                  <input name="jenis" type="text" id="jenis" value="<?php echo $row['jenis']; ?>" class="form-control" autocomplete="off" placeholder="Jenis Produk" autocomplete="off" required />
                                    
                                  </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2">Harga</label>
                                    <div class="col-sm-3">
                                  <input name="harga" type="text" id="harga" value="<?php echo $row['harga']; ?>" class="form-control" autocomplete="off" placeholder="Harga Produk" autocomplete="off" required />
                                    
                                  </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2">Keterangan</label>
                                    <div class="col-sm-3">
                                  <input name="keterangan" type="text" id="keterangan" value="<?php echo $row['keterangan']; ?>" class="form-control" autocomplete="off" placeholder="Keterangan" autocomplete="off" required />
                                    
                                  </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2">Stok</label>
                                    <div class="col-sm-3">
                                  <input name="stok" type="text" id="stok" value="<?php echo $row['stok']; ?>" class="form-control" autocomplete="off" placeholder="Stok" autocomplete="off" required />
                                    
                                  </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2">Foto Sebelumnya</label>
                                  
                                    <div class="col-sm-3">
                                  <img src="<?php echo $row['gambar']; ?>" class="img-rounded" width="150" height="200" style="border: 2px solid #666;" /> 
                                  </div>
                                </div>
                                <div class="form-group">
                                
                                    <label class="col-sm-2 col-sm-2">Foto Produk</label>
                                    <div class="col-sm-3">
                                  <input name="nama_file" type="file" id="nama_file" class="form-control" />
                                    
                                  </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2"></label>
                                    <div class="col-sm-10">
                                        <input type="submit" name="update" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
                                      <a href="customer.php" class="btn btn-sm btn-danger">Batal </a>
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

