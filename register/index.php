<?php
require_once('../config/reg.php');
?>
<!doctype html>
<html lang="en">
  <head>
  	<title>Login</title>
	<link rel="icon" href="../login/images/bg.png" type="image/x-icon" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">

	</head>
	<body>
	<section class="vh-100 bg-image">
		<div class="container">
			<div class="row justify-content-center mt-1">
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap py-5">
		      	<div class="img d-flex align-items-center justify-content-center" style="background-image: url(images/arsip.png);"></div>
		      	<h3 class="text-center mb-0">Selamat Datang</h3>
		      	<p class="text-center">Silahkan isi sesuai data diri anda</p>
				<p class="text-center alert-success">Silahkan isi sesuai data diri anda</p>
						<form action="" class="login-form" method="post">
		      		<div class="form-group">
		      			<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-user"></span></div>
		      			<input type="text" class="form-control" placeholder="NIP" name="nip" required>
		      		</div>
					  <div class="form-group">
						<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-user-circle"></span></div>
						<input type="text" class="form-control" placeholder="Nama Lengkap" name="nama" required>
					</div>
					<div class="form-group">
						<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-calendar"></span></div>
						<input type="text" class="form-control" placeholder="Tanggal Lahir" name="tgl_lahir" required>
					</div>
					<div class="form-group">
						<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-envelope"></span></div>
						<input type="text" class="form-control" placeholder="Email Akif" name="email" required>
					</div>
					<div class="form-group">
						<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-lock"></span></div>
					<input type="password" class="form-control" placeholder="Buat Password" name="pw" required>
					</div>
					<div class="form-group">
						<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-lock"></span></div>
					<input type="password" class="form-control" placeholder="Tulis Ulang Password" name="pw2" required>
					</div>
	            <div class="form-group">
	            	<button type="submit" class="btn form-control btn-primary rounded submit px-3" name="daftar">Submit</button>
	            </div>
	          </form>
	          <div class="w-100 text-center mt-4 text">
	          	<p class="mb-0">Punya Akun?</p>
		          <a href="../login">Masuk Disini</a>
	          </div>
	        </div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>

