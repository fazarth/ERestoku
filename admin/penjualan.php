<title>Daftar Penjualan</title>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Daftar Penjualan</h1>
</div>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
      <div class="card-body">
          <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Nomor Meja</th>
                          <th>Tanggal</th>
                          <th>Total</th>
                          <th>Aksi</th>
                      </tr>
                  </thead>
                  <tfoot>
                      <tr>
                          <th>No</th>
                          <th>Nomor Meja</th>
                          <th>Tanggal</th>
                          <th>Total</th>
                          <th>Aksi</th>
                      </tr>
                  </tfoot>
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
