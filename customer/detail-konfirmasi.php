<?php include('header.php'); ?>
    <div id="page-wrapper">
        <div class="content-header">
            <div class="container">
                <h3>Dashboard <small>Customer</small></h3>
                
            </div>
        </div>
        <div class="container-fluid">
        
            
            <!-- /.row -->
            <div class="row">
                <div class="col-md-12">
                	
        
                       <?php
                    $query = mysqli_query($koneksi, "SELECT * FROM konfirmasi WHERE id_kon='$_GET[kd]'");
                    $data  = mysqli_fetch_array($query);
                    ?>
                                <!-- </div> -->
                                <div class="panel-body">
                    <table id="example" class="table table-bordered">
                    <tr>
                    <td>No PO</td>
                    <td><?php echo $data['nopo']; ?></td>
                    <td rowspan="9"><div class="pull-right image">
                            <img src="<?php echo $data['bukti_transfer']; ?>" class="img-rounded" height="300" width="250" alt="User Image" style="border: 3px solid #333333;" />
                        </div></td>
                    </tr>
                    <tr>
                    <td width="250">Kode Customer</td>
                    <td width="550"><?php echo $data['kd_cus']; ?></td>
                    </tr>
                    <tr>
                    <td>Pembayaran</td>
                    <td><?php echo $data['bayar_via']; ?></td>
                    </tr>
                    <tr>
                    <td>Tanggal</td>
                    <td><?php echo $data['tanggal']; ?></td>
                    </tr>
                    <tr>
                    <td>Jumlah</td>
                    <td>Rp. <?php echo number_format($data['jumlah'],2,",",".");?></td>
                    </tr>
                    <tr>
                    <td>Status</td>
                    <td><?php
                            if($data['status'] == 'Bayar'){
                                echo '<span class="label label-success">Sudah di Bayar</span>';
                            }
                            else if ($data['status'] == 'Belum' ){
                                echo '<span class="label label-danger">Belum di Bayar</span>';
                            }
                    ?></td>
                    </tr>
                   </table>

               <div class="text-right">
                <a href="index.php" class="btn btn-sm btn-warning"> Kembali <i class="fa fa-arrow-circle-right"></i></a>
                </div>  
               



                </div>

               
               
            </div>
            <!-- end row -->
        </div>
        
        <!-- /.container-fluid -->
    </div>



<?php include('footer.php'); ?>

