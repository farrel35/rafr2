<div class="row">
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
                        <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Order</a>
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
                                <th>Total Bayar</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            <?php foreach ($belum_bayar as $key => $value) { ?>
                                <tr>
                                    <td><a href="<?= base_url('pesanan_saya/detail_pesanan/' . $value->id_transaksi) ?>"><?= $value->no_order ?></a></td>
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
                                        <b>Rp <?= number_format($value->total_bayar, 0, ",", ".") ?></b><br>
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
                                    <td>
                                        <?php
                                        if ($value->status_bayar == 0) { ?>
                                            <a href="<?= base_url('pesanan_saya/bayar/' . $value->id_transaksi) ?>" class="btn btn-sm btn-flat btn-primary">Bayar</a>
                                            <button class="btn btn-primary btn-sm btn-danger btn-flat" data-toggle="modal" data-target="#hapus<?= $value->id_transaksi ?>">Hapus</button>
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
                            </tr>
                            <?php foreach ($diproses as $key => $value) { ?>
                                <tr>
                                    <td><a href="<?= base_url('pesanan_saya/detail_pesanan/' . $value->id_transaksi) ?>"><?= $value->no_order ?></a></td>
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
                                <th>Action</th>
                            </tr>
                            <?php foreach ($dikirim as $key => $value) { ?>
                                <tr>
                                    <td><a href="<?= base_url('pesanan_saya/detail_pesanan/' . $value->id_transaksi) ?>"><?= $value->no_order ?></a></td>
                                    </td>
                                    <td><?= $value->tgl_order ?></td>
                                    <td>
                                        <h5><?= $value->no_resi ?></h5>
                                    </td>
                                    <td>
                                        <span class="badge badge-success">Dikirim</span>
                                    </td>
                                    <td>
                                        <button class="btn btn-primary btn-xs btn-flat" data-toggle="modal" data-target="#diterima<?= $value->id_transaksi ?>">Diterima</button>
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
                            <?php foreach ($selesai as $key => $value) { ?>
                                <tr>
                                    <td><a href="<?= base_url('pesanan_saya/detail_pesanan/' . $value->id_transaksi) ?>"><?= $value->no_order ?></a></td>
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
        </div>
    </div>
</div>
<?php foreach ($dikirim as $key => $value) { ?>
    <div class="modal fade" id="diterima<?= $value->id_transaksi ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Pesanan Diterima</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah anda yakin sudah menerima pesanan?
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                    <a href="<?= base_url('pesanan_saya/diterima/' . $value->id_transaksi) ?>" type="button" class="btn btn-primary">Ya</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>

<?php foreach ($belum_bayar as $key => $value) { ?>
    <div class="modal fade" id="hapus<?= $value->id_transaksi ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus Pesanan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah anda yakin ingin menghapus pesanan <?= $value->no_order ?> ?
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                    <a href="<?= base_url('pesanan_saya/delete/' . $value->id_transaksi . '/' . urlencode($value->no_order)) ?>" type="button" class="btn btn-primary">Ya</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>