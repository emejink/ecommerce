<?php include('header.php'); ?>
    <div id="page-wrapper">
        <div class="content-header">
            <div class="container">
                <h3>Customer <small>Administrator</small></h3>
            </div>
        </div>
        <div class="container-fluid">

            <div class="row">
                <?php
                  $kd = $_GET['kode'];
                  $sql = mysqli_query($koneksi, "SELECT * FROM konfirmasi WHERE id_kon='$kd'");
                  if(mysqli_num_rows($sql) == 0){
                    header("Location: konfirmasi.php");
                  }else{
                    $row = mysqli_fetch_assoc($sql);
                  }
                ?>
                <div class="col-lg-12">
                        <div class="panel panel-success">
                        <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-user"></i> Edit Konfirmasi Pembayaran </h3> 
                        </div>
                        <div class="panel-body">
                  <div class="form-panel">
                      <form class="form-horizontal style-form" action="update-konfirmasi.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">ID Konfirmasi</label>
                              <div class="col-sm-8">
                                  <input name="id_kon" type="text" id="id_kon" value="<?php echo $row['id_kon']; ?>" class="form-control" autocomplete="off" readonly="readonly"/>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">No PO</label>
                              <div class="col-sm-3">
                            <input name="nopo" type="text" id="nopo" value="<?php echo $row['nopo']; ?>" class="form-control" autocomplete="off" readonly="readonly"/>
                              
                            </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Kode Customer</label>
                              <div class="col-sm-3">
                            <input name="kd_cus" type="text" id="kd_cus" value="<?php echo $row['kd_cus']; ?>" class="form-control" autocomplete="off" readonly="readonly" />
                              
                            </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Metode Bayar</label>
                              <div class="col-sm-4">
                           
                              <select id="bayar_via" name="bayar_via" class="form-control" autofocus="on" required>
                            <option value=""> -- Pilih Pembayaran -- </option>
                              <?php
                                $query1="select * from bank";
                                $tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());
                                while($data=mysqli_fetch_array($tampil))
                                {
                                ?>
                              
              <option value="<?php echo $data['nama_bank'];?>"><?php echo $data['nama_bank'];?> - <?php echo $data['no_rek'];?> - <?php echo $data['nasabah'];?></option>
                <?php } ?>
                              
                              </select>
                            <!--<option value="Mandiri">Transfer Mandiri</option>
                            <option value="BCA">Transfer BCA</option>
                            <option value="BNI">Transfer BNI</option>
                            <option value="BRI">Transfer BRI</option>
                            <option value="BTN">Transfer BTN</option>
                            <option value="Lainnya">Transfer Bank Lainnya</option>-->
                            </select>
                              
                            </div>
                            
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Tanggal Bayar</label>
                              <div class="col-sm-3">
                            <input name="tanggal" type="text" id="tanggal" value="<?php echo $row['tanggal']; ?>" class="input-group date form-control" data-date="" data-date-format="yyyy-mm-dd" required/>
                              
                            </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Jumlah</label>
                              <div class="col-sm-3">
                            <input name="jumlah" type="text" id="jumlah" value="<?php echo $row['jumlah']; ?>" class="form-control" autocomplete="off"/>
                              
                            </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Bukti Transfer</label>
                            
                              <div class="col-sm-3">
                              <input type="file" name="nama_file" id="nama_file" class="form-control" />
                            </div>
                          </div>
                          <div class="form-group">
                          
                      
                            <label class="col-sm-2 col-sm-2 control-label">Status : </label>
                            <div class="col-sm-3">
                            <?php
                            if($row['status'] == 'Bayar'){
                echo '<span class="label label-success">Sudah di Bayar</span>';
              }
                            else if ($row['status'] == 'Belum' ){
                echo '<span class="label label-danger">Belum di Bayar</span>';
              }
                    ?>
                            
                            </span>
                            </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
                                  <input type="submit" name="update" value="Konfirmasi" class="btn btn-sm btn-primary" />&nbsp;
                                <a href="index.php" class="btn btn-sm btn-danger">Batal </a>
                              </div>
                          </div>
                      </form>
                  </div>
                  </div>
                  </div>
              </div><!-- col-lg-12--> 
            <!-- end row -->
            </div>
        
        <!-- /.container-fluid -->
        </div>
    </div><!-- /#wrapper -->

<?php include('footer.php'); ?>

