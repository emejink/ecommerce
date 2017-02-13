<?php include('header.php'); ?>
    <div id="page-wrapper">
        <div class="content-header">
            <div class="container">
                <h3>Dashboard <small>Administrator</small></h3>
                
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
                        echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data berhasil dihapus.</div>';
                    }else{
                        echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data gagal dihapus.</div>';
                    }
                }
            }
            ?>
            <!-- Page Heading -->
            <div class="row" id="persentase" >
                <div class="col-md-3">
                    <?php $tampil=mysqli_query($koneksi, "select * from produk order by kode desc");
                        $total=mysqli_num_rows($tampil);
                    ?>
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            <i class="fa fa-users"></i>
                            <div class="jumlah"> <?php echo "$total"; ?></div>
                        </div>
                        <div class="panel-body">Jumlah Produk</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <?php $tampil3=mysqli_query($koneksi, "select * from user order by user_id desc");
                        $user=mysqli_num_rows($tampil3);
                    ?>
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            <i class="fa fa-users"></i>
                            <div class="jumlah"><?php echo "$user"; ?></div>
                        </div>
                        <div class="panel-body">Jumlah Admin</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <?php $tampil2=mysqli_query($koneksi, "select * from customer order by kd_cus desc");
                        $pel=mysqli_num_rows($tampil2);
                    ?>
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            <i class="fa fa-users"></i>
                            <div class="jumlah"><?php echo "$pel"; ?> </div>
                        </div>
                        <div class="panel-body">Jumlah Customers</div>
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            <i class="fa fa-users"></i>
                            <div class="jumlah">null</div>
                        </div>
                        <div class="panel-body">Jumlah null</div>
                    </div>
                </div>
            </div>
            <hr>
            <!-- /.row -->
            <div class="row">
                <div class="col-md-7">
                    <p><b>Data Produk</b></p>
                         <?php
                            $query1="select * from produk order by kode DESC limit 5";
                            $hasil=mysqli_query($koneksi, $query1) or die(mysqli_error());
                        ?>
                            <table class="table table-hover table-bordered">
                                <tr>
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Produk</th>
                                    <th>Harga</th>
                                </tr>
                                <?php 
                                 $no=0;
                                 while($data=mysqli_fetch_array($hasil))
                                { $no++; ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $data['kode'];?></td>
                                    <td><a href="detail-karyawan.php?hal=edit&kd=<?php echo $data['kode'];?>"><span class="glyphicon glyphicon-user"></span> <?php echo $data['nama'];?></td>
                                    <td>Rp. <?php echo number_format($data['harga'],2,",",".");?></td>
                                </tr>
                                <?php   
                                  } 
                                ?>

                            </table>

                            <div class="text-right">
                                <a href="produk.php" class="btn btn-sm btn-primary">Menu Produk<i class="fa fa-arrow-circle-right"></i></a>
                            </div>

                </div>
                <div class="col-md-5">
                        <p><b>Data Admin</b></p>
                            <?php
                                $query2="select * from user order by user_id desc limit 5";
                                $hasil1=mysqli_query($koneksi, $query2) or die(mysqli_error());
                            ?>
                            <table class="table table-hover table-bordered">
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Full Name</th>
                                </tr>
                                <?php 
                                 $no=0;
                                 while($data1=mysqli_fetch_array($hasil1))
                                { $no++; ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><a href="detail-admin.php?hal=edit&kd=<?php echo $data1['user_id'];?>"><span class="glyphicon glyphicon-user"></span> <?php echo $data1['username']; ?></a></td>
                                    <td><?php echo $data1['fullname']; ?></td>
                                </tr>
                                 <?php   
                                  } 
                                  ?>
                            </table>

                            <div class="text-right">
                                <a href="admin.php" class="btn btn-sm btn-info">Menu Admin <i class="fa fa-arrow-circle-right"></i></a>
                            </div>

            </div>
            <!-- end row -->
        </div>
        
        <!-- /.container-fluid -->
    </div>

    
    <!-- /#page-wrapper -->
</div><!-- /#wrapper -->

<?php include('footer.php'); ?>

