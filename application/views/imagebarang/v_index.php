<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Data Image Barang</h3>

            <div class="card-tools">
               
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php
            if ($this->session->flashdata('pesan')) {
                echo '<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h5><i class="icon fas fa-check"></i>';
                echo $this->session->flashdata('pesan');
                echo '</h5></div>';
            }
            ?>
            <table class="table table-bordered" id="example1">
                <thead class="text-center">
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Cover</th>
                        <th>Jumlah</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; 
                    foreach ($imagebarang as $key => $value) { ?>
                        <tr>
                            <td><?= $no++?></td>
                            <td><?= $value->nama_barang?></td>
                            <td class="text-center"><img src="<?= base_url('assets/image/' . $value->image)?>" width="100px"></td>
                            <td class="text-center"><span class="badge bg-primary"><h5><?= $value->total_image?></h5></span></td>
                            <td class="text-center">
                                <a href="<?= base_url('imagebarang/add/' . $value->id_barang)?>" class="btn btn-success btn-sm"><i class="fas fa-plus">Add Image</i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>