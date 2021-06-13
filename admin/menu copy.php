<title>Daftar Menu</title>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Daftar Menu</h1>
    <a href="#" data-toggle="modal" data-target="#tambahModal" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-plus fa-sm text-white-50"></i> Tambah Menu</a>
</div>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Stock</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Stock</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
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
                                    <img src="../foto_produk/<?php echo $pecah['foto_produk'];?>" width="100px" height="80px">
                                </td>
                                <td class="text-center">				
                                    <a href="index.php?halaman=ubahproduk&id=<?php echo$pecah['id_produk'];  ?>" class="btn btn-primary"><i
            class="fa fa-eraser fa-sm text-white-50"></i></a>
                                    <a href="index.php?halaman=hapusproduk&id=<?php echo$pecah['id_produk'];  ?>" class="btn btn-danger"><i
            class="fa fa-trash fa-sm text-white-50"></i></a>
                                </td>
                            </tr>
                                <?php $nomor++; ?> 
                        <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


  <!-- Tambah Modal-->
    <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Silahkan Tambah Menu Baru</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="row">
                        <div class="col-md-12">
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
                            <textarea name="deskripsi" rows="2" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                            <label>Foto</label>
                            <input type="file" name="foto" class="form-control">
                            </div>
                        </div>
                        </div>						
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" name="save">Simpan</button>
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
                    </div>
                    </form>                
                </div>
            </div>
        </div>
    </div>



