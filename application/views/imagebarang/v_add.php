<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Add Image Barang : <?= $barang->nama_barang ?></h3>

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
            <?php
            // notif form kosong
            echo validation_errors('<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-info"></i>', '</h5></div>');

            // notif gagal upload
            if (isset($error_upload)) {
                echo '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-info"></i>' . $error_upload . '</h5></div>';
            }

            echo form_open_multipart('imagebarang/add/' . $barang->id_barang) ?>

            <div class="row">
                <div class="form-group">
                    <label>Keterangan Image</label>
                    <input name="keterangan" class="form-control" placeholder="Keterangan Image" value="<?= set_value('keterangan') ?>">
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Foto Barang</label>
                        <input type="file" name="image" class="form-control" id="preview_image" required>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <img src="<?= base_url('assets/image/noimg.jpg') ?>" id="image_load" width="200px">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-sm">Add Image</button>
                <a href="<?= base_url('imagebarang') ?>" class="btn btn-success btn-sm">Kembali</a>
            </div>

            <?php echo form_close() ?>
            <hr>

            <div class="row">
                <?php foreach ($imagebarang as $key => $value) { ?>
                    <div class="col-sm-3">
                        <div class="form-group text-center">
                            <img src="<?= base_url('assets/imagebarang/' . $value->image) ?>" id="image_load" width="250px" height="250px">
                        </div>
                        <p for="">Keterangan : <?= $value->keterangan ?></p>
                        <button data-toggle="modal" data-target="#delete<?= $value->id_image ?>" class="btn btn-danger btn-xs btn-block"><i class="fas fa-trash"></i> Delete</button>

                    </div>
                <?php } ?>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

<?php foreach ($imagebarang as $key => $value) { ?>
    <div class="modal fade" id="delete<?= $value->id_image ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete <?= $value->keterangan ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <div class="form-group">
                        <img src="<?= base_url('assets/imagebarang/' . $value->image) ?>" id="image_load" width="250px" height="250px">
                    </div>
                    <h4>Apakah anda yakin ingin menghapus image ini?</h1>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('imagebarang/delete/' . $value->id_barang . '/' . $value->id_image) ?>" class="btn btn-primary">Delete</a>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php } ?>

<script>
    function showImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#image_load').attr('src', e.target.result)
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#preview_image").change(function() {
        showImage(this);
    })
</script>