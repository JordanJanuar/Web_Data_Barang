<section class="content-header">
      <h1> Data
        <small> Barang</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Barang</li>
      </ol>
</section>

<!-- Main content -->
<section class="content">
<?php $this->view('messages') ?>
    <div class="box">
        <div class ="box-header">
            <h3 class="box-title">Data Barang</h3>
            <div class="pull-right">
                <a href="<?php echo site_url('item/add')?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-plus"></i>Tambah Data Barang
                </a>
            </div>
        </div>
        <div class ="box-body  table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No Urut</th>
                        <th>Serial Number</th>
                        <th>Nama Barang</th>
                        <th>Merek</th>
                        <th>Ruangan</th>
                        <th>Type</th>
                        <th>Keterangan</th>
                        <th>Harga</th>
                        <th>Tanggal Pengadaan</th>
                        <!-- <th>harga beli</th>
                        <th>profit</th> -->
                        <th>Gambar</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

</section>

<script>
  $(document).ready(function(){
      $('#table1').dataTable({
        "processing": true,
        "serverSide": false,
        "ajax" : {
            "url": "<?=site_url('item/get_ajax')?>",
            "type": "POST"
        },
        "columnDefs": [
            {
                "targets": [4,6],
                "className": 'text-right'
            },
            {
                "targets": [7,-1],
                "className": 'text-center'
            },
            {
                "targets": [0, 7, -1],
                "orderable": false
            }
            ],
            "order" : []
      })
  })
</script>
