<h2>Data Pembelian</h2>
<hr/>

<table>
	<thead>
		<tr>
			<th>No</th>
			<th>Nomor Meja</th>
			<th>Tanggal</th>
			<th>Total</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM pembelian JOIN meja ON pembelian.id_meja=meja.id_meja"); ?>
		<?php while ($pecah = $ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nomor_meja']; ?></td>
			<td><?php echo $pecah['tanggal_pembelian']; ?></td>
			<td><?php echo $pecah['total_pembelian']; ?></td>
			<td><a href="index.php?halaman=detail&id=<?php echo $pecah['id_pembelian']  ?>" class="btn info">Detail</a></td>
		</tr>
		<?php $nomor++; ?> 
		<?php } ?>
	</tbody>
</table>