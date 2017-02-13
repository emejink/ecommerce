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
                    $query = mysqli_query($koneksi, "SELECT * FROM customer WHERE kd_cus='$_GET[kd_cus]'");
                    $data  = mysqli_fetch_array($query);
                    ?>
                                <!-- </div> -->
                                <div class="panel-body">
                      <table id="example" class="table table-bordered">
                    <tr>
                    <td>Kode</td>
                    <td><?php echo $data['kd_cus']; ?></td>
                    <td rowspan="9"><div class="pull-right image">
                            <img src="<?php echo $data['gambar']; ?>" class="img-rounded" height="300" width="250" alt="User Image" style="border: 3px solid #333333;" />
                        </div></td>
                    </tr>
                    <tr>
                    <td width="250">Nama</td>
                    <td width="550"><?php echo $data['nama']; ?></td>
                    </tr>
                    <tr>
                    <td>Alamat</td>
                    <td><?php echo $data['alamat']; ?></td>
                    </tr>
                    <tr>
                    <td>No Telepon</td>
                    <td><?php echo $data['no_telp']; ?></td>
                    </tr>
                    <tr>
                    <td>Username</td>
                    <td><?php echo $data['username']; ?></td>
                    </tr>
                    <tr>
                    <td>Password</td>
                    <td><?php echo $data['password']; ?></td>
                    </tr>
                   </table>
                  <?php
                    $kodesaya = $_SESSION['user_id'];
                    $query2="select * from customer where kd_cus='$kodesaya' limit 1";
                    $hasil1=mysqli_query($koneksi, $query2) or die(mysqli_error());

                    ?>
                <div class="text-right">
                <?php 
                     
                     while($data1=mysqli_fetch_array($hasil1))
                    { ?>
                <a href="edit-customer.php?hal=edit&kd_cus=<?php echo $data1['kd_cus'];?>" class="btn btn-sm btn-primary"> Edit Profil Customer<i class="fa fa-arrow-circle-right"></i></a>
                <?php   
              } 
              ?>
                </div>  


                </div>

               
               
            </div>
            <!-- end row -->
        </div>
        
        <!-- /.container-fluid -->
    </div>



<?php include('footer.php'); ?>

