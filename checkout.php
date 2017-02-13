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

				<h2><i class="ico-usd ico-white"></i>Checkout Keranjang</h2>

			</div>
			<!-- end: Container  -->

		</div>	

	</div>
	<!-- end: Page Title -->
	
	<!--start: Wrapper-->
	<div id="wrapper">
				
		<!-- start: Container -->
		<div class="container">

			<!-- start: Table -->
                 <div class="table-responsive">
                 <div class="title"><h3>Form Checkout</h3></div>
                 <div class="hero-unit">Harap isi form dibawah ini dengan lengkap dan benar sesuai idenditas anda!</div>
                <div class="hero-unit">Total Belanja Anda Rp. <?php echo abs((int)$_GET['total']); ?>,-</div> 
    <form role="formku" id="formku" method="post" action="checkout2.php">
    <table class="table table-hover">
    <tr>
        <td><label for="nama">Nama</label></td>
        <td><input name="nama" type="text" class="required" minlength="6" id="nama" /></td>
      </tr>
      <tr>
        <td><label for="alamat">Alamat</label></td>
        <td><input name="alamat" type="text" class="required" minlength="6" id="alamat" /></td>
      </tr>
      <tr>
        <td><label for="no_telp">No Telepon</label></td>
        <td><input name="no_telp" type="text" class="required" minlength="6" id="no_telp" /></td>
      </tr>
      <tr>
        <td><label for="username">Username</label></td>
        <td><input name="username" type="text" class="required" id="username" /></td>
      </tr>
      <tr>
        <td><label for="password">Password</label></td>
        <td><input name="password" type="password" class="required" id="password" /></td>
      </tr>
      <tr>
      <td></td>
        <td><input type="submit" value="Lanjutkan" name="submit"  class="btn btn-sm btn-success"/>&nbsp;<a href="index.php" class="btn btn-sm btn-warning">Kembali</a></td>
        </tr>
    </table>
    </form>
                   </div>
				
			<!-- end: Table -->

		</div>
		<!-- end: Container -->
				
	</div>
	<!-- end: Wrapper  -->			

    <!-- start: Footer Menu -->


	<?php include "footer.php"; ?>