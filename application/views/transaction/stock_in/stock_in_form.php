<section class="content-header">
    <h1>Barang
        <small>Barang Masuk     </small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Barang</li>
        <li class="active">Barang Masuk</li>
    </ol>
</section>

<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Tambah Barang Masuk</h3>
            <div class="pull-right">
                <a href="<?= site_url('stock/in'); ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i>back
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <form action="<?= site_url('Stock/process'); ?>" method="POST">
                    <input type="hidden" name="item_id" id="item_id">
                    <div class="form-group">
                        <label for="">Tanggal *</label>
                        <input type="date" name="date" id="date" class="form-control" value="<?= date('Y-m-d'); ?>" required>
                    </div>
                    <div>
                        <label for="">No Seri</label>
                    </div>
                    <div class="form-group input-group">
                        <input type="text" name="barcode" id="barcode" class="form-control" placeholder="No Seri" readonly required>
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-info btn-flat toggle" data-toggle="modal" data-target="#exampleModal">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Barang *</label>
                        <input type="text" name="item_name" id="item_name" class="form-control" class="form-control" placeholder="Nama Barang" readonly required>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-8">
                                <label for="">Ruangan</label>
                                <input type="text" name="unit_name" id="unit_name" value="-" class="form-control" required readonly>
                            </div>
                            <div class="col-md-4">
                                <label for="">Stock Awal</label>
                                <input type="text" name="stock" id="stock" value="-" class="form-control" required readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Detail *</label>
                        <textarea name="detail" id="detail" class="form-control" placeholder="Keterangan" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Jumlah *</label>
                        <input type="number" name="qty" id="qty" class="form-control" placeholder="Jumlah" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="in_add" class="btn btn-success"><i class="fa fa-paper-plane"></i></button>
                        <button type="reset" class="btn btn-danger"><i class="fa fa-undo"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- Toggle -->
<div class="modal fade" id="exampleModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="submit" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Pilih Produk Barang</h4>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-striped" id="dataTables">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th class="text-center">No Seri</th>
                            <th class="text-center">Nama Barang</th>
                            <th class="text-center">Ruangan</th>
                            <th class="text-center">Harga</th>
                            <th class="text-center">Jumlah</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($item as $key => $data) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $data->barcode ?></td>
                                <td><?= $data->name ?></td>
                                <td class="text-center"><?= $data->unit_name ?></td>
                                <td class="text-right"><?= indo_currency($data->price); ?></td>
                                <td class="text-center"><?= $data->stock ?></td>
                                <td class="text-center">
                                    <button class="btn btn-primary btn-sm" name="in_add" id="select_modal" data-id="<?= $data->item_id; ?>" data-barcode="<?= $data->barcode; ?>" data-name="<?= $data->name; ?>" data-unit_name="<?= $data->unit_name; ?>" data-price="<?= $data->price; ?>" data-stock="<?= $data->stock; ?>"><i class="fa fa-check"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php } ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $(document).on('click', '#select_modal', function() {
            var item_id = $(this).data('id');
            var barcode = $(this).data('barcode');
            var name = $(this).data('name');
            var unit_name = $(this).data('unit_name');
            var stock = $(this).data('stock');

            $('#item_id').val(item_id);
            $('#barcode').val(barcode);
            $('#item_name').val(name);
            $('#unit_name').val(unit_name);
            $('#stock').val(stock);
            $('#exampleModal').modal('hide');
        })
    });
</script>