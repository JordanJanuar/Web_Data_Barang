<section class="content-header">
    <h1>Barang
        <small> Keluar</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Penyimpanan</li>
        <li class="active">Barang Keluar</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
<?php $this->view('messages') ?>
    <div class="box">
        <div class ="box-header">
            <h3 class="box-title">Data Barang Keluar</h3>
            <div class="pull-right">
                <a href="<?php echo site_url('stock/out/add')?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-plus"></i>Tambah Barang Keluar
                </a>
            </div>
        </div>
        <div class ="box-body  table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No Seri</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Info</th>
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
                        <td><?php echo $data->name?></td>
                        <td class="text-right"><?php echo $data->qty?></td>
                        <td><?php echo $data->detail?></td>
                        <td class="text-center"><?=indo_date($data->date)?></td>
                        <td class="text-center" width ="160px">
                                <a href="<?php echo site_url('stock/out/del/'.$data->stock_id.'/' .$data->item_id)?>" onclick="return confirm('Apakah Anda Yakin hapus data?')" class="btn btn-danger btn-xs">
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
