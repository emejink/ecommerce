<?php include('header.php'); ?>
    <div id="page-wrapper">
        <div class="content-header">
            <div class="container">
                <h3>Customer <small>Administrator</small></h3>
                
            </div>
        </div>

        <div class="container-fluid">
             <?php
             if(isset($_GET['hal']) == 'hapus'){
                $kd_cus = $_GET['kd'];
                $cek = mysqli_query($koneksi, "SELECT * FROM customer WHERE kd_cus='$kd_cus'");
                if(mysqli_num_rows($cek) == 0){
                    echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data tidak ditemukan.</div>';
                }else{
                    $delete = mysqli_query($koneksi, "DELETE FROM customer WHERE kd_cus='$kd_cus'");
                    if($delete){
                        echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data berhasil dihapus.</div>';
                    }else{
                        echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data gagal dihapus.</div>';
                    }
                }
            }
            ?>
            <div class="row">
                
                <div class="col-md-12">
                        <p><b>Data Customer</b></p>
                        <?php
                    $query1="select * from customer";
                    
                    if(isset($_POST['qcari'])){
                   $qcari=$_POST['qcari'];
                   $query1="SELECT * FROM  customer 
                   where kd_cus like '%$qcari%'
                   or nama like '%$qcari%'  ";
                    }
                    $tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());
                    ?>
                            <table class="table table-hover table-bordered">
                                <tr>
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Nama </i</th>
                                    <th>Alamat</th>
                                    <th>No Telepon</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Aks</th>
                                </tr>
                              <?php 
                     $no=0;
                     while($data=mysqli_fetch_array($tampil))
                    { $no++; ?>
                    <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $data['kd_cus'];?></td>
                    <td><a href="detail-customer.php?hal=edit&kd=<?php echo $data['kd_cus'];?>"><span class="glyphicon glyphicon-user"></span> <?php echo $data['nama'];?></td>
                    <td><?php echo $data['alamat']; ?></td>
                    <td><?php echo $data['no_telp']; ?></td>
                    <td><?php echo $data['username']; ?></td>
                    <td><?php echo $data['password']; ?></td>
                    <td><div id="thanks"><a class="btn btn-sm btn-primary" data-placement="bottom" data-toggle="tooltip" title="Edit Customer" href="edit-customer.php?hal=edit&kd_cus=<?php echo $data['kd_cus'];?>"><span class="glyphicon glyphicon-edit"></span></a>  
                    <a onclick="return confirm ('Yakin hapus <?php echo $data['nama'];?>.?');" class="btn btn-sm btn-danger tooltips" data-placement="bottom" data-toggle="tooltip" title="Hapus customer" href="customer.php?hal=hapus&kd=<?php echo $data['kd_cus'];?>"><span class="glyphicon glyphicon-trash"></a></td>
                    </tr>

                 <?php   
              } 
              ?>

                            </table>

                            <div class="text-right">
                  <a href="tambah-customer.php" class="btn btn-sm btn-primary">Tambah Customer <i class="fa fa-arrow-circle-right"></i></a></div>


              
                
            <!-- end row -->
        </div>
        
        <!-- /.container-fluid -->
    </div>

    
    <!-- /#page-wrapper -->
</div><!-- /#wrapper -->

<?php include('footer.php'); ?>

