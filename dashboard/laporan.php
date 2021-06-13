<?php
$semuadata = array();
$tgl_mulai = "-";
$tgl_selesai = "-";
if (isset($_POST['kirim']))
{
	$tgl_mulai = $_POST["tglmulai"];
	$tgl_selesai = $_POST["tglselesai"];
	$ambil = $koneksi->query("SELECT * FROM pembelian LEFT JOIN meja ON pembelian.id_meja=meja.id_meja WHERE tanggal_pembelian BETWEEN '$tgl_mulai' AND '$tgl_selesai' ");
	while ($pecah = $ambil->fetch_assoc())
	{
		$semuadata[]=$pecah;
	}
}

?>

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="header">
            <h4 class="title">Laporan Penjualan</h4>
            <p class="category"><?php echo $tgl_mulai; ?> hingga <?php echo $tgl_selesai; ?></p>
        <hr>  
        </div>

        <div class="container-fluid">
            <form method="post" class="form">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Dari Tanggal</label>
                            <input type="date" class="form-control" name="tglmulai" value="<?php echo $tgl_mulai; ?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Sampai Tanggal</label>
                            <input type="date" class="form-control" name="tglselesai" value="<?php echo $tgl_selesai; ?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <br>
                        <button class="btn btn-success" name="kirim">Lihat</button>
                    </div>
                </div>
            </form>
        </div>

          <div class="content table-responsive table-full-width">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Meja</th>
                        <th>Tanggal</th>
                        <th>Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                <?php $total=0; ?>
                <?php foreach ($semuadata as $key => $value): ?>
                <?php $total+=$value['total_pembelian']; ?>	
                
                    <tr>
                        <td><?php echo $key+1; ?></td>
                        <td><?php echo $value["nomor_meja"]; ?></td>
                        <td><?php echo $value["tanggal_pembelian"]; ?></td>
                        <td>Rp. <?php echo number_format($value["total_pembelian"]); ?></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3">Total</th>
                        <th>Rp. <?php echo number_format($total); ?></th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
