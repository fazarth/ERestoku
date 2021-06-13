<h2>Detail Pembelian</h2>
<hr/>
<?php 
$ambil = $koneksi->query("SELECT * FROM pembelian JOIN meja ON pembelian.id_meja=meja.id_meja WHERE pembelian.id_pembelian='$_GET[id]' ");
$detail = $ambil->fetch_assoc();
?>

<!-- <pre><?php print_r($detail) ?></pre> -->

<strong><?php echo $detail['nomor_meja']; ?></strong><br>
<p>
	Tanggal :<?php echo $detail['tanggal_pembelian'] ?><br>
	Total :<?php echo $detail['total_pembelian'] ?>
</p>

<table>
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
		<?php $ambil=$koneksi->query("SELECT * FROM pembelian_produk JOIN produk ON pembelian_produk.id_produk=produk.id_produk WHERE pembelian_produk.id_pembelian = $_GET[id] ");  ?>
		<?php while ($pecah = $ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama_produk']; ?></td>
			<td><?php echo $pecah['harga_produk']; ?></td>
			<td><?php echo $pecah['jumlah']; ?></td>
			<td><?php echo $pecah['harga_produk']*$pecah['jumlah']; ?></td>
		</tr>
		<?php $nomor++; ?> 
		<?php } ?>
	</tbody>
</table>