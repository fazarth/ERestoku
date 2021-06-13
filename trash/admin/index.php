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

<!DOCTYPE html>
<html lang="en">
<head>
<title>Menu Makanan</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="style.css" type="text/css" rel="stylesheet">

</head>
<body>
<div class="page">
<div id="headerkiri">
      <center>
        <img src="img/admin.png" width="100px" height="100px">
      </center>
    </div>
<div class="header">
  <h1>Administrator</h1>
</div>

<div class="row">
  <div class="column">
     <div id="side">
     <ul>
      <li><a href="index.php"><b>Beranda</b></a></li>
      <li><a href="index.php?halaman=produk"><b>Produk</b></a></li>
      <li><a href="index.php?halaman=pembelian"><b>Pembelian</b></a></li>
      <li><a href="index.php?halaman=meja"><b>Nomor Meja</b></a></li>
      <li><a href="index.php?halaman=laporan"><b>Laporan</b></a></li>
      <li><a href="index.php?halaman=logout"><b>Logout</b></a></li>      
    </ul>
  </div>
  </div>
  <div class="columnright">
    <?php 
        if (isset($_GET['halaman'])) 
        {
          if ($_GET['halaman']=='produk') 
          {
            include 'produk.php';
          }
          elseif ($_GET['halaman']=='pembelian') 
          {
            include 'pembelian.php';
          }
          elseif ($_GET['halaman']=='meja') 
          {
            include 'meja.php';
          }
          elseif ($_GET['halaman']=='detail') 
          {
            include 'detail.php';
          }
          elseif ($_GET['halaman']=='tambahproduk') 
          {
            include 'tambahproduk.php';
          }
          elseif ($_GET['halaman']=='hapusproduk') 
          {
            include 'hapusproduk.php';
          }
          elseif ($_GET['halaman']=='ubahproduk') 
          {
            include 'ubahproduk.php';
          }
          elseif ($_GET['halaman']=='laporan') 
          {
            include 'laporan.php';
          }
          elseif ($_GET['halaman']=='logout') 
          {
            include 'logout.php';
          }
        }
        else
        {
          include 'home.php';
        }
        ?>  
  </div>
 </div>

<div class="footer">
  <p>Copyright © 2018 by Kelompok Web 4D</p>
</div>
</div>

</body>
</html>
