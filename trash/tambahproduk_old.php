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
<h2>Tambah Produk</h2>
<hr/>

<form method="POST" enctype="multipart/form-data">
	<div class="label">
		<label>Nama</label>
		<input type="text" name="nama">
	</div>
	<div class="label">
		<label>Harga (Rp.)</label>
		<input type="number" name="harga">
	</div>
	<div class="label">
		<label>Stok</label>
		<input type="number" name="stok">
	</div>
	<div class="label">
		<label>Deskripsi</label>
		<textarea name="deskripsi" rows="10"></textarea>
	</div>
	<div class="label">
		<label>Foto</label>
		<input type="file" name="foto">
	</div>
	<br><br>
	<button class="btn success" name="save">Simpan</button>
</form>
<br><br>

<?php 
if (isset($_POST['save'])) 
{
 	$nama = $_FILES['foto']['name'];
 	$lokasi = $_FILES['foto']['tmp_name'];
 	move_uploaded_file($lokasi, "../foto_produk/".$nama);
 	$koneksi->query("INSERT INTO produk (nama_produk,harga_produk,stok_produk,foto_produk,deskripsi_produk) VALUES('$_POST[nama]','$_POST[harga]','$_POST[stok]','$nama','$_POST[deskripsi]')");
 	
 	echo "<script>alert('Data Tersimpan')</script>";
 	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=produk'>";
} 
?>


 
