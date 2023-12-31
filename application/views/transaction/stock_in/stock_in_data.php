<section class="content-header">
    <h1>Barang
        <small> Masuk</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Penyimpanan</li>
        <li class="active">Barang Masuk</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
<?php $this->view('messages') ?>

    <div class="box">
        <div class ="box-header">
            <h3 class="box-title">Data Barang Masuk</h3>
            <div class="pull-right">
                <a href="<?php echo site_url('stock/in/add')?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-plus"></i>Tambah Barang Masuk
                </a>
            </div>
        </div>
        <div class ="box-body  table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>No Seri</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Tanggal</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php $no = 1 ; 
                foreach($row as $key =>$data) { ?>
                     <tr>
                        <td style="width : 5%;"><?=$no++?>.</td>
                        <td><?php echo $data->barcode?></td>
                        <td><?php echo $data->item_name?></td>
                        <td class="text-center"><?php echo $data->qty?></td>
                        <td class="text-center"><?=indo_date($data->date)?></td>
                        <td class="text-center" width ="160px">
                             <a id="set_dtl" class="btn btn-default btn-xs" 
                             data-toggle="modal" data-target="#modal-detail"
                                data-barcode="<?= $data->barcode ?>" 
                                data-itemname="<?= $data->item_name ?>"
                                data-detail="<?= $data->detail ?>"
                                data-suppliername="<?= $data->supplier_name ?>"
                                data-qty="<?= $data->qty?>"
                                data-date="<?=indo_date($data->date)?>">
                                    <i class="fa fa-eye"></i>Detail
                                </a>
                                <a href="<?php echo site_url('stock/in/del/'.$data->stock_id.'/' .$data->item_id)?>" onclick="return confirm('Apakah Anda Yakin hapus data?')" class="btn btn-danger btn-xs">
                                    <i class="fa fa-trash"></i>Delete
                                </a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</section>

<div class="modal fade" id="modal-detail">
    <div class="modal-dialog modal-sm">
    <div class="modal-content">
            <div class="modal-header">
                <button type="submit" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Detail Barang Masuk</h4>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered no-margin">
                    <tbody>
                        <tr>
                            <th style="">No Seri</th>
                            <td><span id="barcode"></span></td>
                        </tr>
                        <tr>
                            <th>Nama Barang</th>
                            <td><span id="item_name"></span></td>
                        </tr>
                        <tr>
                            <th> Keterangan</th>
                            <td><span id="detail"></span></td>
                        </tr>   
                        <tr>
                            <th>Jumlah</th>
                            <td><span id="qty"></span></td>
                        </tr>
                        <tr>
                            <th>Tanggal</th>
                            <td><span id="date"></span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>  
<script>
    $(document).ready(function() {
        $(document).on('click', '#set_dtl', function() {
            var barcode = $(this).data('barcode');
            var itemname = $(this).data('itemname');
            var detail = $(this).data('detail');
            var suppliername = $(this).data('suppliername');
            var qty = $(this).data('qty');
            var date = $(this).data('date');

  
            $('#barcode').text(barcode);
            $('#item_name').text(itemname);
            $('#detail').text(detail);
            $('#supplier_name').text(suppliername);
            $('#qty').text(qty);
            $('#date').text(date);
            $('#detail').text(detail);
        })
    });
</script>