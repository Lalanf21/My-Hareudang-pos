<div class="content">
    <!-- Animated -->
    <div class="animated fadeIn">
        <!-- Widgets  -->
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-1">
                                <i class="pe-7s-cash"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text" id="penghasilan">Rp.<span class="count">
                                            <?= $pendapatan  ?>
                                        </span>
                                    </div>
                                    <div class="stat-heading">Penghasilan hari ini</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-2">
                                <i class="pe-7s-cart"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count">
                                            <?= $total_penjualan ?>
                                        </span></div>
                                    <div class="stat-heading">Penjualan hari ini</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-1">
                                <i class="ti-stats-up"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><?= $terlaris ?></div>
                                    <div class="stat-heading">Barang terlaris</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <!-- <h4 class="box-title">Chandler</h4> -->
                        <div class="calender-cont widget-calender">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div><!-- /.card -->
            </div>
        </div>
    </div>
    <!-- .animated -->
</div>

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