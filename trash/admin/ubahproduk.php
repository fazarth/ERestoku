<style>
input[type=text], select, textarea {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=number], select,textarea {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=file] {
    width: 100%;
    background: white; 
    color: black;
    padding: 14px 20px;
    margin: 8px 0;
    border: 1px solid #ccc;
    border-radius: 4px;
    cursor: pointer;
}

.label {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}
</style>
<h2>Data Pembelian</h2>
<hr/>
<?php 
$ambil=$koneksi->query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
$pecah=$ambil->fetch_assoc();

?>

<form method="POST" enctype="multipart/form-data">
	<div class="label">
		<label>Nama</label>
		<input type="text" name="nama" value="<?php echo$pecah['nama_produk'];?>">
	</div>
	<div class="label">
		<label>Harga (Rp.)</label>
		<input type="number" name="harga" value="<?php echo$pecah['harga_produk'];?>">
	</div>
	<div class="label">
		<label>Stok</label>
		<input type="number" name="stok" value="<?php echo$pecah['stok_produk'];?>">
	</div>
	<div class="label">
		<img src="../foto_produk/<?php echo $pecah['foto_produk']?>" width="200">
	</div>
	<div class="label">
		<label>Ganti Foto</label>
		<input type="file" name="foto">
	</div>
	<div class="label">
		<label>Deskripsi</label>
		<textarea name="deskripsi" rows="10"><?php echo $pecah['deskripsi_produk'];?></textarea>
	</div>
	<button class="btn success" name="ubah">Simpan</button>
</form>
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
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=produk'>";
}
?>