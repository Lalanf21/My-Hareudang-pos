<div class="content">
    <div class="col-md-12">
        <div class="card border border-primary">
            <div class="card-header">
                <strong class="card-title text-uppercase">Daftar tabungan</strong>
                <div class="float-right text-white">
                    <a class="btn btn-sm btn-primary pull-right mr-4" data-toggle="modal" data-target="#modalAdd">
                        <i class="fa fa-plus text-white"></i> Tambah
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-responsive-sm  table-striped table-hover text-center" id="dataTable" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>tanggal</th>
                            <th>jumlah</th>
                            <th colspan="2">Aksi</th>
                        </tr>
                    </thead>
                    <?php $i = 1 ?>
                    <tbody>
                        <?php foreach ($tabungan as $data) : ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= tanggal_indo($data->tanggal) ?></td>
                                <td><?= $data->jumlah ?></td>
                                <td>
                                    <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#m<?= $data->id_tabungan ?>">
                                        <i class="fa fa-edit text-white"></i>
                                    </button>
                                </td>
                                <td>
                                    <form action="<?= site_url('delete-tabungan') ?>" method="post">
                                        <input type="hidden" name="id" value="<?= $data->id_tabungan ?>">
                                        <button class="btn btn-sm btn-danger hapus-data">
                                            <i class="fa fa-trash text-white"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- modal add -->
<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="addCarouselLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCarouselLabel">
                    Tambah data
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('save-tabungan') ?>" method="post">
                    <div class="form-group">
                        <label for="tanggal">
                            Tanggal
                        </label>
                        <input type="text" name="tanggal" id="tanggal" class="form-control" readonly value="<?= date('Y-m-d') ?>" />
                        <div class="text-danger small">
                            <?= form_error('tanggal') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="jumlah">
                            jumlah
                        </label>
                        <input type="text" name="jumlah" id="jumlah" class="form-control" />
                        <div class="text-danger small">
                            <?= form_error('jumlah') ?>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-save"> Simpan</i>
                </button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- akhir modal add -->

<!-- modal update data -->
<?php foreach ($tabungan as $key) : ?>
    <div class="modal fade" id="m<?= $key->id_tabungan ?>" tabindex="-1" role="dialog" aria-labelledby="addCarouselLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCarouselLabel">
                        Edit data
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= site_url('update-tabungan') ?>" method="post">
                        <input type="hidden" name="id" value="<?= $key->id_tabungan ?>">
                        <div class="form-group">
                            <label for="tanggal">
                                Tanggal
                            </label>
                            <input type="text" name="tanggal" id="tanggal" class="form-control" readonly value="<?= $key->tanggal ?>" />
                            <div class="text-danger small">
                                <?= form_error('tanggal') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="jumlah">
                                jumlah
                            </label>
                            <input type="text" name="jumlah" id="jumlah" class="form-control" value="<?= $key->jumlah ?>" />
                            <div class="text-danger small">
                                <?= form_error('jumlah') ?>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-warning">
                        <i class="fa fa-edit"> Edit</i>
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach ?>
<!-- akhir modal update data -->

<?php if ($this->session->flashdata('success')) : ?>
    <script type="text/javascript">
        $(function() {
            swal("Berhasil", "<?= $this->session->flashdata('success') ?>", "success");
        });
    </script>
<?php elseif ($this->session->flashdata('error')) : ?>
    <script type="text/javascript">
        $(function() {
            swal("gagal", "<?= $this->session->flashdata('error') ?>", "error");
        });
    </script>
<?php endif ?>