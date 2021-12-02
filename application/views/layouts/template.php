<!doctype html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title ?></title>
    <meta name="description" content="HareudangAdmin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/img/logo-icon.png') ?>">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url('assets/css/cs-skin-elastic.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

    <!-- dataTable css-->
    <link rell="stylesheet" href="<?= base_url('assets/css/dataTables.bootstrap.min.css') ?>">

    <!-- js -->
    <script src="<?= base_url('assets/js/jquery.js') ?>"></script>
    <script src="<?= base_url('assets/js/priceFormat.js') ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/js/lib/data-table/datatables.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/lib/data-table/dataTables.bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/lib/data-table/dataTables.buttons.min.js') ?>"></script> -->
    <script src="<?= base_url('assets/js/sweet_alert.js') ?>"></script>

</head>

<body>
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <!-- menu admin -->
                <?php if ($this->session->userdata('level') == 'admin') : ?>
                    <ul class="nav navbar-nav text-capitalize">
                        <div class="card-body">
                            <h4 class="text-sm-center">
                                <?= $this->session->userdata('level') ?>
                            </h4>
                            <hr>
                        </div>
                        <li>
                            <a href="<?= site_url('') ?>"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                        </li>
                        <li class="menu-title">menu</li><!-- /.menu-title -->
                        <li class="">
                            <a href="<?= site_url('list-produk') ?>"> <i class="menu-icon fa fa-list"></i>Lihat menu</a>
                        </li>
                        <li class="">
                            <a href="<?= site_url('list-kategori') ?>"> <i class="menu-icon fa fa-list-alt"></i>Kategori menu</a>
                        </li>

                        <li class="menu-title">Transaksi</li><!-- /.menu-title -->
                        <li class="">
                            <a href="<?= site_url('transaksi') ?>"> <i class="menu-icon fa fa-exchange"></i>Transaksi</a>
                        </li>
                        <li class="">
                            <a href="<?= site_url('stok') ?>"> <i class="menu-icon fa fa-arrow-circle-o-left"></i>Stok - in</a>
                        </li>
                        <li class="">
                            <a href="<?= site_url('tabungan') ?>"> <i class="menu-icon fa fa-credit-card"></i>Tabungan</a>
                        </li>

                        <li class="menu-title">Laporan</li><!-- /.menu-title -->
                        <li class="">
                            <a href="#"> <i class="menu-icon fa fa-money"></i> penjualan</a>
                        </li>
                        <li class="">
                            <a href="<?=site_url('form-list-stok') ?>"> <i class="menu-icon fa fa-shopping-cart"></i> pembelian</a>
                        </li>

                        <li class="menu-title">Akun</li><!-- /.menu-title -->
                        <li class="">
                            <a href="<?= site_url('list-user') ?>"> <i class="menu-icon fa fa-users"></i>List user</a>
                        </li>
                        <li class="">
                            <a href="#" data-toggle="modal" data-target="#logout"> <i class="menu-icon fa fa-power-off"></i>Logout</a>
                        </li>
                    </ul>
                <?php endif ?>
                <!-- akhir menu admin -->

                <!-- menu kasir -->
                <?php if ($this->session->userdata('level') == 'kasir') : ?>
                    <ul class="nav navbar-nav text-capitalize">
                        <div class="card-body">
                            <h4 class="text-sm-center">
                                <?= $this->session->userdata('level') ?>
                            </h4>
                            <hr>
                        </div>
                        <li class="menu-title">menu</li><!-- /.menu-title -->
                        <li class="">
                            <a href="<?= site_url('list-produk') ?>"> <i class="menu-icon fa fa-list"></i>Lihat menu</a>
                        </li>

                        <li class="menu-title">Transaksi</li><!-- /.menu-title -->
                        <li class="">
                            <a href="<?= site_url('transaksi') ?>"> <i class="menu-icon fa fa-exchange"></i>Transaksi</a>
                        </li>
                        <li class="menu-title">Akun</li><!-- /.menu-title -->
                        <li class="">
                            <a href="#" data-toggle="modal" data-target="#logout"> <i class="menu-icon fa fa-power-off"></i>Logout</a>
                        </li>
                    </ul>
                <?php endif ?>
                <!-- akhir menu kasir -->
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="./"> Hareudang POS </a>
                    <a class="navbar-brand hidden" href="./"> H POS </a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <p class="my-3 pull-right"><?= tanggal_indo(date('Y-m-d')) ?> pukul <?= date('H:i') ?></p>
            </div>
        </header>
        <!-- /#header -->

        <!-- Content -->
        <?php $this->load->view($konten) ?>
        <!-- /.content -->

        <div class="clearfix"></div>
    </div>
    <!-- /#right-panel -->

    <!-- modal Logout -->
    <div class="modal fade" id="logout" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="logoutLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutLabel">Anda yakin ?
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </h5>
                </div>
                <div class="modal-body">
                    <p class="text-center">
                        Klik Logout di bawah untuk melanjutkan
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <a href="<?= site_url('logout') ?>" class="btn btn-danger">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- akhir modal Logout -->

    <!-- Scripts -->

    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="<?= base_url('assets/js/main.js') ?>"></script>

    <!--  Chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

    <!--Chartist Chart-->
    <script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
    <script src="<?= base_url('assets/js/init/fullcalendar-init.js') ?>"></script>


    <!-- Local Stuff -->
    <script>
        $('.hapus-data').on('click', function(e) {
            e.preventDefault();
            const form = $(this).parents('form');
            swal({
                    title: "Anda yakin ?",
                    text: "Data akan di hapus jika dilanjutkan",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) form.submit();
                });
        });
    </script>
</body>

</html>