<?php 
session_start();
//koneksi ke database

$koneksi = new mysqli("localhost","root","","penjualan");

if (!isset($_SESSION['admin'])) 
{
  echo "<script>alert('Anda harus login terlebih dahulu !!')</script>";
  echo "<meta http-equiv='refresh' content='1;url=login.php'>";
  exit();
}


?>

<?php include 'template/header.php'; ?>
<?php include 'template/sidebar.php'; ?>
<?php include 'template/navbar.php'; ?>
<?php include 'template/meja.php'; ?>
<?php include 'template/footer.php'; ?>