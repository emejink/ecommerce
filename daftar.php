<?php include ("header.php"); ?>
<!-- start: Page Title -->
<div id="page-title">
	<div id="page-title-inner">
		<!-- start: Container -->
		<div class="container">
			<h2><i class="ico-usd ico-white"></i>Daftar</h2>
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
		<div class="row">
			<div class="col-md-6">
				<div class="table-responsive">
					<div class="title">
						<h3>Form Pendaftaran</h3>
					</div>
					<div class="hero-unit">
						Harap isi form dibawah ini dengan lengkap dan benar sesuai idenditas anda!
					</div>
					<form role="formku" id="formku" method="post" action="checkout2.php">
						<table class="table table-hover">
						<tr>
							<td>
								<label for="nama">Nama</label>
							</td>
							<td>
								<input class="form-control" name="nama" type="text" class="required" minlength="6" id="nama"/>
							</td>
						</tr>
						<tr>
							<td>
								<label for="alamat">Alamat</label>
							</td>
							<td>
								<input class="form-control" name="alamat" type="text" class="required" minlength="6" id="alamat"/>
							</td>
						</tr>
						<tr>
							<td>
								<label for="no_telp">No Telepon</label>
							</td>
							<td>
								<input class="form-control" name="no_telp" type="text" class="required" minlength="6" id="no_telp"/>
							</td>
						</tr>
						<tr>
							<td>
								<label for="username">Username</label>
							</td>
							<td>
								<input class="form-control" name="username" type="text" class="required" id="username"/>
							</td>
						</tr>
						<tr>
							<td>
								<label for="password">Password</label>
							</td>
							<td>
								<input class="form-control" name="password" type="password" class="required" id="password"/>
							</td>
						</tr>
						<tr>
							<td></td>
							<td>
								<input type="submit" value="Lanjutkan" name="submit" class="btn btn-sm btn-success"/>&nbsp;<a href="index.php" class="btn btn-sm btn-warning">Kembali</a>
							</td>
						</tr>
						</table>
					</form>
				</div>
			</div>
			<div class="col-md-6">
				<div class="table-responsive">
					<div class="title">
						<h3>Sudah Punya Akun</h3>
					</div>
					<div class="hero-unit">Silahkan masukkan username dan password anda</div>
					<form class="form-signin" method="post" action="proseslogincust.php">
						<table class="table table-hover">
						<tr>
							<td>
								<label for="username">Username</label>
							</td>
							<td>
								<input name="username" id="username" type="input" class="form-control" placeholder="Username" autocomplete="off" required autofocus>
							</td>
						</tr>
						<tr>
							<td>
								<label for="password">Password</label>
							</td>
							<td>
								<input name="password" id="password" type="password" class="form-control" placeholder="Password" autocomplete="off" required>
							</td>
						</tr>
						<tr>
							<td></td>
							<td>
								<input type="submit" value="Masuk" name="submit" class="btn btn-sm btn-success"/>&nbsp;<a href="index.php" class="btn btn-sm btn-warning">Kembali</a>
							</td>
						</tr>
						</table>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end: Wrapper  -->
<?php include "footer.php"; ?>