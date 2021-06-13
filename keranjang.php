<?php 
session_start();
include 'koneksi.php';


if (empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"])) 
{
	echo "<script >alert('Anda belum memilih produk')</script>";
	echo "<meta http-equiv='refresh' content='1;url=index.php'>";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous"> -->
	
	
	<!-- font -->
	<!-- <style>
	@import url('https://fonts.googleapis.com/css2?family=Viga&display=swap');
	</style> -->

	<style>
		h2{
			padding-top: 30px;
			padding-bottom: 30px;
		}
		.aksi {
			padding-bottom: 50px;
		}
	</style>

	<!-- <link rel="stylesheet" href="css/style.css"> -->
	
	<?php include 'template/header.php'; ?>

	<title>Pesanan</title>
</head>
<body>
		<div class="container">
			<h2 class="text-center">Daftar Pesanan Anda</h2>
		</div>

		<div class="container">	
			<table class="table table-striped">
				<thead>
					<tr>
					<th scope="col">No.</th>
					<th scope="col">Pesanan</th>
					<th scope="col">Harga</th>
					<th scope="col">Jumlah</th>
					<th scope="col">Subharga</th>
					<th scope="col">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $nomor=1 ?>
						<?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah): ?>
							<!--menampilkan produk dengan perulangan berdasarkan id-->
							<?php 
							$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
							$pecah = $ambil->fetch_assoc();
							$subharga = $pecah["harga_produk"]*$jumlah;
					?>
					<tr>
						<th scope="row"><?php echo $nomor; ?></th>
						<td scope="row"><?php echo $pecah['nama_produk']; ?></td>
						<td scope="row">Rp. <?php echo number_format($pecah['harga_produk']); ?></td>
						<td scope="row"><?php echo $jumlah; ?> Porsi</td>
						<td scope="row">Rp. <?php echo number_format($subharga); ?></td>
						<td scope="row">
						<a href="hapuskeranjang.php?id=<?php echo $id_produk ?>" type="button"	class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
  <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
</svg></a>
						<a href="beli.php?id=<?php echo $pecah['id_produk']; ?>" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
</svg></a>
						</td>
					</tr>						
						<?php $nomor++ ?>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>

			<div class="container aksi text-right">
				<a href="index.php" type="button"	class="btn btn-primary">Pesan Lagi</a>
				<a href="checkout.php" type="button"	class="btn btn-success">Checkout</a>
			</div>
			
		</div>
	</body>
</html>