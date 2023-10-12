<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="<?= base_url() ?>assets/slider/slider1.jpg" alt="First slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="<?= base_url() ?>assets/slider/slider2.jpg" alt="Second slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="<?= base_url() ?>assets/slider/slider3.jpg" alt="Third slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="<?= base_url() ?>assets/slider/slider4.jpg" alt="Fourth slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="<?= base_url() ?>assets/slider/slider5.jpg" alt="Fifth slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-custom-icon" aria-hidden="true">
            <i class="fas fa-chevron-left"></i>
        </span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-custom-icon" aria-hidden="true">
            <i class="fas fa-chevron-right"></i>
        </span>
        <span class="sr-only">Next</span>
    </a>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card card-solid">
            <div class="card-body pb-0">
                <div class="row">
                    <?php foreach ($barang as $key => $value) { ?>
                        <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                            <a href="<?= base_url('home/detail_barang/' . $value->id_barang) ?>" style="text-decoration: none; color: #333; transition: transform 0.2s; transform-origin: center;" onmouseover="this.style.transform='scale(1.03)'" onmouseout="this.style.transform='scale(1)'">
                                <div class="card bg-light d-flex flex-fill">
                                    <div class="card-header text-muted border-bottom-0">
                                        <h2 class="lead"><b><?= $value->nama_barang ?></b></h2>
                                        <p class="text-muted text-sm">Kategori: <?= $value->nama_kategori ?></p>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="row">
                                            <div class="col-12 text-center">
                                                <img src="<?= base_url('assets/image/' . $value->image) ?>" class="img-fluid" style="width: 250px; height: 250px; object-fit: cover;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="text-left">
                                                    <h4><span class="badge bg-primary">Rp <?= number_format($value->harga, 0, ",", ".") ?></span>
                                                    </h4>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="text-right">
                                                    <?php
                                                    $averageRating = $this->m_rating->get_average_rating($value->id_barang);

                                                    if ($averageRating !== null) {
                                                        echo '<div class="rating">';

                                                        for ($i = 1; $i <= 5; $i++) {
                                                            if ($i <= $averageRating) {
                                                                // Bintang penuh
                                                                echo '<i class="fa fa-star text-warning"></i>';
                                                            } else {
                                                                if ($i - 0.5 <= $averageRating) {
                                                                    // Setengah bintang
                                                                    echo '<i class="fa fa-star-half-alt text-warning"></i>';
                                                                } else {
                                                                    // Bintang kosong
                                                                    echo '<i class="fa fa-star text-secondary"></i>';
                                                                }
                                                            }
                                                        }

                                                        echo '</div>';
                                                    } else {
                                                        echo '<span>Belum ada rating</span>';
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <!-- /.col-md-6 -->
</div>
