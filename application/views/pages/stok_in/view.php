<div class="content">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title text-uppercase">
                    Daftar Stok - in</strong>
                <div class="float-right text-white">
                    <a class="btn btn-sm btn-warning pull-right mr-4" href="<?=site_url('form-list-stok') ?>">
                        <i class="fa fa-undo text-white"></i> Kembali
                    </a>
                    <a class="btn btn-sm btn-primary pull-right mr-4" href="<?=site_url('stok') ?>">
                        <i class="fa fa-plus text-white"></i> Tambah stok
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table class="table text-capitalize table-responsive-sm  table-striped table-hover text-center" id="dataTable">
                    <thead>
                        <tr>
                            <th rowspan="2">No</th>
                            <th rowspan="2">Nama barang</th>
                            <th rowspan="2">harga</th>
                            <th rowspan="2">QTY</th>
                            <th rowspan="2">Unit</th>
                            <th colspan="2">Aksi</th>
                        </tr>
                        <tr style="display: none">
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php $i = 1 ?>
                    <tbody>
                        <?php foreach ($stok as $data) : ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $data->nama_barang ?></td>
                                <td><?= $data->harga ?></td>
                                <td><?= $data->qty ?></td>
                                <td><?= $data->unit ?></td>
                                <td>
                                    <form action="<?= site_url('edit-stok') ?>" method="post">
                                        <input type="hidden" name="id" value="<?= $data->id_pembelian ?>">
                                        <button class="btn btn-sm btn-warning">
                                            <i class="fa fa-pencil text-white"></i>
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <form action="<?= site_url('delete-stok') ?>" method="post">
                                        <input type="hidden" name="id" value="<?= $data->id_pembelian ?>">
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