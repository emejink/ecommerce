<?php include('header.php'); ?>
    <div id="page-wrapper">
        <div class="content-header">
            <div class="container">
                <h3>Rekening Bank <small>Administrator</small></h3>
            </div>
        </div>
        <div class="container-fluid">
             <?php
             if(isset($_GET['hal']) == 'hapus'){
                $kode = $_GET['kd'];
                $cek = mysqli_query($koneksi, "SELECT * FROM bank WHERE id_bank='$kode'");
                if(mysqli_num_rows($cek) == 0){
                    echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data tidak ditemukan.</div>';
                }else{
                    $delete = mysqli_query($koneksi, "DELETE FROM bank WHERE id_bank='$kode'");
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
                        <p><b>Data Rekening Bank</b></p>
                  <?php
                    $query1="select * from bank";
                    
                    if(isset($_POST['qcari'])){
                   $qcari=$_POST['qcari'];
                   $query1="SELECT * FROM  bank 
                   where nama_bank like '%$qcari%'
                   or nasabah like '%$qcari%'  ";
                    }
                    $tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());
                    ?>
                            <table class="table table-hover table-bordered">
                                <tr>
                                    <th>No </th>
                                    <th>ID Bank </i></th>
                                    <th>Nama Bank </th>
                                    <th>No Rekening </th>
                                    <th>Nasabah </th>
                                    <th>Tools</th>

                                </tr>
                                <?php 
                                 $no=0;
                                 while($data=mysqli_fetch_array($tampil))
                                { $no++; ?>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $data['id_bank'];?></td>
                                <td><?php echo $data['nama_bank']; ?></td>
                                <td><?php echo $data['no_rek']; ?></td>
                                <td><?php echo $data['nasabah']; ?></td>
                                <td><div id="thanks"><a class="btn btn-sm btn-primary" data-placement="bottom" data-toggle="tooltip" title="Edit Bank Account" href="edit-rekening.php?hal=edit&kode=<?php echo $data['id_bank'];?>"><span class="glyphicon glyphicon-edit"></span></a>  
                                <a onclick="return confirm ('Yakin hapus <?php echo $data['nasabah'];?>.?');" class="btn btn-sm btn-danger tooltips" data-placement="bottom" data-toggle="tooltip" title="Hapus Bank Account" href="rekening.php?hal=hapus&kd=<?php echo $data['id_bank'];?>"><span class="glyphicon glyphicon-trash"></a>
                                </td>
                        </tr>

                 <?php   
              } 
              ?>

                            </table>

                            <div class="text-right">
                                <a href="tambah-rekening.php" class="btn btn-sm btn-warning">Tambah Admin <i class="fa fa-arrow-circle-right"></i></a>
                            </div>


              
                
            <!-- end row -->
        </div>
        
        <!-- /.container-fluid -->
    </div>

    
    <!-- /#page-wrapper -->
</div><!-- /#wrapper -->

<?php include('footer.php'); ?>

