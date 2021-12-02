<div class="content">
    <div class="col-md-12">
        <div class="card border border-primary">
            <div class="card-header text-uppercase">
                <strong>PIlih Tanggal</strong>
            </div>
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <form action="<?= site_url('list-stok') ?>" method="post">
                            <div class="form-group">
                                <label for="tanggal_awal">
                                    Tanggal awal
                                </label>
                                <input type="date" name="tanggal_awal" id="tanggal_awal" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="tanggal_akhir">
                                    Tanggal akhir
                                </label>
                                <input type="date" name="tanggal_akhir" id="tanggal_akhir" class="form-control" />
                            </div>
                            <div class="card-link">
                                <button type="submit" class="btn mr-3 btn-primary pull-right">
                                    <i class="fa fa-send"></i> Proses...
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
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