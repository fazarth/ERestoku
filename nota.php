<?php 
include 'koneksi.php';
?>


<style>
	h2{
		padding-top: 30px;
		padding-bottom: 30px;
	}
	.aksi {
		padding-bottom: 50px;
	}
</style>

<head>
	<title>Nota Pembayaran</title>
	<meta charset="utf-8">
	<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


		<link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
		
		
		<!-- font -->
		<style>
		@import url('https://fonts.googleapis.com/css2?family=Viga&display=swap');
		</style>

		<?php include 'template/header.php'; ?>
		
		<link rel="stylesheet" href="css/style.css">
	
</head>

<body>

		<div class="container">
			<h2 class="text-center">Nota Pesanan Anda</h2>
		</div>


<?php 
$ambil = $koneksi->query("SELECT * FROM pembelian JOIN meja ON pembelian.id_meja=meja.id_meja WHERE pembelian.id_pembelian='$_GET[id]' ");
$detail = $ambil->fetch_assoc();
?>

		<div class="container">
				<?php 
				$ambil = $koneksi->query("SELECT * FROM pembelian JOIN meja ON pembelian.id_meja=meja.id_meja WHERE pembelian.id_pembelian='$_GET[id]' ");
				$detail = $ambil->fetch_assoc();
				?>
			<div class="row">
				<div class="col-md-4">
					<h5>Nomor Meja</h5>
					<p><?php echo $detail['nomor_meja']; ?></p>
				</div>

				<div class="col-md-4">
					<h5>Tanggal</h5>
					<p><?php echo $detail['tanggal_pembelian'] ?></p>
				</div>
			</div>
		</div>
<div class="container">
<table class="table table-striped">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Produk</th>
			<th>Harga</th>
			<th>Jumlah</th>
			<th>Sub Total</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $totalbelanja = 0; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM pembelian_produk JOIN produk ON pembelian_produk.id_produk=produk.id_produk WHERE pembelian_produk.id_pembelian = $_GET[id] ");  ?>
		<?php while ($pecah = $ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama_produk']; ?></td>
			<td>Rp. <?php echo $pecah['harga_produk']; ?></td>
			<td><?php echo $pecah['jumlah']; ?> porsi</td>
			<td>Rp. <?php echo $subharga = $pecah['harga_produk']*$pecah['jumlah']; ?></td>
		</tr>
		<?php $nomor++; ?> 
		<?php $totalbelanja+=$subharga; ?>
		<?php } ?>
	</tbody>
	<tfoot>
			<th colspan="4">Total Pesanan Anda</th>
			<th>Rp. <?php echo number_format($totalbelanja); ?> </th>
	</tfoot>
</table>
</div>
<div class="container text-right">
<a href="index.php" type="button" class="btn btn-success">Selesai</a>
</div>

</body>

