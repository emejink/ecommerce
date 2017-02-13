<?php include('header.php'); ?>
    <div id="page-wrapper">
        <div class="content-header">
            <div class="container">
                <h3>Admin <small>Administrator</small></h3>
            </div>
        </div>
        <div class="container-fluid">

            <div class="row">
                
                <div class="col-md-12">
                        <p><b>Data Admin</b></p>
                         <?php
                    $query1="select * from user";
                    
                    if(isset($_POST['qcari'])){
                   $qcari=$_POST['qcari'];
                   $query1="SELECT * FROM  user 
                   where fullname like '%$qcari%'
                   or username like '%$qcari%'  ";
                    }
                    $tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());
                    ?>
                            <table class="table table-hover table-bordered">
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Nama Lengkap</th>
                                    <th>Aksi</th>

                                </tr>
                                <?php 
                                 $no=0;
                                 while($data=mysqli_fetch_array($tampil))
                                { $no++; ?>
                                <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $data['username'];?></td>
                                <td><?php echo $data['password'];?></td>
                                <td>
                                    <a href="detail-admin.php?hal=edit&kd=<?php echo $data['user_id'];?>"><span class="glyphicon glyphicon-user"></span> <?php echo $data['fullname']; ?></a>
                                    </td>
                               
                                <td>
            
                                    <a class="btn btn-sm btn-primary" data-placement="bottom" data-toggle="tooltip" title="Edit Admin" href="edit-admin.php?hal=edit&kd=<?php echo $data['user_id'];?>"><span class="glyphicon glyphicon-edit"></span></a>  
                                    <a onclick="return confirm ('Yakin hapus <?php echo $data['fullname'];?>.?');" class="btn btn-sm btn-danger tooltips" data-placement="bottom" data-toggle="tooltip" title="Hapus Admin" href="hapus-admin.php?hal=hapus&kd=<?php echo $data['user_id'];?>"><span class="glyphicon glyphicon-trash"></a>
                                </td>
                        </tr>

                 <?php   
              } 
              ?>

                            </table>

                            <div class="text-right">
                                <a href="tambah-admin.php" class="btn btn-sm btn-warning">Tambah Admin <i class="fa fa-arrow-circle-right"></i></a>
                            </div>


              
                
            <!-- end row -->
        </div>
        
        <!-- /.container-fluid -->
    </div>

    
    <!-- /#page-wrapper -->
</div><!-- /#wrapper -->

<?php include('footer.php'); ?>

