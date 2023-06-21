<div class="col-12">

    <!-- Main content -->
    <div class="invoice p-3 mb-3">
        <!-- title row -->
        <div class="row">
            <div class="col-12">
                <h4>
                    <i class="fas fa-globe"></i> <?= $title ?>
                    <small class="float-right">Bulan : <?= $bulan ?>/<?= $tahun ?></small>
                </h4>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">

        </div>
        <!-- /.row -->

        <!-- Table row -->
        <div class="row">
            <div class="col-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>No Order</th>
                            <th>Tanggal</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $grand_total = 0;
                        foreach ($laporan as $key => $value) {
                            $grand_total += $value->grand_total;
                        ?>

                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $value->no_order ?></td>
                                <td><?= $value->tgl_order ?></td>
                                <td>Rp <?= number_format($value->grand_total, 0, ",", ".") ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                Total : Rp <?= number_format($grand_total, 0, ",", ".") ?>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- this row will not appear when printing -->
        <div class="row no-print">
            <div class="col-12">
                <button class="btn btn-default float-right" onclick="window.print()"><i class="fas fa-print"></i>
                    Print</button>
            </div>
        </div>
    </div>
    <!-- /.invoice -->
</div>