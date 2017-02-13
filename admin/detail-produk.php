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
                    $query = mysqli_query($koneksi, "SELECT * FROM produk WHERE kode='$_GET[kd]'");
                    $data  = mysqli_fetch_array($query);
             ?>
                <div class="col-md-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <div class="panel-title"><i class="fa fa-user"></i>Detail Data Produk </div> 
                        </div>
                        <div class="panel-body">
                            <div class="form-panel">
                              <table id="example" class="table table-hover table-bordered">
                                <tr>
                                <td>Kode</td>
                                <td><?php echo $data['kode']; ?></td>
                                <td rowspan="9"><div class="pull-right image">
                                        <img src="<?php echo $data['gambar']; ?>" class="img-rounded" height="300" width="250" alt="User Image" style="border: 3px solid #333333;" />
                                    </div></td>
                                </tr>
                                <tr>
                                <td width="250">Nama</td>
                                <td width="550"><?php echo $data['nama']; ?></td>
                                </tr>
                                <tr>
                                <td>Jenis</td>
                                <td><?php echo $data['jenis']; ?></td>
                                </tr>
                                <tr>
                                <td>Harga</td>
                                <td><?php echo number_format($data['harga'],2,",",".");?></td>
                                </tr>
                                <tr>
                                <td>Keterangan</td>
                                <td><?php echo $data['keterangan']; ?></td>
                                </tr>
                                <tr>
                                <td>Stok</td>
                                <td><?php echo $data['stok']; ?> Pcs</td>
                                </tr>
                             </table>
                            
                          <div class="text-right">
                          <a href="produk.php" class="btn btn-sm btn-warning"> Kembali <i class="fa fa-arrow-circle-right"></i></a>
                             
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

