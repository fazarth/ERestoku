<h2>Data Meja</h2>
<hr/>

<table>
	<thead>
		<tr>
			<th>No</th>
			<th>Nomor Meja</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM meja"); ?>
		<?php while ($pecah = $ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nomor_meja']; ?></td>
			<td><a href="" class="btn danger">Hapus</a></td>
		</tr>
		<?php $nomor++; ?> 
		<?php } ?>
	</tbody>
</table>
	