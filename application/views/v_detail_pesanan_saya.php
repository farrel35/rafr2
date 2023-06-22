<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Detail Pesanan</h3>

            <div class="card-tools">
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php foreach ($detail as $key => $value) { ?>
                <div class="form-group">
                    <label>No Order:</label>
                    <p><?= $value->no_order ?></p>
                </div>
                <div class="form-group">
                    <label>Total Bayar:</label>
                    <p>Rp <?= number_format($value->total_bayar, 0, ",", ".") ?></p>
                </div>
            <?php } ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Nama Barang</th>
                        <th>Qty</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($detail_pesanan as $key => $value) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $value->nama_barang ?></td>
                            <td><?= $value->qty ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <br>
            <div class="form-group">
                <a href="<?= base_url('pesanan_saya') ?>" class="btn btn-success btn-sm">Kembali</a>
            </div>
        </div>
    </div>
</div>