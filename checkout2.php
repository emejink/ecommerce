<?php

require_once("koneksi.php");
if (!isset($_SESSION)) {
    session_start();
}

if (isset($_POST['submit'])) {

    $nama     = $_POST['nama'];
    $alamat   = $_POST['alamat'];
    $no_telp  = $_POST['no_telp'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $cekno= mysqli_query($koneksi, "SELECT * FROM customer ORDER BY kd_cus DESC");
        
        
        $data1=mysqli_num_rows($cekno);
        $cekQ1=$data1;

        $next1=$cekQ1+1;

        $kode1=strlen($next1);
        
        if(!$cekQ1)
        { $no1='00000'; }
        elseif($kode1==1)
        { $no1='00000'; }
        elseif($kode1==2)
        { $n1o='0000'; }
        elseif($kode1==3)
        { $no1='000'; }
        elseif($kode1==4)
        { $no1='00'; }
        elseif($kode1==5)
        { $no1='0'; }
        elseif($kode1=6)
        { $no=''; }

        $kode=$no1.$next1;

    $query = mysqli_query($koneksi, "INSERT INTO customer (kd_cus, nama, alamat, no_telp, username, password) VALUES ('$kode', '$nama', '$alamat', '$no_telp', '$username', '$password')") or die(mysql_error());
    if ($query) {
        
        $ceknomor= mysqli_query($koneksi, "SELECT * FROM po_terima ORDER BY id DESC");
        
        
        $data=mysqli_num_rows($ceknomor);
        $cekQ=$data;
        //$data=mysqli_fetch_array($ceknomor);
        //$cekQ=$data['f_kodepart'];
        #menghilangkan huruf
        //$awalQ=substr($cekQ,0-6);
        #ketemu angka awal(angka sebelumnya) + dengan 1
        $next=$cekQ+1;

        #menhitung jumlah karakter
        $kode=strlen($next);
        
        if(!$cekQ)
        { $no='00000'; }
        elseif($kode==1)
        { $no='00000'; }
        elseif($kode==2)
        { $no='0000'; }
        elseif($kode==3)
        { $no='000'; }
        elseif($kode==4)
        { $no='00'; }
        elseif($kode==5)
        { $no='0'; }
        elseif($kode=6)
        { $no=''; }

        // masukkan dalam tabel penjualan
        $kodepo=$no.$next;
         $a = "Belum";
        $query1 = mysqli_query($koneksi, "INSERT INTO konfirmasi (nopo, kd_cus, bayar_via, tanggal, jumlah, bukti_transfer, status) VALUES ('$kodepo', '$kodepo', '0', CURRENT_DATE, 0, 0, '$a')") or die(mysqli_error());
            
        if ($query1) {
            
            
            $total = 0;
            //$biaya_pengiriman = 0;

            if (isset($_SESSION['items'])) {
                foreach ($_SESSION['items'] as $key => $value) {
                    $barang_id = $_SESSION['items'][$key];
                    $kuantitas = $value;

                    $query_barang = mysqli_query($koneksi, "SELECT * FROM produk WHERE kode = '$barang_id'");
                    // ambil data dari data barang
                    $data_barang = mysqli_fetch_array($query_barang);
                    $harga = $data_barang['harga'];

                    $jumlah_harga = $harga * $kuantitas;
                    //$total += $jumlah_harga;
                    $kueri = mysqli_query($koneksi, "INSERT INTO po_terima (nopo, kd_cus, kode, tanggal, style, color, size, qty, total) VALUES ('$kodepo', '$kodepo', '$barang_id', CURRENT_DATE, 0, 0, 0, '$kuantitas', '$jumlah_harga' )");
                    
                    //if ($kueri) {
                        
                    echo "<script>alert('Checkout Sukses, silahkan login untuk cetak invoice..'); window.location = 'index.php'</script>";

                    unset($_SESSION['items']);
                    session_destroy();
                    //}
                }
            }

           /** $po = $kodepo; //$biaya_pengiriman;
            $tambah = mysqli_query($koneksi, "INSERT INTO konfirmasi (nopo, bayar_via, tanggal, jumlah, bukti_transfer, status) VALUES ('$po', 0, 0, 0, 0, Belum)");
             if ($tambah) {
                     //mysql_query("INSERT INTO konfirmasi (no_order, bank_tujuan, bank_pelanggan, nama, nominal, tgl_transfer, status) VALUES ('$penjualan_id', 0, 0, 0, 0, 0, NOT PAID)");
                     echo "<script>alert('Checkout Sukses, silahkan login untuk cetak invoice..'); window.location = 'index.php'</script>";

                // clear session
                //foreach ($_SESSION['items'] as $key => $val) {
                  //  unset($_SESSION['items'][$key]);
                //}
                unset($_SESSION['items']);
                session_destroy();
            }**/
        }
    }
}
?>