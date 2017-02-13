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
                   if(isset($_POST['input'])){
                    $namafolder="gambar_produk/"; //tempat menyimpan file

                    if (!empty($_FILES["nama_file"]["tmp_name"]))
                    {
                      $jenis_gambar=$_FILES['nama_file']['type'];
                            $kode       = $_POST['kode'];
                        $nama       = $_POST['nama'];
                        $jenis      = $_POST['jenis'];
                            $harga      = $_POST['harga'];
                            $keterangan = $_POST['keterangan'];
                            $stok       = $_POST['stok'];
                            
                        
                      if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/x-png")
                      {     
                        $gambar = $namafolder . basename($_FILES['nama_file']['name']);   
                        if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $gambar)) {
                          $sql="INSERT INTO produk(kode,nama,jenis,harga,keterangan,stok,gambar) VALUES
                                ('$kode','$nama','$jenis','$harga','$keterangan','$stok','$gambar')";
                          $res=mysqli_query($koneksi, $sql) or die (mysqli_error());
                          //echo "Gambar berhasil dikirim ke direktori".$gambar;
                                echo "<script>alert('Data Produk berhasil dimasukan!'); window.location = 'produk.php'</script>";    
                        } else {
                           echo "<p>Gambar gagal dikirim</p>";
                        }
                       } else {
                        echo "Jenis gambar yang anda kirim salah. Harus .jpg .gif .png";
                       }
                    } else {
                      echo "Anda belum memilih gambar";
                    }
                    }
                ?>
                <div class="col-md-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <div class="panel-title"><i class="fa fa-user"></i>Tambah Data Produk </div> 
                        </div>
                        <div class="panel-body">
                             <form class="form-horizontal style-form" action="tambah-produk.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
                              <div class="form-group">
                                  <label class="col-sm-2 col-sm-2">Kode Produk</label>
                                  <div class="col-sm-8">
                                      <input name="kode" type="text" id="kode" class="form-control" autocomplete="off" placeholder="Auto Number Tidak perlu di isi" readonly="readonly"/>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-2 col-sm-2">Nama Produk</label>
                                  <div class="col-sm-8">
                                <input name="nama" type="text" id="nama" class="form-control" autocomplete="off" placeholder="Nama Produk" autocomplete="off" required />
                                  
                                </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-2 col-sm-2">Jenis</label>
                                  <div class="col-sm-8">
                                <input name="jenis" type="text" id="jenis" class="form-control" autocomplete="off" placeholder="Jenis Produk" autocomplete="off" required /> 
                                </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-2 col-sm-2">Harga</label>
                                  <div class="col-sm-8">
                                <input name="harga" type="text" id="harga" class="form-control" autocomplete="off" placeholder="Harga Produk" autocomplete="off" required />
                                  
                                </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-2 col-sm-2">Keterangan</label>
                                  <div class="col-sm-8">
                                <input name="keterangan" type="text" id="keterangan" class="form-control" autocomplete="off" placeholder="Keterangan" autocomplete="off" required />
                                  
                                </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-2 col-sm-2">Stok</label>
                                  <div class="col-sm-8">
                                <input name="stok" type="text" id="stok" class="form-control" autocomplete="off" placeholder="Stock Produk" autocomplete="off" required />
                                  
                                </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-2 col-sm-2">Gambar Produk</label>
                                  <div class="col-sm-8">
                                <input name="nama_file" type="file" id="nama_file" class="form-control" required />
                                  
                                </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-2 col-sm-2"></label>
                                  <div class="col-sm-10">
                                      <input type="submit" name="input" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
                                    <a href="produk.php" class="btn btn-sm btn-danger">Batal </a>
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

