<style>
.row{
	padding-bottom: 40px;
}
</style>
<head>
<title>Detail Transaksi</title>
</head>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Detail Transaksi</h1>
</div>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
      <div class="card-body">
        <div class="container-fluid">
				<?php 
				$ambil = $koneksi->query("SELECT * FROM pembelian JOIN meja ON pembelian.id_meja=meja.id_meja WHERE pembelian.id_pembelian='$_GET[id]' ");
				$detail = $ambil->fetch_assoc();
				?>
			<div class="row">
				<div class="col-md-4">
					<h4>Nomor Meja</h4>
					<strong><?php echo $detail['nomor_meja']; ?></strong>
				</div>

				<div class="col-md-4">
					<h4>Tanggal</h4>
					<strong><?php echo $detail['tanggal_pembelian'] ?></strong>
				</div>
				
				<div class="col-md-4">
					<h4>Total</h4>
					<strong><?php echo $detail['total_pembelian'] ?></strong>
				</div>
			</div>
		</div>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
						<tr>
							<th>No</th>
							<th>Nama Produk</th>
							<th>Harga</th>
							<th>Jumlah</th>
							<th>Sub Total</th>
						</tr>
					</thead>
					<tbody>
						<?php $nomor=1; ?>
						<?php $ambil=$koneksi->query("SELECT * FROM pembelian_produk JOIN produk ON pembelian_produk.id_produk=produk.id_produk WHERE pembelian_produk.id_pembelian = $_GET[id] ");  ?>
						<?php while ($pecah = $ambil->fetch_assoc()){ ?>
						<tr>
							<td><?php echo $nomor; ?></td>
							<td><?php echo $pecah['nama_produk']; ?></td>
							<td><?php echo $pecah['harga_produk']; ?></td>
							<td><?php echo $pecah['jumlah']; ?></td>
							<td><?php echo $pecah['harga_produk']*$pecah['jumlah']; ?></td>
						</tr>
						<?php $nomor++; ?> 
						<?php } ?>
					</tbody>
                </table>
            </div>
      </div>
  </div>



<!-- <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="header">
                <h4 class="title">Detail Penjualan</h4>
        		</div>

			<?php 
			$ambil = $koneksi->query("SELECT * FROM pembelian JOIN meja ON pembelian.id_meja=meja.id_meja WHERE pembelian.id_pembelian='$_GET[id]' ");
			$detail = $ambil->fetch_assoc();
			?>
			<div class="content table-responsive table-full-width">
				<table class="table table-hover">
					<tbody>
						<tr>
							<td>Meja Nomor</td>
							<td><?php echo $detail['nomor_meja']; ?></td>
						</tr>
						<tr>
							<td>Tanggal</td>
							<td><?php echo $detail['tanggal_pembelian'] ?></td>
						</tr>
						<tr>
							<td>Total</td>
							<td><?php echo $detail['total_pembelian'] ?></td>
						</tr>
					</tbody>
				</table>
              <div class="content table-responsive table-full-width">
                <table class="table table-hover table-striped">
                    <thead>
						<tr>
							<th>No</th>
							<th>Nama Produk</th>
							<th>Harga</th>
							<th>Jumlah</th>
							<th>Sub Total</th>
						</tr>
					</thead>
					<tbody>
						<?php $nomor=1; ?>
						<?php $ambil=$koneksi->query("SELECT * FROM pembelian_produk JOIN produk ON pembelian_produk.id_produk=produk.id_produk WHERE pembelian_produk.id_pembelian = $_GET[id] ");  ?>
						<?php while ($pecah = $ambil->fetch_assoc()){ ?>
						<tr>
							<td><?php echo $nomor; ?></td>
							<td><?php echo $pecah['nama_produk']; ?></td>
							<td><?php echo $pecah['harga_produk']; ?></td>
							<td><?php echo $pecah['jumlah']; ?></td>
							<td><?php echo $pecah['harga_produk']*$pecah['jumlah']; ?></td>
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
    </div> -->
