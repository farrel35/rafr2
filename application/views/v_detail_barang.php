<!-- Default box -->
<div class="row">
    <div class="col-lg-12">
        <div class="card card-solid">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <h3 class="d-inline-block d-sm-none"><?= $barang->nama_barang ?></h3>
                        <div class="col-12">
                            <img src="<?= base_url('assets/image/' . $barang->image) ?>" class="product-image" alt="Product Image">
                        </div>
                        <div class="col-12 product-image-thumbs">
                            <div class="product-image-thumb active"><img src="<?= base_url('assets/image/' . $barang->image) ?>" alt="Product Image"></div>
                            <?php foreach ($image as $key => $value) { ?>
                                <div class="product-image-thumb"><img src="<?= base_url('assets/image_barang/' . $value->image) ?>" alt="Product Image"></div>
                            <?php } ?>

                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <h3 class="my-3"><?= $barang->nama_barang ?></h3>
                        <hr>
                        <h5><?= $barang->nama_kategori ?></h5>
                        <hr>
                        <p><?= nl2br($barang->deskripsi) ?></p>
                        <hr>
                        <div class="bg-gray py-2 px-3 mt-4">
                            <h2 class="mb-0">
                                Rp <?= number_format($barang->harga, 0, ",", "."); ?>
                            </h2>
                        </div>
                        <hr>
                        <?php
                        echo form_open('keranjang/add');
                        echo form_hidden('id', $barang->id_barang);
                        echo form_hidden('price', $barang->harga);
                        echo form_hidden('name', $barang->nama_barang);
                        echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()))
                        ?>
                        <div class="mt-4">
                            <div class="row">
                                <div class="col-sm-2">
                                    <input type="number" name="qty" class="form-control" value="1" min="1">
                                </div>
                                <div class="col-sm-8">
                                    <button type="submit" class="btn btn-primary btn-flat swalDefaultSuccess">
                                        <i class="fas fa-cart-plus fa-lg mr-2"></i>
                                        Add to Cart
                                    </button>
                                </div>
                            </div>
                        </div>
                        <?php
                        echo form_close();
                        ?>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card card-solid">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <?php if ($this->session->userdata('nama_pelanggan') != '') : ?>

                            <div class="rating">
                                <button class="btn btn-default btn-sm" data-rating="1"><i class="fa fa-star"></i></button>
                                <button class="btn btn-default btn-sm" data-rating="2"><i class="fa fa-star"></i></button>
                                <button class="btn btn-default btn-sm" data-rating="3"><i class="fa fa-star"></i></button>
                                <button class="btn btn-default btn-sm" data-rating="4"><i class="fa fa-star"></i></button>
                                <button class="btn btn-default btn-sm" data-rating="5"><i class="fa fa-star"></i></button>
                            </div>

                            <div class="form-group">
                                <label for="review">Ulasan:</label>
                                <textarea class="form-control" id="review" name="review" rows="4"></textarea>
                            </div>

                            <button type="button" class="btn btn-primary" id="submit-review">Submit Ulasan</button>
                        <?php endif; ?>
                        <?php if (!empty($rating)) : ?>
                            <h4 class="my-3">Customer Review</h4>
                            <table class="table table-striped projects">
                                <thead>
                                    <tr>
                                        <th style="width: 10%">
                                            Nama
                                        </th>
                                        <th style="width: 10%">
                                            Rating
                                        </th>
                                        <th style="width: 10%">
                                            Ulasan
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($rating as $ratings) { ?>
                                        <tr>
                                            <td>
                                                <?= $ratings->nama_pelanggan ?>
                                            </td>
                                            <td>
                                                <?php
                                                $star = $ratings->star; // Rating dari database (ganti ini dengan rating sesuai data dari database)
                                                for ($i = 1; $i <= 5; $i++) {
                                                    if ($i <= $star) {
                                                        echo '<i class="fa fa-star text-warning"></i>'; // Tampilkan bintang yang diberi warna
                                                    } else {
                                                        echo '<i class="fa fa-star text-secondary"></i>'; // Tampilkan bintang yang tidak diberi warna
                                                    }
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?= $ratings->review ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        <?php else : ?>
                            <h3>Tidak ada ulasan.</h3>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<script>
    $(document).ready(function() {
        $('.rating button').on('click', function() {
            var rating = $(this).data('rating');
            $('.rating button').removeClass('btn-warning').addClass('btn-default');
            $('.rating button:lt(' + rating + ')').removeClass('btn-default').addClass('btn-warning');
        });

        $('#submit-review').on('click', function() {
            var star = $('.rating button.btn-warning').length;
            var review = $('#review').val();

            // Validasi ulasan sebelum mengirim
            if (review === '') {
                alert('Ulasan tidak boleh kosong.');
                return;
            }

            // Kirim data rating dan ulasan ke server menggunakan AJAX
            $.ajax({
                url: '<?= base_url('rating/submit') ?>', // Ganti dengan URL controller untuk menyimpan ulasan
                method: 'POST',
                data: {
                    item_id: <?= $barang->id_barang ?>,
                    nama_pelanggan: '<?= $this->session->userdata('nama_pelanggan') ?>',
                    star: star,
                    review: review
                },
                success: function(response) {
                    // Handle success response
                    console.log(response);
                    // Clear the review textarea or perform other actions as needed
                    $('#review').val('');
                    setTimeout(function() {
                        location.reload();
                    }, 100);
                },
                error: function(xhr, status, error) {
                    // Handle error response
                    console.error(error);
                }

            });
        });
    });
</script>

</script>

<!-- SweetAlert2 -->
<script src="<?= base_url() ?>template/plugins/sweetalert2/sweetalert2.min.js"></script>
<script>
    $(function() {
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        $('.swalDefaultSuccess').click(function() {
            Toast.fire({
                icon: 'success',
                title: 'Barang berhasil ditambahkan ke keranjang'
            })
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('.product-image-thumb').on('click', function() {
            var $image_element = $(this).find('img')
            $('.product-image').prop('src', $image_element.attr('src'))
            $('.product-image-thumb.active').removeClass('active')
            $(this).addClass('active')
        })
    })
</script>