<div class="content">
    <div class="col-md-12">
        <div class="card border border-primary">
            <div class="card-header text-uppercase">
                <strong>Form Edit Stok-in</strong>
                <div class="float-right text-white">
                    <a class="btn btn-sm btn-warning pull-right mr-4" href="<?= site_url('stok') ?>">
                        <i class="fa fa-undo"></i> Kembali
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <form action="<?= site_url('update-stok') ?>" method="post">
                            <div class="form-group">
                                <input type="text" name="tanggal" id="tanggal" class="form-control" readonly value="<?= tanggal_indo($stok->tanggal)?>" />
                                <input type="hidden" name="id" value="<?= $stok->id_pembelian ?>">
                                <div class="text-danger small">
                                    <?= form_error('tanggal') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama_barang">
                                    nama barang
                                </label>
                                <input type="text" name="nama_barang" class="form-control" value="<?= $stok->nama_barang ?>" />
                                <div class="text-danger small">
                                    <?= form_error('nama_barang') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="harga">
                                    Harga
                                </label>
                                <input type="text" name="harga" id="harga" class="form-control" value="<?= $stok->harga ?>" />
                                <div class="text-danger small">
                                    <?= form_error('harga') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="qty">
                                    qty
                                </label>
                                <input type="text" name="qty" id="qty" class="form-control" value="<?= $stok->qty ?>" />
                                <div class="text-danger small">
                                    <?= form_error('qty') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="unit">
                                    unit
                                </label>
                                <input type="text" name="unit" id="unit" class="form-control" value="<?= $stok->unit ?>" />
                                <small class="form-text text-muted">
                                    Kilogram, Ons, Liter, Dsb
                                </small>
                                <div class="text-danger small">
                                    <?= form_error('unit') ?>
                                </div>
                            </div>
                            <div class="card-link">
                                <button type="reset" class="btn btn-danger pull-right">
                                    <i class="fa fa-ban"></i> Reset
                                </button>
                                <button type="submit" class="btn mr-3 btn-primary pull-right">
                                    <i class="fa fa-dot-circle-o"></i> Simpan
                                </button>
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