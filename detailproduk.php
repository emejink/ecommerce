<?php 
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
require_once("koneksi.php");
include("header.php"); 
if (!isset($_SESSION)) {
        session_start();
    } 

?>
<style type="text/css">
	.detail h3,h4 {
		padding-bottom: 10px;
	}
	.detail .title {
		padding-top: 25%;
	}
</style>
<!-- start: Page Title -->
<div id="page-title">
	<div id="page-title-inner">
		<!-- start: Container -->
		<div class="container">
			<h2><i class="ico-stats ico-white"></i>Detail Produk</h2>
		</div>
	</div>
</div>
<!-- end: Page Title -->
<!--start: Wrapper-->
<div id="wrapper">
	<!--start: Container -->
	<div class="container">
	<?php                  
$query = mysqli_query($koneksi, "SELECT * FROM produk WHERE kode='$_GET[kd]'");
$data  = mysqli_fetch_array($query);
?>
		<div class="row detail">
			<div class="col-md-4">
				<img class="thumbnail" src="admin/<?php echo $data['gambar']; ?>" alt="..." width="100%">
			</div>
			<div class="col-md-3">
				
				<h3 class="title"><?php echo $data['nama']; ?></h3>
				<div class="content">
					<h4>Harga : Rp.<?php echo number_format($data['harga'],2,",",".");?></h4>
					<h4>Stock : <?php if ($data['stok'] >= 1){
	                           echo '<strong style="color: blue;">In Stock</strong>';	
                                } else {
	                           echo '<strong style="color: red;">Out Of Stock</strong>';	
                                }; ?></h4>
					<h4>Keterangan : <?php echo $data['keterangan']; ?></h4>
				</div>
				<a href="cart.php?act=add&amp;barang_id=<?php echo $data['kode']; ?>&amp;ref=detailproduk.php?kd=<?php echo $data['kode'];?>" class="btn btn-lg btn-danger">Beli &raquo;</a>
				
			</div>
			<div class="col-md-5">


				<h4>Keranjang</h4><br>
				<table class="table table-hover table-condensed">
                    <tr>
                    <th><center>No</center></th>
					<th><center>Item</center></th>
					<th><center>Quantity</center></th>
					<th><center>Sub Total</center></th>
				</tr>
                    <?php
				//MENAMPILKAN DETAIL KERANJANG BELANJA//
                
    $total = 0;
    //mysql_select_db($database_conn, $conn);
    if (isset($_SESSION['items'])) {
        foreach ($_SESSION['items'] as $key => $val) {
            $query = mysqli_query($koneksi, "select produk.kode, produk.nama, produk.harga from produk where produk.kode = '$key'");
            $data = mysqli_fetch_array($query);

            $jumlah_harga = $data['harga'] * $val;
            $total += $jumlah_harga;
            $no=1;
            ?>
                <tr>
                <td><center><?php echo $no++; ?></center></td>
                <td><center><?php echo $data['nama']; ?></center></td>
                <td><center><?php echo number_format($val); ?></center></td>
                <td><center><?php echo number_format($jumlah_harga); ?></center></td>
                </tr>
                
					<?php
                    //mysql_free_result($query);			
						}
							//$total += $sub;
						}?>
                        <?php
				if($total == 0){
					echo '<td colspan="3" align="center">Cart Empty!</td>';
				} else {
					echo'
                        <td colspan="3" align="right"><b>Total : Rp. '.number_format($total,2,",",".").' </b></td>
					';
				}
				?>
                </table> 
                <p><div align="right">
						<a href="keranjang.php" class="btn btn-success">&raquo Details Keranjang &laquo</a>
						</div></p>


			</div>
		</div>
	</div>
</div>


<?php include('footer.php'); ?>