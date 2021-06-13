<div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="header">
                <h4 class="title">Data Daftar Menu</h4>
                <p class="category">Silahkan atur daftar menu yang akan ditampilkan</p>              
              </div>
				  <div class="content">
					<form method="POST" enctype="multipart/form-data">
						<div class="row">
							<div class="col-md-8">
								<div class="form-group">
									<label>Nama Menu</label>
									<input type="text" name="nama" class="form-control">
								</div>
								<div class="form-group">
									<label>Harga (Rp.)</label>
									<input type="number" name="harga" class="form-control">
								</div>
								<div class="form-group">
									<label>Stok</label>
									<input type="number" name="stok" class="form-control">
								</div>
								<div class="form-group">
									<label>Deskripsi</label>
									<textarea name="deskripsi" rows="5" class="form-control"></textarea>
								</div>
								<div class="form-group">
									<label>Foto</label>
									<input type="file" name="foto" class="form-control">
								</div>
							</div>
						</div>						
						<button class="btn btn-success" name="save">Simpan</button>
					</form>
					</div>
            </div>
          </div>
        </div>
      </div>
    </div>


<?php 
if (isset($_POST['save'])) 
{
 	$nama = $_FILES['foto']['name'];
 	$lokasi = $_FILES['foto']['tmp_name'];
 	move_uploaded_file($lokasi, "../foto_produk/".$nama);
 	$koneksi->query("INSERT INTO produk (nama_produk,harga_produk,stok_produk,foto_produk,deskripsi_produk) VALUES('$_POST[nama]','$_POST[harga]','$_POST[stok]','$nama','$_POST[deskripsi]')");
 	
 	echo "<script>alert('Data Tersimpan')</script>";
 	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=menu'>";
} 
?>