<?php include('header.php'); ?>
    <div id="page-wrapper">
        <div class="content-header">
            <div class="container">
                <h3>Produk <small>Administrator</small></h3>
                
            </div>
        </div>

        <div class="container-fluid">
            <?php
                     if(isset($_GET['hal']) == 'hapus'){
                        $kode = $_GET['kd'];
                        $cek = mysqli_query($koneksi, "SELECT * FROM produk WHERE kode='$kode'");
                        if(mysqli_num_rows($cek) == 0){
                            echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data tidak ditemukan.</div>';
                        }else{
                            $delete = mysqli_query($koneksi, "DELETE FROM produk WHERE kode='$kode'");
                            if($delete){
                                echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data berhasil dihapus.</div></div>';
                            }else{  
                                echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data gagal dihapus.</div>';
                            }
                        }
                    }
                ?>
            <div class="row">
                
                <div class="col-md-12">
                        <p><b>Data Produk</b></p>
                         <?php
                            $query1="select * from produk";
                            
                            if(isset($_POST['qcari'])){
                           $qcari=$_POST['qcari'];
                           $query1="SELECT * FROM  produk 
                           where nama like '%$qcari%'
                           or jenis like '%$qcari%'  ";
                            }
                            $tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());
                            ?>
                            <table class="table table-hover table-bordered">
                                <tr>
                                    <th>No</th>
                                    <th>Produk</th>
                                    <th>Jenis</th>
                                    <th>Harga</th>
                                    <th>Keterangan</th>
                                    <th>Stok</th>
                                    <th>Tools</th>

                                </tr>
                                <?php 
                     $no=0;
                     while($data=mysqli_fetch_array($tampil))
                    { $no++; ?>
                    <tbody>
                    <tr>
                    <td><?php echo $no; ?></td>
                    <td><a href="detail-produk.php?hal=edit&kd=<?php echo $data['kode'];?>"><span class="glyphicon glyphicon-tag"></span> <?php echo $data['nama'];?></td>
                    <td><?php echo $data['jenis'];?></td>
                    <td>Rp. <?php echo number_format($data['harga'],2,",",".");?></td>
                    <td><?php echo $data['keterangan']; ?></td>
                    <td><?php echo $data['stok']; ?></td>
                    <td><div id="thanks"><a class="btn btn-sm btn-primary" data-placement="bottom" data-toggle="tooltip" title="Edit Produk" href="edit-produk.php?hal=edit&kode=<?php echo $data['kode'];?>"><span class="glyphicon glyphicon-edit"></span></a>  
                    <a onclick="return confirm ('Yakin hapus <?php echo $data['nama'];?>.?');" class="btn btn-sm btn-danger tooltips" data-placement="bottom" data-toggle="tooltip" title="Hapus Produk" href="produk.php?hal=hapus&kd=<?php echo $data['kode'];?>"><span class="glyphicon glyphicon-trash"></a></td>
                    </tr>

                 <?php   
              } 
              ?>

                            </table>

                            <div class="text-right">
                  <a href="tambah-produk.php" class="btn btn-sm btn-primary">Tambah Produk<i class="fa fa-arrow-circle-right"></i></a></div>


              
                
            <!-- end row -->
        </div>
        
        <!-- /.container-fluid -->
    </div>

    
    <!-- /#page-wrapper -->
</div><!-- /#wrapper -->

<?php include('footer.php'); ?>

