<h2>Data Produk</h2>
<hr/>

<table>
	<thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Harga</th>
			<th>Stok</th>
			<th>Foto</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM produk"); ?>
		<?php while($pecah = $ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama_produk']; ?></td>
			<td><?php echo $pecah['harga_produk']; ?></td>
			<td><?php echo $pecah['stok_produk']; ?></td>
			<td>
				<img src="../foto_produk/<?php echo $pecah['foto_produk'];?>"" width="100px" height="80px">
			</td>
			<td>				
				<a href="index.php?halaman=ubahproduk&id=<?php echo$pecah['id_produk'];  ?>" class="btn success">Ubah</a>
				<a href="index.php?halaman=hapusproduk&id=<?php echo$pecah['id_produk'];  ?>" class="btn danger">Hapus</a>
			</td>
		</tr>
		<?php $nomor++; ?> 
		<?php } ?>
	</tbody>
</table><br><br>
<a href="index.php?halaman=tambahproduk" class="btn success">Tambah Data</a>
<br><br><br>