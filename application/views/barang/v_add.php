<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Input Barang</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
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

            echo form_open_multipart('barang/add') ?>
            <div class="form-group">
                <label>Nama Barang</label>
                <input name="nama_barang" class="form-control" placeholder="Nama Barang" value="<?= set_value('nama_barang') ?>">
            </div>

            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Kategori</label>
                        <select name="id_kategori" class="form-control">
                            <option value="">--Pilih Kategori--</option>
                            <?php foreach ($kategori as $key => $value) { ?>
                                <option value="<?= $value->id_kategori ?>"><?= $value->nama_kategori ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Harga Barang</label>
                        <input name="harga" class="form-control" placeholder="Harga Barang" value="<?= set_value('harga') ?>">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Berat Barang (gr)</label>
                        <input type="number" name="berat" min="0" class="form-control" placeholder="Berat Barang (gr)" value="<?= set_value('berat') ?>">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Deskripsi Barang</label>
                <textarea name="deskripsi" class="form-control" rows="5" placeholder="Deskripsi Barang"><?= set_value('harga') ?></textarea>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Foto Barang</label>
                        <input type="file" name="image" class="form-control" id="preview_image" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <img src="<?= base_url('assets/image/noimg.jpg') ?>" id="image_load" width="400px">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-sm">Add Barang</button>
                <a href="<?= base_url('barang') ?>" class="btn btn-success btn-sm">Kembali</a>
            </div>


            <?php echo form_close() ?>
        </div>
    </div>
</div>

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