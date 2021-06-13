<div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="header">
                <h4 class="title">Data Daftar Menu</h4>
                <p class="category">Silahkan atur daftar menu yang akan ditampilkan</p>
                <hr>
                <a href="index.php?halaman=tambahproduk" class="btn btn-success pull-right">Tambah Data</a>              
              </div>
              <div class="content table-responsive table-full-width">
                <table class="table table-hover table-striped">
                  <thead>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Harga</th>
                    <th class="text-center">Stock</th>
                    <th class="text-center">Foto</th>
                    <th class="text-center">Aksi</th>
                  </thead>
                  <tbody>
                    <?php $nomor=1; ?>
                    <?php $ambil=$koneksi->query("SELECT * FROM produk"); ?>
                    <?php while($pecah = $ambil->fetch_assoc()){ ?>
                    <tr>
                        <td><?php echo $nomor; ?></td>
                        <td><?php echo $pecah['nama_produk']; ?></td>
                        <td>Rp. <?php echo $pecah['harga_produk']; ?></td>
                        <td><?php echo $pecah['stok_produk']; ?> porsi</td>
                        <td class="text-center">
                            <img src="../foto_produk/<?php echo $pecah['foto_produk'];?>"" width="100px" height="80px">
                        </td>
                        <td class="text-center">				
                            <a href="index.php?halaman=ubahproduk&id=<?php echo$pecah['id_produk'];  ?>" class="btn btn-primary">Ubah</a>
                            <a href="index.php?halaman=hapusproduk&id=<?php echo$pecah['id_produk'];  ?>" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                    <?php $nomor++; ?> 
                    <?php } ?>
                </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
