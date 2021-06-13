<?php 
$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk=$_GET[id]");
$pecah = $ambil->fetch_assoc();
$fotoproduk = $pecah['foto_produk'];
{
	unlink("../foto_produk/$fotoproduk");
}

$koneksi->query("DELETE FROM produk WHERE id_produk=$_GET[id]");

echo "<script>alert('Produk Terhapus')</script>";
echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=produk'>";

?>

