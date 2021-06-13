<?php 
session_start();
include 'koneksi.php';


if (empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"])) 
{
	echo "<script>alert('Anda belum memilih produk')</script>";
	echo "<meta http-equiv='refresh' content='1;url=index.php'>";
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Checkout Makanan</title>
	<meta charset="utf-8">
	<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


		<link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
		
		
		<!-- font -->
		<style>
		@import url('https://fonts.googleapis.com/css2?family=Viga&display=swap');
		</style>

	<style>
		h2{
			padding-top: 30px;
			padding-bottom: 30px;
		}
		.aksi {
			padding-bottom: 50px;
		}
	</style>

		<?php include 'template/header.php'; ?>
		
		<link rel="stylesheet" href="css/style.css">
	
</head>
<body>
	<div class="page">

		<div class="container">
			<h2 class="text-center">Checkout Pesanan Anda</h2>
		</div>

		<div id="container" class="container">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Produk</th>
						<th>Harga</th>
						<th>Jumlah</th>
						<th>Subharga</th>
					</tr>
				</thead>
				<tbody>
					<?php $nomor=1 ?>
					<?php $totalbelanja =0; ?>
					<?php foreach ($_SESSION['keranjang'] as $id_produk => $jumlah): ?>
						<!--menampilkan produk dengan perulangan berdasarkan id-->
						<?php 
						$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
						$pecah = $ambil->fetch_assoc();
						$subharga = $pecah["harga_produk"]*$jumlah;
						?>
						<tr>
							<td><?php echo $nomor; ?></td>
							<td><?php echo $pecah['nama_produk']; ?></td>
							<td>Rp. <?php echo number_format($pecah['harga_produk']); ?></td>
							<td><?php echo $jumlah; ?> porsi</td>
							<td>Rp. <?php echo number_format($subharga); ?></td>
						</tr>
						<?php $nomor++ ?>
						<?php $totalbelanja+=$subharga; ?>
					<?php endforeach ?>

				</tbody>
				<tfoot>
					<tr>
						<th colspan="4">Total Belanja</th>
						<th>Rp. <?php echo number_format($totalbelanja) ?></th>
					</tr>
				</tfoot>
			</table>
		</div>

		<div class="container">
			<div class="row">
			<div class="col-md-4 label">
			<form method="post">
					<select class="custom-select" id="validationTooltip04" name="nomormeja" required>
						<option value="">Pilih Meja Anda</option>
						<?php 
						$ambil =$koneksi->query("SELECT * FROM meja");
						while ($permeja=$ambil->fetch_assoc()) {	
							?>
							<option value="<?php echo $permeja["id_meja"] ?>">
								<?php echo $permeja['nomor_meja'] ?>
							</option>
							<?php } ?>			
						</select>
					</div>
				<button class="btn btn-primary" name="checkout">Checkout</button>
			</div>
		</div>

			</form>

			<?php 
			if (isset($_POST["checkout"])) 
			{
				$id_meja = $_POST["nomormeja"];
				$tanggal_pembelian = date ("Y-m-d");
				$total_pembelian = $totalbelanja;

	//menyimpan data ke tabel pembelian

				$koneksi->query("INSERT INTO pembelian (id_meja,tanggal_pembelian,total_pembelian) VALUES ('$id_meja','$tanggal_pembelian','$total_pembelian')");


	//mendapatkan id pembelian
				$idpembelian_baru = $koneksi->insert_id;
				foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) 
				{
					$koneksi->query("INSERT INTO pembelian_produk (id_pembelian, id_produk, jumlah) VALUES ('$idpembelian_baru','$id_produk','$jumlah')");
				}
//mengkosongkan keranjang belanja

				unset($_SESSION["keranjang"]);


// tampilan dikirim kehalaman nota
				echo "<script>alert('Pembelian Sukses')</script>";
				echo "<script>location='nota.php?id=$idpembelian_baru';</script>";
			}
			?>
			</div>
		</div>
	</body>
</html>