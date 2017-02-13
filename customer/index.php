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
                	$sqlku = mysqli_query($koneksi, "SELECT * FROM bank ORDER BY id_bank DESC limit 1"); 
                    $row = mysqli_fetch_array($sqlku);
                ?>
                <div class="alert alert-info alert-dismissable">
                	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Silahkan Transfer Pembayaran Anda  Ke rek : <b><?php echo $row['nama_bank']; ?> - <?php echo $row['no_rek']; ?> - <?php echo $row['nasabah']; ?></b>
                	</div>
                    <p><b>Data Purchase Order</b></p>
                         <?php
		                    $kodeku = $_SESSION['user_id'];
		                    $query1="select * from po_terima where kd_cus='$kodeku'";
		                    $hasil=mysqli_query($koneksi, $query1) or die(mysqli_error());
		                 ?>
                            <table class="table table-hover table-bordered">
                                <tr>
                                    <th>ID </th>
			                        <th>No PO</i></th>
			                        <th>Kode Produk </th>
			                        <th>Tanggal </th>
			                        <th>Style </th>
			                        <th>Color </th>
			                        <th>Size </th>
			                        <th>Qty </th>
			                        <th>Total </th>
			                        <th>Aksi </th>
                                </tr>
                                <?php 
			                     while($data=mysqli_fetch_array($hasil))
			                    { ?>
                                <tr>
                                    <td><?php echo $data['id'];?></td>
				                    <td><?php echo $data['nopo'];?></td>
				                    <td><?php echo $data['kode'];?></td>
				                    <td><?php echo $data['tanggal'];?></td>
				                    <td><?php echo $data['style'];?></td>
				                    <td><?php echo $data['color'];?></td>
				                    <td><?php echo $data['size'];?></td>
				                    <td><?php echo $data['qty'];?></td>
				                    <td>Rp. <?php echo number_format($data['total'],2,",",".");?></td>
				                   <td><div id="thanks">
				                    <a class="btn btn-sm btn-success" data-placement="bottom" data-toggle="tooltip" title="Status PO" href="status-po.php?hal=status&kd=<?php echo $data['nopo'];?>"><span class="glyphicon glyphicon-tag"></span></a> 
				                    <a class="btn btn-sm btn-primary" data-placement="bottom" data-toggle="tooltip" title="Edit PO Terima" href="edit-po-terima.php?hal=edit&kode=<?php echo $data['id'];?>"><span class="glyphicon glyphicon-edit"></span></a>  
				                    </div></td>
                                </tr>
                                <?php   
                                  } 
                                ?>

                            </table>

                </div>

                <div class="col-md-12"><hr>
	                    <p><b>Konfirmasi Pembayaran</b></p>
	                          <?php
			                    $kd = $_SESSION['user_id'];
			                    $query3="select * from konfirmasi where kd_cus='$kd' limit 1";
			                    $hasil2=mysqli_query($koneksi, $query3) or die(mysqli_error());
			                  ?>
	                            <table class="table table-hover table-bordered">
	                                <tr>
	                                    <th>ID </th>
				                        <th>No PO</i></th>
				                        <th>Kode Cust </th>
				                        <th>Pembayaran</th>
				                        <th>Tanggal </th>
				                        <th>Jumlah </th>
				                        <th>Status</th>
				                        <th>Aksi </th>
	                                </tr>
	                                <?php 
				                     while($data2=mysqli_fetch_array($hasil2))
				                    { ?>
	                                <tr>
	                                    <td><?php echo $data2['id_kon'];?></td>
					                    <td><?php echo $data2['nopo'];?></td>
					                    <td><?php echo $data2['kd_cus'];?></td>
					                    <td><?php echo $data2['bayar_via'];?></td>
					                    <td><?php echo $data2['tanggal'];?></td>
					                    <td>Rp. <?php echo number_format($data2['jumlah'],2,",",".");?></td>
					                    <td><?php
					                            if($data2['status'] == 'Bayar'){
													echo '<span class="label label-success">Sudah di Bayar</span>';
												}
					                            else if ($data2['status'] == 'Belum' ){
													echo '<span class="label label-danger">Belum di Bayar</span>';
												}
					                    
					                    ?>
					                    
					                    </td>
					                    <td><div id="thanks"><a class="btn btn-sm btn-success" data-placement="bottom" data-toggle="tooltip" title="Detail Pembayaran" href="detail-konfirmasi.php?hal=detail&kd=<?php echo $data2['id_kon'];?>"><span class="glyphicon glyphicon-search"></span></a> 
					                    <a class="btn btn-sm btn-primary" data-placement="bottom" data-toggle="tooltip" title="Konfirmasi Prmbayaran" href="edit-konfirmasi.php?hal=edit&kode=<?php echo $data2['id_kon'];?>"><span class="glyphicon glyphicon-edit"></span></a>  
					                    </div></td>
	                                </tr>
	                                <?php   
	                                  } 
	                                ?>

	                            </table>

	                            

	                </div>
               
            </div>
            <!-- end row -->
        </div>
        
        <!-- /.container-fluid -->
    </div>



<?php include('footer.php'); ?>

