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
                   if(isset($_POST['input'])){
					$namafolder="gambar_customer/"; //tempat menyimpan file

					if (!empty($_FILES["nama_file"]["tmp_name"]))
					{
						$jenis_gambar=$_FILES['nama_file']['type'];
					        $nama     = $_POST['nama'];
							$alamat   = $_POST['alamat'];
							$no_telp  = $_POST['no_telp'];
					        $username = $_POST['username'];
					        $password = $_POST['password'];
					        
					        $cekno= mysqli_query($koneksi, "SELECT * FROM customer ORDER BY kd_cus DESC");
					        
					        
					        $data1=mysqli_num_rows($cekno);
					        $cekQ1=$data1;
					        //$data=mysqli_fetch_array($ceknomor);
					        //$cekQ=$data['f_kodepart'];
					        #menghilangkan huruf
					        //$awalQ=substr($cekQ,0-6);
					        #ketemu angka awal(angka sebelumnya) + dengan 1
					        $next1=$cekQ1+1;

					        #menhitung jumlah karakter
					        $kode1=strlen($next1);
					        
					        if(!$cekQ1)
					        { $no1='000001'; }
					        elseif($kode1==1)
					        { $no1='00000'; }
					        elseif($kode1==2)
					        { $n1o='0000'; }
					        elseif($kode1==3)
					        { $no1='000'; }
					        elseif($kode1==4)
					        { $no1='00'; }
					        elseif($kode1==5)
					        { $no1='0'; }
					        elseif($kode1=6)
					        { $no=''; }

					        // masukkan dalam tabel penjualan
					        $kode=$no1.$next1;
							
						if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/x-png")
						{			
							$gambar = $namafolder . basename($_FILES['nama_file']['name']);		
							if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $gambar)) {
								$sql="INSERT INTO customer(kd_cus,nama,alamat,no_telp,username,password,gambar) VALUES
					            ('$kode','$nama','$alamat','$no_telp','$username','$password','$gambar')";
								$res=mysqli_query($koneksi, $sql) or die (mysqli_error());
								//echo "Gambar berhasil dikirim ke direktori".$gambar;
					            echo "<script>alert('Data Customer berhasil dimasukan!'); window.location = 'customer.php'</script>";	   
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
                            <div class="panel-title"><i class="fa fa-user"></i>Tambah Data Customer </div> 
                        </div>
                        <div class="panel-body">
                             <form class="form-horizontal style-form" action="tambah-customer.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2">Kode</label>
                              <div class="col-sm-8">
                                  <input name="kd_cust" type="text" id="kd_cust" class="form-control" autocomplete="off" placeholder="Auto Number Tidak perlu di isi" readonly="readonly"/>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2">Nama</label>
                              <div class="col-sm-8">
                            <input name="nama" type="text" id="nama" class="form-control" autocomplete="off" placeholder="Nama Customer" autocomplete="off" required />
                              
                            </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2">Alamat</label>
                              <div class="col-sm-8">
                            <input name="alamat" type="text" id="alamat" class="form-control" autocomplete="off" placeholder="Alamat Customer" autocomplete="off" required />
                              
                            </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2">No Telepon</label>
                              <div class="col-sm-8">
                            <input name="no_telp" type="text" id="no_telp" class="form-control" autocomplete="off" placeholder="No Telepon" autocomplete="off" required />
                              
                            </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2">Username</label>
                              <div class="col-sm-8">
                            <input name="username" type="text" id="username" class="form-control" autocomplete="off" placeholder="Username" autocomplete="off" required />
                              
                            </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2">Password</label>
                              <div class="col-sm-8">
                            <input name="password" type="text" id="password" class="form-control" autocomplete="off" placeholder="Password" autocomplete="off" required />
                              
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
                                  <input type="submit" name="input" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
	                              <a href="customer.php" class="btn btn-sm btn-danger">Batal </a>
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

