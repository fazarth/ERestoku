<?php 
$ambil=$koneksi->query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
$pecah=$ambil->fetch_assoc();

?>


<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Ubah Menu "<?php echo$pecah['nama_produk'];?>"</h1>
</div>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <form method="POST" enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<img src="../foto_produk/<?php echo $pecah['foto_produk']?>" width="200">
					</div>
					<div class="form-group">
						<label>Nama Menu</label>
						<input type="text" name="nama" class="form-control" value="<?php echo$pecah['nama_produk'];?>">
					</div>
					<div class="form-group">
						<label>Harga (Rp.)</label>
						<input type="number" name="harga" class="form-control" value="<?php echo$pecah['harga_produk'];?>">
					</div>
					<div class="form-group">
						<label>Stok</label>
						<input type="number" name="stok" class="form-control" value="<?php echo$pecah['stok_produk'];?>">
					</div>
					<div class="form-group">
						<label>Deskripsi</label>
						<textarea name="deskripsi" rows="5" class="form-control"><?php echo $pecah['deskripsi_produk'];?></textarea>
					</div>
					<div class="form-group">
						<label>Ganti Foto</label>
						<input type="file" name="foto" class="form-control">
					</div>
				</div>
			</div>						
			<button class="btn btn-success" name="ubah">Simpan</button>
		</form>
    </div>
</div>


<?php 
if (isset($_POST['ubah'])) 
{
	$namafoto=$_FILES['foto']['name'];
	$lokasifoto=$_FILES['foto']['tmp_name'];

	//jika foto diubah
	if (!empty($lokasifoto))
	{
		move_uploaded_file($lokasifoto, "../foto_produk/$namafoto");

		$koneksi->query("UPDATE produk SET nama_produk='$_POST[nama]',harga_produk='$_POST[harga]',stok_produk='$_POST[stok]',foto_produk='$namafoto',deskripsi_produk='$_POST[deskripsi]' WHERE id_produk='$_GET[id]'");
	}
	else
	{
		$koneksi->query("UPDATE produk SET nama_produk='$_POST[nama]',harga_produk='$_POST[harga]',stok_produk='$_POST[stok]',deskripsi_produk='$_POST[deskripsi]' WHERE id_produk='$_GET[id]'");
	}
	echo "<script>alert('Produk Telah Diperbaharui')</script>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=menu'>";
}
?>