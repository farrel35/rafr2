<div class="col-12 col-sm-12">
    <?php
    if ($this->session->flashdata('pesan')) {
        echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i>';
        echo $this->session->flashdata('pesan');
        echo '</h5></div>';
    }
    ?>
    <div class="card card-primary card-outline card-outline-tabs">
        <div class="card-header p-0 border-bottom-0">
            <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Pesanan Masuk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Diproses </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">Dikirim</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-settings-tab" data-toggle="pill" href="#custom-tabs-four-settings" role="tab" aria-controls="custom-tabs-four-settings" aria-selected="false">Selesai</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content table-responsive" id="custom-tabs-four-tabContent">
                <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                    <table class="table table-bordered">
                        <tr>
                            <th>No Order</th>
                            <th>Tanggal Order</th>
                            <th>Detail Pesanan</th>
                            <th>Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                        <?php foreach ($pesanan as $key => $value) { ?>
                            <tr>
                                <td><a href="<?= base_url('admin/detail_pesanan/' . $value->id_transaksi) ?>"><?= $value->no_order ?></a>
                                </td>
                                <td><?= $value->tgl_order ?></td>
                                <td>
                                    <?php
                                    $detail_pesanan = $this->m_admin->detail_pesanan($value->id_transaksi);
                                    foreach ($detail_pesanan as $key => $value) { ?>
                                        <?= $value->nama_barang ?> x <?= $value->qty ?>
                                        <br>
                                    <?php } ?>
                                </td>
                                <td>
                                    <?php
                                    if ($value->status_bayar == 0) { ?>
                                        <span class="badge badge-warning">Belum Bayar</span>
                                    <?php } else { ?>
                                        <!-- <span class="badge badge-success">Sudah Bayar</span><br> -->
                                        <span class="badge badge-success">Menunggu Verifikasi</span>
                                    <?php } ?>
                                </td>
                                <td class="text-center">
                                    <?php
                                    if ($value->status_bayar == 1) { ?>
                                        <button class="btn btn-sm btn-success btn-flat" data-toggle="modal" data-target="#cek<?= $value->id_transaksi ?>">Cek Bukti Bayar</button>
                                        <a href="<?= base_url('admin/proses/' . $value->id_transaksi) ?>" class="btn btn-sm btn-flat btn-primary">Proses</a>
                                    <?php }  ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
                <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                    <table class="table table-bordered">
                        <tr>
                            <th>No Order</th>
                            <th>Tanggal Order</th>
                            <th>Detail Pesanan</th>
                            <th>Nama Penerima</th>
                            <th>Alamat</th>
                            <th>Expedisi</th>
                            <th>Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                        <?php foreach ($pesanan_diproses as $key => $value) { ?>
                            <tr>
                                <td><a href="<?= base_url('admin/detail_pesanan/' . $value->id_transaksi) ?>"><?= $value->no_order ?></a>
                                </td>
                                <td><?= $value->tgl_order ?></td>
                                <td>
                                    <?php
                                    $detail_pesanan = $this->m_admin->detail_pesanan($value->id_transaksi);
                                    foreach ($detail_pesanan as $key => $value) { ?>
                                        <?= $value->nama_barang ?> x <?= $value->qty ?>
                                        <br>
                                    <?php } ?>
                                </td>
                                <td><?= $value->nama_penerima ?></td>
                                <td>
                                    <b><?= $value->alamat ?></b><br>
                                    Kode Pos : <?= $value->kode_pos ?><br>
                                    Kota : <?= $value->kota ?><br>
                                    Provinsi : <?= $value->provinsi ?>
                                </td>
                                <td>
                                    <b><?= $value->expedisi ?></b><br>
                                    Paket : <?= $value->paket ?><br>
                                    Ongkir : Rp <?= number_format($value->ongkir, 0, ",", ".") ?><br>
                                </td>
                                <td>
                                    <span class="badge badge-warning">Dikemas</span>
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-flat btn-primary" data-toggle="modal" data-target="#kirim<?= $value->id_transaksi ?>"><i class="fa fa-paper-plane"></i>
                                        Kirim</button>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
                <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
                    <table class="table table-bordered">
                        <tr>
                            <th>No Order</th>
                            <th>Tanggal Order</th>
                            <th>No Resi</th>
                            <th>Status</th>
                        </tr>
                        <?php foreach ($pesanan_dikirim as $key => $value) { ?>
                            <tr>
                                <td><a href="<?= base_url('admin/detail_pesanan/' . $value->id_transaksi) ?>"><?= $value->no_order ?></a>
                                </td>
                                <td><?= $value->tgl_order ?></td>
                                <td>
                                    <h5><?= $value->no_resi ?></h5>
                                </td>
                                <td>
                                    <span class="badge badge-success">Dikirim</span>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
                <div class="tab-pane fade" id="custom-tabs-four-settings" role="tabpanel" aria-labelledby="custom-tabs-four-settings-tab">
                    <table class="table table-bordered">
                        <tr>
                            <th>No Order</th>
                            <th>Tanggal Order</th>
                            <th>Status</th>
                        </tr>
                        <?php foreach ($pesanan_selesai as $key => $value) { ?>
                            <tr>
                                <td><a href="<?= base_url('admin/detail_pesanan/' . $value->id_transaksi) ?>"><?= $value->no_order ?></a>
                                </td>
                                <td><?= $value->tgl_order ?></td>
                                <td>
                                    <span class="badge badge-primary">Diterima</span>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.card -->
    </div>
</div>

<?php foreach ($pesanan as $key => $value) { ?>
    <div class="modal fade" id="cek<?= $value->id_transaksi ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?= $value->no_order ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tr>
                            <th>Nama Bank</th>
                            <th>:</th>
                            <td><?= $value->nama_bank ?> </td>
                        </tr>
                        <tr>
                            <th>Nama Pemilik Rekening</th>
                            <th>:</th>
                            <td><?= $value->atas_nama ?> </td>
                        </tr>
                        <tr>
                            <th>No Rekening</th>
                            <th>:</th>
                            <td><?= $value->no_rekening ?> </td>
                        </tr>
                        <tr>
                            <th>Total Bayar</th>
                            <th>:</th>
                            <td>Rp <?= number_format($value->total_bayar, 0, ",", ".") ?> </td>
                        </tr>
                    </table>
                    <img class="img-fluid pad img-cent" src="<?= base_url('assets/image_buktibayar/' . $value->bukti_bayar) ?>" alt="">
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>

<?php foreach ($pesanan_diproses as $key => $value) { ?>
    <div class="modal fade" id="kirim<?= $value->id_transaksi ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?= $value->no_order ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open('admin/kirim/' . $value->id_transaksi) ?>
                    <table class="table">
                        <tr>
                            <th>Expedisi</th>
                            <th>:</th>
                            <td><?= $value->expedisi ?></td>
                        </tr>
                        <tr>
                            <th>Paket</th>
                            <th>:</th>
                            <td><?= $value->paket ?></td>
                        </tr>
                        <tr>
                            <th>Ongkir</th>
                            <th>:</th>
                            <td>Rp <?= number_format($value->ongkir, 0, ",", ".") ?></td>
                        </tr>
                        <tr>
                            <th>No Resi</th>
                            <th>:</th>
                            <td><input class="form-control" name="no_resi" placeholder="Masukan no resi" required></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
                <?php echo form_close() ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>