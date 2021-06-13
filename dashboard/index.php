<?php 
session_start();
//koneksi ke database

$koneksi = new mysqli("localhost","root","","penjualan");

if (!isset($_SESSION['admin'])) 
{
  echo "<script>alert('Anda harus login terlebih dahulu !!')</script>";
  echo "<meta http-equiv='refresh' content='1;url=../index.php'>";
  exit();
}


?>

<?php include 'template/header.php'; ?>
<?php include 'template/sidebar.php'; ?>
<?php include 'template/navbar.php'; ?>


<div class="content">
    <?php 
        if (isset($_GET['halaman'])) 
        {
          if ($_GET['halaman']=='menu') 
          {
            include 'menu.php';
          }
          elseif ($_GET['halaman']=='penjualan') 
          {
            include 'penjualan.php';
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
          include 'template/content.php';
        }
        ?>  
</div>



<?php include 'template/footer.php'; ?>