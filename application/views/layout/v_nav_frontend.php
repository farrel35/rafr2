<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
        <a href="<?= base_url() ?>" class="navbar-brand">
            <i class="fas fa-store text-primary"></i>
            <span class="brand-text font-weight-light"><b>RAFR VapeStore</b></span>
        </a>

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="<?= base_url() ?>" class="nav-link">Home</a>
                </li>
                <?php $kategori = $this->m_home->get_allData_Kategori(); ?>
                <li class="nav-item dropdown">
                    <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Kategori</a>
                    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                        <?php foreach ($kategori as $key => $value) { ?>
                            <li><a href="<?= base_url('home/kategori/' . $value->id_kategori) ?>" class="dropdown-item"><?= $value->nama_kategori ?></a></li>
                        <?php } ?>
                    </ul>
                </li>
            </ul>
        </div>

        <!-- Right navbar links -->
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
            <?php
            $keranjang = $this->cart->contents();
            $jml_item = 0;
            foreach ($keranjang as $key => $value) {
                $jml_item = $jml_item + $value['qty'];
            }
            ?>
            <!-- Keranjang Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="badge badge-danger navbar-badge"><?= $jml_item ?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <?php if (empty($keranjang)) { ?>
                        <a href="#" class="dropdown-item">
                            <p>Keranjang Belanja Kosong</p>
                        </a>
                        <?php } else {
                        // <!-- Keranjang Start -->
                        foreach ($keranjang as $key => $value) {
                            $barang = $this->m_home->get_detailBarang($value['id']);
                        ?>
                            <a href="#" class="dropdown-item">
                                <div class="media">
                                    <img src="<?= base_url('assets/image/' . $barang->image) ?>" class="img-size-50 mr-3">
                                    <div class="media-body">
                                        <h3 class="dropdown-item-title">
                                            <?= $value['name'] ?>
                                        </h3>
                                        <p class="text-sm"><?= $value['qty'] ?> x Rp <?= number_format($value['price'], 0, ",", ".") ?></p>
                                        <p class="text-sm text-muted"><i class="fa fa-calculator"></i> Rp <?= number_format($value['subtotal'], 0, ",", ".") ?></p>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                        <?php } ?>
                        <a href="#" class="dropdown-item">
                            <div class="media">
                                <div class="media-body">
                                    <tr>
                                        <td colspan="2"> </td>
                                        <td class="right"><strong>Total : </strong></td>
                                        <td class="right">Rp <?= number_format($this->cart->total(), 0, ",", ".") ?></td>
                                    </tr>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="<?= base_url('keranjang') ?>" class="dropdown-item dropdown-footer">Keranjang</a>
                        <a href="<?= base_url('keranjang/checkout') ?>" class="dropdown-item dropdown-footer">Checkout</a>
                    <?php } ?>
                    <!-- Keranjang End -->
                </div>
            </li>

            <!-- User Dropdown Menu -->
            <li class="nav-item dropdown">
                <?php if ($this->session->userdata('email') == "") { ?>
                    <a class="nav-link" href="<?= base_url('pelanggan/login') ?>">
                        <span class="brand-text font-weight-light">Login</span>
                        <img src="<?= base_url() ?>template/dist/img/user3-128x128.jpg" alt="" class="brand-image img-circle elevation-3" style="opacity: .8; width:35px; height:35px; object-fit:cover">
                    </a>
                <?php } else { ?>
                    <?php if ($this->session->userdata('image') == "") { ?>
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            <span class="brand-text font-weight-light"><?= $this->session->userdata('nama_pelanggan') ?></span>
                            <img src="<?= base_url() ?>template/dist/img/user3-128x128.jpg" alt="" class="brand-image img-circle elevation-3" style="opacity: .8; width:35px; height:35px; object-fit:cover">
                        </a>
                    <?php } else { ?>
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            <span class="brand-text font-weight-light"><?= $this->session->userdata('nama_pelanggan') ?></span>
                            <img src="<?= base_url('assets/image_pelanggan/') . $this->session->userdata('image') ?>" alt="" class="brand-image img-circle elevation-3" style="opacity: .8; width:35px; height:35px; object-fit:cover">
                        </a>
                    <?php } ?>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <div class="dropdown-divider"></div>
                        <a href="<?= base_url('pelanggan/akun/' . $this->session->userdata('id_pelanggan')) ?>" class="dropdown-item">
                            <i class="fas fa-user"></i> Akun Saya
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="<?= base_url('pesanan_saya') ?>" class="dropdown-item">
                            <i class="fas fa-shopping-cart"></i> Pesanan Saya
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="<?= base_url('pelanggan/logout') ?>" class="dropdown-item dropdown-footer">Logout</a>
                    </div>

                <?php } ?>
            </li>
        </ul>
    </div>
</nav>
<!-- /.navbar -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= $title ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>">RAFR VapeStore</a></li>
                        <li class="breadcrumb-item"><a href="#"><?= $title ?></a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="content">
        <div class="container">