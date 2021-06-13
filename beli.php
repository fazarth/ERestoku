<?php 
session_start();
//mendapatkan id produk dari url
$id_produk = $_GET['id'];

//jika ada di kerranjang maka +1
if (isset($_SESSION['keranjang'][$id_produk])) 
{
	$_SESSION['keranjang'][$id_produk]+=1;
}

//jika belum, maka beli 1
else
{
	$_SESSION['keranjang'][$id_produk]=1;
}

//echo "<prev>";
//print_r($_SESSION);
//echo "<prev>";

//menuju keranjang belanja
echo "<script>alert('Produk berhasil masuk ke keranjang')</script>";
echo "<meta http-equiv='refresh' content='1;url=keranjang.php'>";
?>