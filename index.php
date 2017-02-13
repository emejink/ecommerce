<?php 
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
require_once("koneksi.php");
include("header.php"); 
if (!isset($_SESSION)) {
        session_start();
    } 

?>
<!-- navbar mentok -->
<!-- start: Slider -->
<div class="slider-wrapper">
  <div id="da-slider" class="da-slider">
    <div class="da-slide">
      <h2>NgalamGadget</h2>
      <p>
         Kami hadir di Kota Malang,memudahkan anda untuk mendapatkan gadget dengan harga lebih murah.
      </p>
      <a href="produk.php" class="da-link">Lihat Produk</a>
      <div class="da-img">
        <img width="350px" src="image/iphone1.png" alt="image01"/>
      </div>
    </div>
    <div class="da-slide">
      <h2>Iphone Fans</h2>
      <p>
         Kami hadir untuk pecinta produk apple,menjual barang resmi baru dan bekas.Karena kami hanya fokus menjual produk Apple
      </p>
      <a href="produk.php" class="da-link">Lihat Produk</a>
      <div class="da-img">
        <img width="400px" src="image/iphone3.png" alt="image02"/>
      </div>
    </div>
    <div class="da-slide">
      <h2>Repair</h2>
      <p>
         Kami tidak hanya menjual gadget apple saja,akan tetapi kami juga menerima perbaikan gadget apple anda.
      </p>
      <a href="produk.php" class="da-link">Lihat Produk</a>
      <div class="da-img">
        <img width="400px" src="image/iphone4.png" alt="image03"/>
      </div>
    </div>
    <nav class="da-arrows">
    <span class="da-arrows-prev"></span>
    <span class="da-arrows-next"></span>
    </nav>
  </div>
</div>
<!-- end: Slider -->
<div class="container">
  <!-- start: Hero Unit - Main hero unit for a primary marketing message or call to action -->
  <div class="hero-unit">
    <p>
       NgalamGadget adalah salah satu online shop di Kota Malang,yang fokus untuk menjual gadget produk Apple
    </p>
    <p>
      <a class="btn btn-success btn-large" href="profil.php">Profil Kami &raquo;</a>
    </p>
  </div>
  <!--<div class="title"><h3>Keranjang Anda</h3></div>
            <div class="hero-unit"></div> -->
  <!-- end: Hero Unit -->
  <!-- produk -->
  <div class="row produk">
     <?php
        $sql = mysqli_query($koneksi, "SELECT * FROM produk ORDER BY kode DESC limit 9");
            while($data = mysqli_fetch_array($sql)){
        ?>
    <div class="col-sm-6 col-md-3">
      <div class="thumbnail">
        <img src="admin/<?php echo $data['gambar']; ?>" />
        <div class="caption">
         <h3><?php echo $data['nama']; ?>
          <p>Rp.<?php echo number_format($data['harga'],2,",",".");?></p>
          <p>
            <a class="btn btn-default" href="detailproduk.php?hal=detailbarang&kd=<?php echo $data['kode'];?>" class="btn btn-lg btn-danger">Detail</a> 
            <a class="btn btn-default" href="detailproduk.php?hal=detailbarang&kd=<?php echo $data['kode'];?>" class="btn btn-lg btn-success">Beli &raquo;</a>
          </p>
        </div>
      </div>
    </div> 
    <?php   
        }
              
     ?>
  </div>


  </div>
  <!-- gawe footer -->
  <?php include('footer.php'); ?>
  <!-- footer mentok -->