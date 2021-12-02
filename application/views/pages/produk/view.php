<div class="content">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title text-uppercase">Daftar menu</strong>
                <div class="float-right text-white">
                    <a class="btn btn-sm btn-primary pull-right mr-4" data-toggle="modal" data-target="#modalAdd">
                        <i class="fa fa-plus text-white"></i> Tambah menu
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table class="table text-capitalize table-responsive-sm  table-striped table-hover text-center" id="dataTable">
                    <thead>
                        <tr>
                            <th rowspan="2">No</th>
                            <th rowspan="2">Nama menu</th>
                            <th rowspan="2">kategori</th>
                            <th rowspan="2">harga</th>
                            <th rowspan="2">tersedia</th>
                            <?php if($this->session->userdata('level')=='admin'): ?>
                            <th colspan="2">Aksi</th>
                        </tr>
                        <tr style="display: none">
                            <th></th>
                            <th></th>
                        </tr>
                        <?php endif ?>
                    </thead>
                    <?php $i = 1 ?>
                    <tbody>
                        <?php foreach ($produk as $data) : ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $data->nama_produk ?></td>
                                <td><?= $data->nama_kategori ?></td>
                                <td><?= number_format($data->harga) ?></td>
                                <td>
                                    <?php if ($data->status == 1) : ?>
                                        <i class="fa fa-check text-success"></i>
                                    <?php else : ?>
                                        <i class="fa fa-times text-danger"></i>
                                    <?php endif ?>
                                </td>
                                <?php if($this->session->userdata('level')=='admin'): ?>
                                <td>
                                    <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#m<?= $data->id_produk ?>">
                                        <i class="fa fa-edit text-white"></i>
                                    </button>
                                </td>
                                <td>
                                    <form action="<?= site_url('delete-produk') ?>" method="post">
                                        <input type="hidden" name="id" value="<?= $data->id_produk ?>">
                                        <button class="btn btn-sm btn-danger hapus-data">
                                            <i class="fa fa-trash text-white"></i>
                                        </button>
                                    </form>
                                </td>
                                <?php endif ?>
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
        <div class="modal-content border border-primary">
            <div class="modal-header">
                <h5 class="modal-title" id="addCarouselLabel">
                    Tambah Menu
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </h5>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('save-produk') ?>" method="post">
                    <div class="form-group">
                        <label for="nama_menu">
                            Nama Menu
                        </label>
                        <input type="text" name="nama_menu" id="nama_menu" class="form-control" />
                        <div class="text-danger small">
                            <?= form_error('nama_menu') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="kategori">
                            Kategori
                        </label>
                        <select name="kategori" id="kategori" class="form-control">
                            <option value="p"> ==PILIH== </option>
                            <?php foreach ($kategori as $key) : ?>
                                <option value="<?= $key->id_kategori ?>">
                                    <?= $key->nama_kategori ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                        <div class="text-danger small">
                            <?= form_error('kategori') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="harga">
                            Harga
                        </label>
                        <input type="text" name="harga" id="harga" class="form-control" />
                        <div class="text-danger small">
                            <?= form_error('harga') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="status">
                            Tersedia ?
                        </label>
                        <select name="status" id="status" class="form-control">
                            <option> ==PILIH== </option>
                            <option value="1">Ya</option>
                            <option value="0">Tidak</option>
                        </select>
                        <div class="text-danger small">
                            <?= form_error('status') ?>
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
<?php foreach ($produk as $key) : ?>
    <div class="modal fade" id="m<?= $key->id_produk ?>" tabindex="-1" role="dialog" aria-labelledby="addCarouselLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCarouselLabel">
                        Edit <?= $key->nama_produk ?>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </h5>
                </div>
                <div class="modal-body">
                    <form action="<?= site_url('update-produk') ?>" method="post">
                        <input type="hidden" name="id" value="<?= $key->id_produk ?>">
                        <div class="form-group">
                            <label for="nama_menu">
                                Nama Menu
                            </label>
                            <input name="nama_menu" id="nama_menu" class="form-control" value="<?= $key->nama_produk ?>">
                            <div class="text-danger small">
                                <?= form_error('nama_menu') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nama_pengguna">
                                Nama produk
                            </label>
                            <select name="kategori" id="kategori" class="form-control">
                                <option>--PILIH--</option>
                                <?php foreach ($kategori as $value) : ?>
                                    <?php if ($value->id_kategori == $key->id_kategori) : ?>
                                        <option value="<?= $value->id_kategori ?>" selected>
                                            <?= $value->nama_kategori ?>
                                        </option>
                                        <?php continue ?>
                                    <?php endif ?>
                                    <option value="<?= $value->id_kategori ?>">
                                        <?= $value->nama_kategori ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                            <div class="text-danger small">
                                <?= form_error('level') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="harga">
                                Harga
                            </label>
                            <input name="harga" id="harga" class="form-control" value="<?= $key->harga ?>">
                            <div class="text-danger small">
                                <?= form_error('harga') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="status">
                                Tersedia ?
                            </label>
                            <select name="status" id="status" class="form-control">
                                <option>--PILIH--</option>
                                $status = [0,1];
                                <?php if ($key->status == 1) : ?>
                                    <option value="1" selected>Ya</option>
                                    <option value="0">Tidak</option>
                                <?php else : ?>
                                    <option value="1">Ya</option>
                                    <option value="0" selected>Tidak</option>
                                <?php endif ?>
                            </select>
                            <div class="text-danger small">
                                <?= form_error('level') ?>
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
            swal("Gagal", "<?= $this->session->flashdata('error') ?>", "error");
        });
    </script>
<?php endif ?>

<script>
    $('#dataTable').DataTable();
</script>