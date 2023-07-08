<div class="col-12">
    <!-- Main content -->
    <div class="invoice p-3 mb-3">
        <!-- title row -->
        <div class="row">
            <div class="col-12">
                <h4>
                    <i class="fas fa-globe"></i> RAFR VapeStore.
                    <small class="float-right">Date: <?= $detail->tgl_order; ?></small>
                </h4>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
                From
                <address>
                    <strong><?= $setting->nama_toko; ?></strong><br>
                    Alamat : <?= $setting->alamat_toko; ?><br>
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                To
                <address>
                    <strong><?= $detail->nama_penerima; ?></strong><br>
                    Alamat : <?= $detail->alamat; ?><br>
                    Kota : <?= $detail->kota; ?><br>
                    Provinsi : <?= $detail->provinsi; ?><br>
                    Kode Pos : <?= $detail->kode_pos; ?><br>
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                <b>No Order:</b> <?= $detail->no_order; ?><br>
                <b>Tanggal Order:</b> <?= $detail->tgl_order; ?><br>
                <b>No Rekening:</b> <?= $detail->no_rekening; ?>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Table row -->
        <div class="row">
            <div class="col-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 20px">#</th>
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
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-6">

            </div>
            <!-- /.col -->
            <div class="col-6">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th style="width:50%">Subtotal:</th>
                                <td>Rp <?= number_format($detail->grand_total, 0, ",", ".") ?></td>
                            </tr>
                            <tr>
                                <th>Ongkir:</th>
                                <td>Rp <?= number_format($detail->ongkir, 0, ",", ".") ?></td>

                            </tr>
                            <tr>
                                <th>Total:</th>
                                <td>Rp <?= number_format($detail->total_bayar, 0, ",", ".") ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        
        <div class="form-group">
            <a href="<?= base_url('pesanan_saya') ?>" class="btn btn-success btn-sm">Kembali</a>
        </div>
    </div>
    <!-- /.invoice -->
</div>