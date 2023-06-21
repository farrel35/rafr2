<div class="row">
    <div class="col-sm-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">No Rekening</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <p>Silahkan transfer ke nomor rekening berikut sejumlah :
                    <h1 class="text-primary">Rp <?= number_format($pesanan->total_bayar, 0, ",", ".") ?></h1>
                    </p>
                    <table class="table">
                        <tr>
                            <th>Bank</th>
                            <th>No Rekening</th>
                            <th>Atas Nama</th>
                        </tr>
                        <?php foreach ($rekening as $key => $value) { ?>
                            <tr>
                                <td><?= $value->nama_bank ?></td>
                                <td><?= $value->no_rekening ?></td>
                                <td><?= $value->atas_nama ?></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Pembayaran</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <?php

            // notif gagal upload
            if (isset($error_upload)) {
                echo '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-info"></i>' . $error_upload . '</h5></div>';
            }
            echo form_open_multipart('pesanan_saya/bayar/' . $pesanan->id_transaksi)
            ?>
            <div class="card-body">
                <div class="form-group">
                    <label>Nama Bank</label>
                    <input name="nama_bank" class="form-control" placeholder="Masukan nama bank" required>
                </div>

                <div class="form-group">
                    <label>Nama Pemilik Rekening</label>
                    <input name="atas_nama" class="form-control" placeholder="Masukan nama pemilik rekening" required>
                </div>

                <div class="form-group">
                    <label>No Rekening</label>
                    <input name="no_rekening" class="form-control" placeholder="Masukan nama rekening" required>
                </div>

                <div class="form-group">
                    <label>Bukti Bayar</label>
                    <input type="file" name="bukti_bayar" class="form-control" required>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <a href="<?= base_url('pesanan_saya') ?>" class="btn btn-success">Kembali</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <?php
            echo form_close('')
            ?>
        </div>
    </div>
</div>