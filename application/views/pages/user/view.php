<div class="content">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title text-uppercase">User</strong>
                <div class="float-right text-white">
                    <a class="btn btn-sm btn-primary pull-right mr-4" data-toggle="modal" data-target="#modalAdd">
                        <i class="fa fa-plus text-white"></i> Tambah user
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table class="table text-capitalize table-responsive-sm  table-striped table-hover text-center" id="dataTable">
                    <thead>
                        <tr>
                            <th rowspan="2">No</th>
                            <th rowspan="2">Nama user</th>
                            <th rowspan="2">level</th>
                            <th rowspan="2">status</th>
                            <th colspan="2">Aksi</th>
                        </tr>
                        <tr style="display: none">
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php $i = 1 ?>
                    <tbody>
                        <?php foreach ($user as $data) : ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $data->nama_user ?></td>
                                <td><?= $data->level ?></td>
                                <td>
                                    <?php if ($data->status == 1) : ?>
                                        <i class="fa fa-check text-success"></i>
                                    <?php else : ?>
                                        <i class="fa fa-times text-danger"></i>
                                    <?php endif ?>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#m<?= $data->id_user ?>">
                                        <i class="fa fa-edit text-white"></i>
                                    </button>
                                </td>
                                <td>
                                    <form action="<?= site_url('delete-user') ?>" method="post">
                                        <input type="hidden" name="id" value="<?= $data->id_user ?>">
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
        <div class="modal-content border border-primary">
            <div class="modal-header">
                <h5 class="modal-title" id="addCarouselLabel">
                    Tambah User
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </h5>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('save-user') ?>" method="post">
                    <div class="form-group">
                        <label for="nama_user">
                            Nama User
                        </label>
                        <input type="text" name="nama_user" id="nama_user" class="form-control" />
                        <div class="text-danger small">
                            <?= form_error('nama_user') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password">
                            password
                        </label>
                        <input type="password" name="password1" class="form-control">
                        <div class="text-danger small">
                            <?= form_error('password') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password2">
                            Konfirmasi password
                        </label>
                        <input type="password" name="password2" class="form-control">
                        <div class="text-danger small">
                            <?= form_error('password2') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="level">
                            level
                        </label>
                        <select name="level" id="level" class="form-control">
                            <option value="#">==PILIH==</option>
                            <option value="admin">Admin</option>
                            <option value="kasir">Kasir</option>
                        </select>
                        <div class="text-danger small">
                            <?= form_error('level') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="status">
                            Aktif ?
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
<?php foreach ($user as $key) : ?>
    <div class="modal fade" id="m<?= $key->id_user ?>" tabindex="-1" role="dialog" aria-labelledby="addCarouselLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCarouselLabel">
                        Edit <?= $key->nama_user ?>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </h5>
                </div>
                <div class="modal-body">
                    <form action="<?= site_url('update-user') ?>" method="post">
                        <input type="hidden" name="id" value="<?= $key->id_user ?>">
                        <div class="form-group">
                            <label for="nama_user">
                                Nama User
                            </label>
                            <input type="text" name="nama_user" id="nama_user" class="form-control" value="<?= $key->nama_user ?>" />
                            <div class="text-danger small">
                                <?= form_error('nama_user') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="level">
                                level
                            </label>
                            <select name="level" id="level" class="form-control">
                                <option value="#">==PILIH==</option>
                                <?php if($key->level == 'admin'): ?>
                                <option value="admin" selected>Admin</option>
                                <option value="kasir">Kasir</option>
                                <?php else: ?>
                                    <option value="admin">Admin</option>
                                    <option value="kasir" selected>Kasir</option>
                                <?php endif ?>
                            </select>
                            <div class="text-danger small">
                                <?= form_error('level') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="status">
                                Aktif ?
                            </label>
                            <select name="status" id="status" class="form-control">
                                <option> ==PILIH== </option>
                                <?php if($key->status == '1'): ?>
                                <option value="1" selected>Ya</option>
                                <option value="0">Tidak</option>
                                <?php else: ?>
                                    <option value="1">Ya</option>
                                    <option value="0" selected>Tidak</option>
                                <?php endif ?>
                            </select>
                            <div class="text-danger small">
                                <?= form_error('status') ?>
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