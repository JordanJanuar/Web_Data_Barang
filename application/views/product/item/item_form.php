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
        <h3 class="box-title">Tambah Data Barang</h3>
            <div class="pull-right">
                <a href="<?php echo site_url('item')?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i>Back
                </a>
            </div>
        </div>
        <div class ="box-body">
         <div class="row">
            <div class="col-md-4 col-md-offset-4"> 
                <?php echo form_open_multipart('item/process') ?>
                
          <div class="form-group">

    <label>No Urut *</label>
    <input type="text" name="nomerurut" id="nomerurut" value="<?=$row->nomerurut?>" class="form-control" readonly required>
</div>
                  <div class="form-group">
                    <label for="product_name"> Nama Barang *</label>
                    <input type="text" name="product_name" id="product_name" value="<?= $row->name?>" class="form-control"required>  
                  </div>
                  <div class="form-group">
                    <label for="merk"> Merek *</label>
                    <input type="text" name="merk" id="merk" value="<?= $row->merk?>" class="form-control"required>  
                  </div>
									<div class="form-group">
                    <label> Model*</label>
										<input type="text" name="model" id="model" value="<?= $row->model?>" class="form-control"required>  
                  </div>
                  <div class="form-group">
                  <label>Serial Number *</label>
                      <input type="hidden" name="id" value="<?=$row->item_id?>">
                      <input type="text" name="barcode" id="barcode" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label> Harga *</label>
                    <input type="number" name="price" value="<?= $row->price?>" class="form-control"required>  
                  </div>
                  <div class="form-group">
                    <label> Tanggal Pengadaan *</label>
                    <input type="date" name="tanggal_pengadaan" value="<?= $row->tanggal_pengadaan?>" class="form-control"required>  
                  </div>    
                  <div class="form-group">
                    <label> Keterangan *</label>
                    <input type="text" name="keterangan" id="keterangan" value="<?= $row->keterangan?>" class="form-control"required>  
                  </div>
                  <div class="form-group">
                    <label> Ruangan *</label>
                    <input type="text" name="unit" id="unit" value="<?= $row->unit?>" class="form-control"required>  
                  </div>

                  <!-- <div class="form-group">
                    <label> Harga Beli *</label>
                    <input type="number" name="purchase_price" value="<?= $row->purchase_price?>" class="form-control"required>  
                  </div>
                  <div class="form-group">
                    <label> profit *</label>
                    <input type="number" name="profit" value="<?= $row->profit?>" class="form-control"required>  
                  </div> -->
                  <div class="form-group">
                    <label> Gambar</label>
                    <?php if($page == 'edit') {
                        if($row->image !=null) { ?>
                          <div style="margin-bottom:4px">
                             <img src="<?php echo base_url('./uploads/product/'.$row->image)?>" style= "width : 80%">
                          </div>
                        <?php
                        }
                    } ?>
                    <input type="file" name="image"  class="form-control">  
                    <small>(Biarkan kosong jika tidak <?= $page == 'edit' ? 'diganti' : 'ada'?>)</small>
                  </div>
                    <div class="from-group">
                        <button type="submit"  name="<?=$page?>"class="btn btn-success btn-flat">
                        <i class="fa fa-save"></i> Save
                        </button>
                        <button type="Reset" class="btn  btn-flat">Reset</button>
                    </div>
                <?php echo form_close() ?>
            </div>
         </div>
        </div>
    </div>

</section>
