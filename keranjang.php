<?php 
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
require_once("koneksi.php");
include("header.php"); 
if (!isset($_SESSION)) {
        session_start();
    } 

?>

<!-- start: Page Title -->
<div id="page-title">
	<div id="page-title-inner">
		<!-- start: Container -->
		<div class="container">
			<h2><i class="ico-stats ico-white"></i>Keranjang</h2>
		</div>
	</div>
</div>
<!-- end: Page Title -->
<!--start: Wrapper-->
<div id="wrapper">
	<!--start: Container -->
	<div class="container">
		<div class="title">
			<h3>Keranjang Anda</h3>
		</div>
		<div class="none">
			<!--<div class="tittle"><h3><strong><span class="glyphicon glyphicon-shopping-cart"></span> Your Cart</strong></h3></div>-->
			<table class="table table-hover table-condensed">
<tr>
					<th><center>No Pembelian</center></th>
                    <th><center>Kode Barang</center></th>
					<th><center>Nama Barang</center></th>
					<th><center>Harga Satuan</center></th>
                    <th><center>Qty</center></th>
					<th><center>Sub Total</center></th>
					<th><center>Opsi</center></th>
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
                <td><center><?php echo $data['kode']; ?></center></td>
                <td><center><?php echo $data['nama']; ?></center></td>
                <td><center><?php echo number_format($data['harga']); ?></center></td>
                <td><center><?php echo number_format($val); ?></center></td>
                <td><center><?php echo number_format($jumlah_harga); ?></center></td>
                <td><center><a href="cart.php?act=plus&amp;barang_id=<?php echo $key; ?>&amp;ref=keranjang.php" class="btn btn-xs btn-success">Tambah</a> <a href="cart.php?act=min&amp;barang_id=<?php echo $key; ?>&amp;ref=keranjang.php" class="btn btn-xs btn-warning">Kurang</a> <a href="cart.php?act=del&amp;barang_id=<?php echo $key; ?>&amp;ref=keranjang.php" class="btn btn-xs btn-danger">Hapus</a></center></td>
                </tr>
                
					<?php
                    //mysql_free_result($query);			
						}
							//$total += $sub;
						}?>  
                         <?php
				if($total == 0){
					echo '<tr><td colspan="5" align="center">Cart Empty!</td></tr></table>';
					echo '<p><div align="right">
						<a href="produk.php" class="btn btn-primary btn-lg">&laquo; Lanjutkan Belanja</a>
						</div></p>';
				} else {
					echo '
						<tr style="background-color: #DDD;"><td colspan="4" align="right"><b>Total :</b></td><td align="right"><b>Rp. '.number_format($total,2,",",".").'</b></td></td></td><td></td></tr></table>
						<p><div align="right">
						<a href="index.php" class="btn">&laquo; BELANJA LAGI</a>
						<a href="checkout.php?total='.$total.'" class="btn"><i class="glyphicon glyphicon-shopping-cart icon-white"></i> CHECK OUT &raquo;</a>
						</div></p>
					';
				}
				?>

</table>
			
		</div>
	</div>
</div>


<?php include('footer.php'); ?>