<head>
        
        <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
				
		<!-- font -->
		<style>
		@import url('https://fonts.googleapis.com/css2?family=Viga&display=swap');
		</style>

		<link rel="stylesheet" href="css/style.css">
</head>

<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="index.php">E-RestoKU</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
            <a class="nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a>
            <a class="nav-link" href="keranjang.php">Pesanan</a>
            <a class="nav-link" href="checkout.php">Bayar</a>
            <a class="btn btn-primary" tabindex="-1" data-toggle="modal" data-target="#login">Login</a>
            </div>
        </div>
    </div>
</nav>

<div class="modal fade" id="login" tabindex="-1" aria-labelledby="loginLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content login">
            <div class="modal-header">
                <h5 class="modal-title" id="loginLabel">Silahkan Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST"">
                    <div class="class="form-group">
                        <input type="text" name="user" class="form-control" placeholder="Username"><br>
                        <input type="password" name="pass" class="form-control" placeholder="Password"><br>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="login">Login</button>
                        </div>
                    </div>
                </form>
            </div>
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
                    echo "<meta http-equiv='refresh' content='1;url=index.php'>";
                }
                }
                ?>
        </div>
    </div>
</div>