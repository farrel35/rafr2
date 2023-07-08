<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Detail Akun</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <?php
                // notif form kosong
                echo validation_errors('<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-info"></i>', '</h5></div>');

                if ($this->session->flashdata('pesan')) {
                    echo '<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h5><i class="icon fas fa-check"></i>';
                    echo $this->session->flashdata('pesan');
                    echo '</h5></div>';
                }
                // notif gagal upload
                if (isset($error_upload)) {
                    echo '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-info"></i>' . $error_upload . '</h5></div>';
                }

                echo form_open_multipart('pelanggan/akun/' . $detail_akun->id_pelanggan) ?>
                <div class="form-group">
                    <label>Nama</label>
                    <input name="nama_pelanggan" class="form-control" placeholder="Nama" value="<?= $detail_akun->nama_pelanggan ?>">
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input name="email" class="form-control" placeholder="Email" value="<?= $detail_akun->email ?>">
                </div>

                <div class="form-group">
                    <label>Password baru</label>
                    <input type="password" name="new_password" minlength="8" class="form-control" placeholder="Password" value="<?= set_value('new_password') ?>">
                </div>
                <div class="form-group">
                    <label>Ulangi password baru</label>
                    <input type="password" name="ulangi_password_baru" minlength="8" class="form-control" placeholder="Password" value="<?= set_value('ulangi_password_baru') ?>">
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Foto Akun</label>
                            <input type="file" name="image" class="form-control" id="preview_image">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <img src="<?= base_url('assets/image_pelanggan/' . $detail_akun->image) ?>" id="image_load" width="400px">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <a href="<?= base_url('home') ?>" class="btn btn-success btn-sm">Kembali</a>
                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                </div>


                <?php echo form_close() ?>
            </div>
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