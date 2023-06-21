<div class="card card-solid">
    <div class="card-body pb-0">
        <div class="row">
            <div class="col-sm-12">
                <?php
                if ($this->session->flashdata('pesan')) {
                    echo '<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h5><i class="icon fas fa-check"></i>';
                    echo $this->session->flashdata('pesan');
                    echo '</h5></div>';
                }
                ?>
            </div>
            <div class="col-sm-12 table-responsive">
                <?php

                echo form_open('keranjang/update'); ?>

                <table class="table" cellpadding="6" cellspacing="1" style="width:100%">
                    <tbody>
                        <tr>
                            <th width="100px">Quantity</th>
                            <th>Nama Barang</th>
                            <th style="text-align:center">Berat Barang</th>
                            <th style="text-align:center">Harga</th>
                            <th style="text-align:center">Sub-Total</th>
                            <th style="text-align:center">Action</th>
                        </tr>

                        <?php $i = 1; ?>

                        <?php
                        $total_berat = 0;
                        foreach ($this->cart->contents() as $items) {
                            $barang = $this->m_home->get_detailBarang($items['id']);
                            $berat = $items['qty'] * $barang->berat;
                            $total_berat += $berat;
                        ?>
                            <tr>
                                <td><?php echo form_input(array('name' => $i . '[qty]', 'value' => $items['qty'], 'maxlength' => '3', 'min' => '0', 'size' => '5', 'type' => 'number', 'class' => 'form-control')); ?>
                                </td>
                                <td>
                                    <?php echo $items['name']; ?>
                                </td>
                                <td style="text-align:center"><?php echo $berat; ?> gr</td>
                                <td style="text-align:center">Rp <?php echo number_format($items['price'], 0, ",", "."); ?></td>
                                <td style="text-align:center">Rp <?php echo number_format($items['subtotal'], 0, ",", "."); ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url('keranjang/delete/' . $items['rowid']) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>

                            <?php $i++; ?>

                        <?php } ?>

                        <tr>
                            <td class="right"><strong>Total</strong></td>
                            <td class="right"><strong>Rp <?php echo number_format($this->cart->total(), 0, ",", "."); ?></strong></td>
                            <th class="right"><strong>Total Berat : <?= $total_berat ?> gr</strong></th>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>

                <div class="row">
                    <div class="col-sm-4">
                        <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-save"></i> Update Cart</button>
                        <a href="<?= base_url('keranjang/clear') ?>" class="btn btn-danger btn-flat"><i class="fa fa-recycle"></i> Clear Cart</a>
                        <a href="<?= base_url('keranjang/checkout') ?>" class="btn btn-primary btn-flat"><i class="fa fa-check-square"></i> Checkout</a>
                    </div>
                </div>
                <?php form_close() ?>
                <br>

            </div>
        </div>
    </div>
</div>