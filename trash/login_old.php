<?php 
session_start();
include 'koneksi.php';
?>


<!DOCTYPE html>
<html>
<head>
	<title>Login Meja</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style.css">
	<style>

	input[type=text], select {
		width: 100%;
		padding: 12px 20px;
		margin: 8px 0;
		display: inline-block;
		border: 1px solid #ccc;
		border-radius: 4px;
		box-sizing: border-box;
	}

	input[type=password], select {
		width: 100%;
		padding: 12px 20px;
		margin: 8px 0;
		display: inline-block;
		border: 1px solid #ccc;
		border-radius: 4px;
		box-sizing: border-box;
	}

</style>
</head>
<body>
	<div class="page">

		<div class="header">
			<h1>Restoran Sederhana v1.5</h1>
			<p>Menyediakan menu-menu khas Indonesia</p>
		</div>

		<div class="topnav">
			<a href="index.php">Home</a>
			<a href="keranjang.php">Keranjang</a>
			<a href="checkout.php">Checkout</a>
		</div>

		<div id="container">
			<h1>Login Meja</h1>
			<hr>

			<form method="POST" enctype="multipart/form-data">
				<div>
					<label>Email</label>
					<input type="text" name="email">
				</div>
				<div>
					<label>Password</label>
					<input type="password" name="password">
				</div>
				<br><br>
				<button class="btn success" name="login">Login Meja</button>
			</form>
			<br><br>
		</div>
		<?php 
		if (isset($_POST["login"])) 
		{
			$email = $_POST["email"];
			$password = $_POST["password"];
		//lakukan query cek akun di db

			$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email' AND password_pelanggan='$password'");

			$akuncocok = $ambil->num_rows;

			if ($akuncocok==1) 
			{
				$akun = $ambil->fetch_assoc();

				$_SESSION["pelanggan"] = $akun;
				echo "<script>alert('Login Sukses')</script>";
				echo "<meta http-equiv='refresh' content='1;url=checkout.php'>";

			}
			else
			{
				echo "<script>alert('Login Gagal')</script>";
				echo "<meta http-equiv='refresh' content='1;url=login.php'>";
			}
		}
		?>
		<div class="footer">
			<p>Footer</p>
		</div>
	</div>
</body>
</html>