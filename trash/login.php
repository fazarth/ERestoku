<?php 
session_start();
//koneksi ke database

$koneksi = new mysqli("localhost","root","","penjualan");
?>







<div class="page">
    <div class="framelogin">
      <div class="login">
        <div id="headerlogin">
          <center>
            <img src="img/login.png" width="100px" height="100px">
          </center>
        </div>
        <form method="POST">
          <input type="text" name="user" placeholder="Username"><br>
          <input type="password" name="pass" placeholder="Password"><br>
          <button class="btn primary" name="login">Masuk</button>
        </form>
        <?php 
        if (isset($_POST['login'])) 
        {
          $encrypt_pass = $_POST['pass'];
          $ambil = $koneksi->query("SELECT * FROM admin WHERE username='$_POST[user]' AND password='".md5($encrypt_pass)."'");
          $yangcocok=$ambil->num_rows;
          if ($yangcocok==1) 
          {
            $_SESSION['admin']=$ambil->fetch_assoc();
            echo "<script>alert('Login Berhasil')</script>";
            echo "<meta http-equiv='refresh' content='1;url=dashboard/index.php'>";
          }
          else
          {
            echo "<script>alert('Login Gagal')</script>";
            echo "<meta http-equiv='refresh' content='1;url=login.php'>";
          }
        }
        ?>
      </div>
    </div>
  </div>

</body>
</html>