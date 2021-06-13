<div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="header">
                <h4 class="title">Data Penjualan Menu</h4>
                <p class="category">Data penjualan makanan dan minuman</p>
               </div>
              <div class="content table-responsive table-full-width">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nomor Meja</th>
                            <th class="text-center">Tanggal</th>
                            <th class="text-center">Total</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $nomor=1; ?>
                        <?php $ambil=$koneksi->query("SELECT * FROM pembelian JOIN meja ON pembelian.id_meja=meja.id_meja"); ?>
                        <?php while ($pecah = $ambil->fetch_assoc()){ ?>
                        <tr>
                            <td><?php echo $nomor; ?></td>
                            <td><?php echo $pecah['nomor_meja']; ?></td>
                            <td><?php echo $pecah['tanggal_pembelian']; ?></td>
                            <td><?php echo $pecah['total_pembelian']; ?></td>
                            <td><a href="index.php?halaman=detail&id=<?php echo $pecah['id_pembelian']  ?>" class="btn btn-primary">Detail</a></td>
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
