<?php 
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
require_once("koneksi.php");
include("header.php"); 
if (!isset($_SESSION)) {
    session_start();
    } 

?>

<div id="page-title">
  <div id="page-title-inner">
    <!-- start: Container -->
    <div class="container">
      <h2>Produk Kami</h2>
    </div>
    <!-- end: Container  -->
  </div>
</div>
<div class="container">
  <!-- produk -->
  

  <div class="row produk">
<?php
                    $sql = mysqli_query($koneksi, "SELECT * FROM produk ORDER BY kode DESC");
  if(mysqli_num_rows($sql) == 0){
    echo "Tidak ada produk!";
  }else{
    while($data = mysqli_fetch_assoc($sql)){
                    ?>
    <div class="col-sm-6 col-md-3">
      <div class="thumbnail">
        <img src="admin/<?php echo $data['gambar']; ?>" />
        <div class="caption">
         <h3><?php echo $data['nama']; ?>
          <p>Rp.<?php echo number_format($data['harga'],2,",",".");?></p>
          <p>
            <a class="btn btn-default" href="detailproduk.php?hal=detailbarang&kd=<?php echo $data['kode'];?>" class="btn btn-lg btn-danger">Detail</a> 
            <a class="btn btn-default" href="detailproduk.php?hal=detailbarang&kd=<?php echo $data['kode'];?>" class="btn btn-lg btn-success">Beli &raquo;</a></div>
          </p>
        </div>
      </div><?php   
        }
      }
              
     ?>
    </div> 
    
  </div>


</div>
<?php include('footer.php'); ?>