<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Menu</h1>
</div>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <form method="POST" enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label>Nama Menu</label>
						<input type="text" name="nama" class="form-control">
					</div>
					<div class="form-group">
						<label>Harga (Rp.)</label>
						<input type="number" name="harga" class="form-control">
					</div>
					<div class="form-group">
						<label>Stok</label>
						<input type="number" name="stok" class="form-control">
					</div>
					<div class="form-group">
						<label>Deskripsi</label>
						<textarea name="deskripsi" rows="5" class="form-control"></textarea>
					</div>
					<div class="form-group">
						<label>Foto</label>
						<input type="file" name="foto" class="form-control">
					</div>
				</div>
			</div>						
			<button class="btn btn-success" name="save">Simpan</button>
		</form>
    </div>
</div>

<?php 
if (isset($_POST['save'])) 
{
 	$nama = $_FILES['foto']['name'];
 	$lokasi = $_FILES['foto']['tmp_name'];
 	move_uploaded_file($lokasi, "../foto_produk/".$nama);
 	$koneksi->query("INSERT INTO produk (nama_produk,harga_produk,stok_produk,foto_produk,deskripsi_produk) VALUES('$_POST[nama]','$_POST[harga]','$_POST[stok]','$nama','$_POST[deskripsi]')");
 	
 	echo "<script>alert('Data Tersimpan')</script>";
 	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=menu'>";
} 
?>