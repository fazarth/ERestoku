<?php 
session_start();
//koneksi ke database

include 'koneksi.php';
?>


<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	
	
	<!-- font -->
	<style>
	@import url('https://fonts.googleapis.com/css2?family=Viga&display=swap');
	</style>

	<link rel="stylesheet" href="css/style.css">

	<?php include 'template/header.php'; ?>
	<?php include 'template/jumbotron.php'; ?>

	<div class="container">
		<h2 class="text-center">Selamat Memesan Pesanan Anda</h2>
	</div>
	<div class="container">
			<?php $ambil=$koneksi->query("SELECT * FROM produk") ?>
			<?php while ($perproduk=$ambil->fetch_assoc()) { ?>				
		<div class="content">
			<div class="card text-center" style="width: 18rem;">
				<div class="card-body">
					<h5 class="card-title"><?php echo $perproduk['nama_produk']; ?></h5>
					<img src="foto_produk/<?php echo $perproduk['foto_produk'];?>" alt="Gambar Menu"/>
						<p class="card-text">Rp. <?php echo number_format($perproduk['harga_produk']); ?> </p>
						<a href="beli.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-primary">Beli</a>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>

	<?php include 'template/footer.php'; ?>

    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

 
  </body>
</html>
