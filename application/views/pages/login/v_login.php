<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/img/logo-icon.png') ?>">
    <title><?= $title ?></title>
    <!-- Custom CSS -->
    <link href="<?= base_url('assets/css/lib/login/style.min.css') ?>" rel="stylesheet">
</head>

<body>
    <div class="main-wrapper">
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative" style="background:url(<?= base_url('assets/img/auth-bg.jpg') ?>) no-repeat center center;">
            <div class="auth-box row">
                <div class="col-lg-7 col-md-5 modal-bg-img" style="background-image: url(<?= base_url('assets/img/login.jpg') ?>);">
                </div>
                <div class="col-lg-5 col-md-7 bg-white">
                    <div class="p-3">
                        <h2 class="mt-3 text-center">Login</h2>
                        <form action="<?= base_url('proses') ?>" class="mt-2" method="POST">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="text-dark" for="password">Username</label>
                                        <input type="text" id="username" name="username" class="form-control" placeholder="masukkan username" autofocus>
                                        <div class="text-danger small">
                                            <?= form_error('username') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="text-dark" for="password">password</label>
                                        <input type="password" id="password" name="password" class="form-control" placeholder="masukkan password">
                                        <div class="text-danger small">
                                            <?= form_error('password') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 text-center">
                                    <button type="submit" class="btn btn-block btn-dark">Login</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="<?= base_url('assets/js/jquery.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.bundle.js') ?>"></script>
    <script src="<?= base_url('assets/js/sweet_alert.js') ?>"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
        $(".preloader ").fadeOut();
    </script>
    <?php if ($this->session->flashdata('success')) : ?>
        <script type="text/javascript">
            $(function() {
                swal("Berhasil", "<?= $this->session->flashdata('success') ?>", "success");
            });
        </script>
    <?php elseif ($this->session->flashdata('error')) : ?>
        <script type="text/javascript">
            $(function() {
                swal("Gagal", "<?= $this->session->flashdata('error') ?>", "error");
            });
        </script>
    <?php endif ?>
</body>

</html>