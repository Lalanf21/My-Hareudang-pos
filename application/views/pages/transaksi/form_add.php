<div class="content">
    <div class="col-md-12">
        <div class="card border border-primary">
            <div class="card-header text-uppercase">
                <strong>Daftar Menu</strong>
                <a href="<?=site_url('show-cart') ?>" class="btn btn-success pull-right" >
                    <i class="fa fa-shopping-cart"></i>
                </a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <!-- akhir card-link -->
                            <div class="card-body">
                                <div class="custom-tab">
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <a class="nav-item nav-link active" id="minuman-tab" data-toggle="tab" href="#minuman" role="tab" aria-controls="minuman" aria-selected="true">Minuman</a>
                                            <a class="nav-item nav-link" id="topping-tab" data-toggle="tab" href="#topping" role="tab" aria-controls="topping" aria-selected="false">Topping</a>
                                            <a class="nav-item nav-link" id="makanan-tab" data-toggle="tab" href="#makanan" role="tab" aria-controls="makanan" aria-selected="false">Makanan</a>
                                        </div>
                                    </nav>
                                    <div class="tab-content pl-3 pt-2" id="nav-tabContent">

                                        <!-- Konten tab menu minuman -->
                                        <div class="tab-pane fade show" id="topping" role="tabpanel" aria-labelledby="topping-tab">
                                            <table class="table text-uppercase table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>NO</th>
                                                        <th>NAMA</th>
                                                        <th>HARGA (Rp)</th>
                                                        <th width="100px">QTY</th>
                                                        <th>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $no = 1; ?>
                                                    <?php foreach($topping as $data): ?>
                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <td><?= $data->nama_produk ?></td>
                                                        <td><?= number_format($data->harga) ?></td>
                                                        <td>
                                                            <input type="number" name="quantity" id="<?= $data->id_produk ?>" value="1" class="quantity form-control">
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-sm btn-primary add_cart" data-produkid="<?= $data->id_produk ?>" data-produknama="<?= $data->nama_produk ?>" data-produkharga="<?= $data->harga ?>">
                                                                <i class=" fa fa-plus text-white"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- akhir tab menu minuman -->

                                        <!-- konten menu topping -->
                                        <div class="tab-pane fade show active" id="minuman" role="tabpanel" aria-labelledby="minuman-tab">
                                            <table class="table text-uppercase table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>NO</th>
                                                        <th>NAMA</th>
                                                        <th>HARGA (Rp)</th>
                                                        <th width="100px">QTY</th>
                                                        <th>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $no = 1; ?>
                                                    <?php foreach($minuman as $data): ?>
                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <td><?= $data->nama_produk ?></td>
                                                        <td><?= number_format($data->harga) ?></td>
                                                        <td>
                                                            <input type="number" name="quantity" id="<?= $data->id_produk ?>" value="1" class="quantity form-control">
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-sm btn-primary add_cart" data-produkid="<?= $data->id_produk ?>" data-produknama="<?= $data->nama_produk ?>" data-produkharga="<?= $data->harga ?>">
                                                                <i class=" fa fa-plus text-white"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- akhir  menu topping-->

                                        <!-- konten menu makanan -->
                                        <div class="tab-pane fade" id="makanan" role="tabpanel" aria-labelledby="makanan-tab">
                                            <table class="table text-uppercase table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>NO</th>
                                                        <th>NAMA</th>
                                                        <th>HARGA (Rp)</th>
                                                        <th width="100px">QTY</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $noo=1 ?>
                                                    <?php foreach($makanan as $data): ?>
                                                    <tr>
                                                        <td><?= $noo++ ?></td>
                                                        <td><?= $data->nama_produk ?></td>
                                                        <td>
                                                            <?= number_format($data->harga) ?>
                                                        </td>
                                                        <td>
                                                            <input type="number" name="quantity" id="<?= $data->id_produk ?>" value="1" class="quantity form-control">
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-sm btn-primary add_cart" data-produkid="<?= $data->id_produk ?>" data-produknama="<?= $data->nama_produk ?>" data-produkharga="<?= $data->harga ?>">
                                                                <i class=" fa fa-plus text-white"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- akhir row tab -->
				<div class="card-link">
					<a href="<?=site_url('show-cart') ?>" class="btn btn-success pull-right" >
                    	<i class="fa fa-shopping-cart"></i>
                	</a>
            	</div>
				</div>
            </div>
            <!-- akhir card-body -->
        </div>
        <!-- akhir .card -->
    </div>
    <!-- akhir .col -->
</div>
<!-- akhir row -->


<!-- script cart -->
<script type="text/javascript">
    $(document).ready(function() {
        $('.add_cart').click(function() {
            var produk_id = $(this).data("produkid");
            var produk_nama = $(this).data("produknama");
            var produk_harga = $(this).data("produkharga");
            var quantity = $('#' + produk_id).val();
            $.ajax({
                url: "<?= site_url('add-cart') ?>",
                method: "POST",
                data: {
                    produk_id: produk_id,
                    produk_nama: produk_nama,
                    produk_harga: produk_harga,
                    quantity: quantity
                },
                success: function(data) {
                    location.reload();
                }
            });
        });
    });
</script>
<!-- akhir script cart -->

<!-- script Swal-->
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
<!-- skhir script Swal -->