<div class="content">
    <div class="col-md-12">
        <div class="card border border-primary">
            <div class="card-header">
                <strong class="card-title text-uppercase">Invoice</strong>
                <div class="float-right text-white">
                    <a href="<?= site_url('transaksi') ?>" class="btn btn-sm btn-warning pull-right mr-4">
                        <i class="fa fa-undo text-white"></i> Kembali
                    </a>
                </div>
            </div>
            <!-- akhir .card-header -->
            <div class="card-body">
                <form action="<?=site_url('simpan-transaksi') ?>" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <!-- <form action="" method="post"> -->
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">Atas Nama ?</div>
                                    <input class="form-control" id="nama_pelanggan" name="nama_pelanggan" autofocus>
                                </div>
                            </div>
                            <!-- </form> -->
                        </div>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Produk</th>
                                <th>Harga</th>
                                <th>Qty</th>
                                <th>Subtotal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($this->cart->contents() as $items) : ?>
                                <tr>
                                    <td>
                                        <?= $items['name'] ?>
                                    </td>
                                    <td><?= number_format($items['price']) ?></td>
                                    <td><?= $items['qty'] ?></td>
                                    <td><?= number_format($items['subtotal']) ?></td>
                                    <td><button type="button" id="<?= $items['rowid'] ?>" class="hapus_cart btn btn-danger btn-xs">Batal</button></td>
                                </tr>
                            <?php endforeach ?>
                            <tr>
                                <td colspan="3" align="right"><Strong>Total (RP)</Strong></td>
                                <td colspan="2">
                                    <input type="text" readonly value="<?= $this->cart->total() ?>" id="total" class="form-control" style="width: 100px;">

                                    <input type="hidden" name="total" id="total2" value="<?= $this->cart->total() ?>" name="total">
                                </td>
                            </tr>
                            <tr>
                                <td align="right" colspan="3"><Strong>Cash (Rp)</Strong></td>
                                <td colspan="2">
                                    <input type="text" class="form-control" style="width: 100px;" id="cash" name="cash">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" align="right"><strong>Kembalian (Rp)</strong></td>
                                <td colspan="2">
                                    <input type="text" readonly class="form-control input-sm" style="width: 100px;" id="kembalian" name="kembalian">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" align="right">
                                    <label for="print"><strong>Print ?</strong> </label>
                                    <input type="checkbox" id="print" name="print" value="ya" class="form-control-input">
                                </td>
                                <td colspan="2"></td>
                            </tr>
                        </tbody>
                    </table>
            </div>
            <!-- akhir .card-body -->
            <div class="card-link m-4">
                <button type="submit" class="btn btn-success pull-right">
                    <i class="fa fa-check"></i> Simpan
                </button>
            </div>
            <!-- akhir .card-link -->
            </form>
        </div>
        <!-- akhir .card -->
    </div>
    <!-- akhir .col -->
</div>
<!-- akhir .row -->

<script type="text/javascript">
    $(function() {
        $('#cash').on("input", function() {
            var total = $('#total2').val();
            var cash = $('#cash').val();
            var hsl = cash.replace(/[^\d]/g, "");
            $('#kembalian').val(hsl - total);
        })

        $('#total').priceFormat({
            prefix: '',
            centsLimit: 0,
            thousandsSeparator: ','
        });
    });
</script>

<script>
    $(document).on('click', '.hapus_cart', function() {
        var row_id = $(this).attr("id"); //mengambil row_id dari artibut id
        $.ajax({
            url: "<?= site_url('transaksi/hapus_cart') ?>",
            method: "POST",
            data: {
                row_id: row_id
            },
            success: function(data) {
                location.reload();
            }
        });
    });
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