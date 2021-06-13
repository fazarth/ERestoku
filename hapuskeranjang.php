<?php 
session_start();
$id_produk=$_GET["id"];
unset($_SESSION["keranjang"][$id_produk]);

echo "<script>alert('Produk Telah Dihapus')</script>";
echo "<meta http-equiv='refresh' content='1;url=keranjang.php'>";
?>