<!-- Main content -->
<div class="invoice p-3 mb-3">
    <!-- title row -->
    <div class="row">
        <div class="col-12">
            <h4>
                <i class="fas fa-shopping-cart"></i> Checkout
                <small class="float-right">Date: 2/10/2014</small>
            </h4>
        </div>
        <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
            From
            <address>
                <strong>Admin, Inc.</strong><br>
                795 Folsom Ave, Suite 600<br>
                San Francisco, CA 94107<br>
                Phone: (804) 123-5432<br>
                Email: info@almasaeedstudio.com
            </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">

        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
            <b>Invoice #007612</b><br>
            <br>
            <b>Order ID:</b> 4F3S8J<br>
            <b>Payment Due:</b> 2/22/2014<br>
            <b>Account:</b> 968-34567
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
                        <th>Qty</th>
                        <th>Barang</th>
                        <th style="text-align:center">Berat</th>
                        <th style="text-align:center">Harga</th>
                        <th style="text-align:center">Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>

                    <?php
                    $total_berat = 0;
                    foreach ($this->cart->contents() as $items) {
                        $barang = $this->m_home->get_detailBarang($items['id']);
                        $berat = $items['qty'] * $barang->berat;
                        $total_berat += $berat;
                    ?>
                        <tr>
                            <td><?php echo $items['qty'] ?></td>
                            <td>
                                <?php echo $items['name']; ?>
                            </td>
                            <td style="text-align:center"><?php echo $berat; ?> gr</td>
                            <td style="text-align:center">Rp <?php echo number_format($items['price'], 0); ?></td>
                            <td style="text-align:center">Rp <?php echo number_format($items['subtotal'], 0); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
        <!-- accepted payments column -->
        <div class="col-sm-8 invoice-col">
            Tujuan :
            <address>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Provinsi</label>
                            <select name="provinsi" class="form-control">
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Kota</label>
                            <select name="kota" class="form-control">

                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Expedisi</label>
                            <select name="expedisi" class="form-control">

                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Paket</label>
                            <select name="paket" class="form-control">

                            </select>
                        </div>
                    </div>
                </div>
            </address>
        </div>
        <!-- /.col -->
        <div class="col-4">
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>Rp <?php echo number_format($this->cart->total(), 0); ?></td>
                    </tr>
                    <tr>
                        <th>Berat:</th>
                        <td><?= $total_berat ?> gr</td>
                    </tr>
                    <tr>
                        <th>Ongkos Kirim:</th>
                        <td><label>0</label></td>
                    </tr>
                    <tr>
                        <th>Total Bayar:</th>
                        <td><label>0</label></td>
                    </tr>
                </table>
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- this row will not appear when printing -->
    <div class="row no-print">
        <div class="col-12">
            <a href="<?= base_url('keranjang')?>" rel="noopener" class="btn btn-success"><i class="fas fa-backward"></i> Kembali</a>
            <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                <i class="far fa-credit-card"></i> Checkout
            </button>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Masukan data ke provinsi
        $.ajax({
            type: "POST",
            url: "<?= base_url('rajaongkir/provinsi') ?>",
            success: function(hasil_provinsi) {
                // console.log(hasil_provinsi);
                $("select[name=provinsi]").html(hasil_provinsi);
            }
        });

        // Masukan data ke kota
        $("select[name=provinsi]").on("change", function() {
            var id_provinsi_selected = $("option:selected", this).attr("id_provinsi");

            $.ajax({
                type: "POST",
                url: "<?= base_url('rajaongkir/kota') ?>",
                data: 'id_provinsi=' + id_provinsi_selected,
                success: function(hasil_kota) {
                    // console.log(hasil_kota);
                    $("select[name=kota]").html(hasil_kota);
                }
            });
        })

        $("select[name=kota]").on("change", function() {
            $.ajax({
                type: "POST",
                url: "<?= base_url('rajaongkir/expedisi') ?>",
                success: function(hasil_expedisi) {
                    // console.log(hasil_kota);
                    $("select[name=expedisi]").html(hasil_expedisi);
                }
            });
        });

        $("select[name=expedisi]").on("change", function() {
            $.ajax({
                type: "POST",
                url: "<?= base_url('rajaongkir/paket') ?>",
                success: function(hasil_paket) {
                    // console.log(hasil_kota);
                    $("select[name=paket]").html(hasil_paket);
                }
            });
        });

        

    });
</script>