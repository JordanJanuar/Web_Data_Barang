<section class="content-header">
    <h1>Items
        <small>Data Barang</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Items</li>
    </ol>
</section>
 
<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Barcode Generator <i class="fa fa-barcode"></i></h3>
            <div class="pull-right">
                <a href="<?=site_url('item')?>" class="btn btn-warning btn-flat btn-sm">
                    <i class="fa fa-undo"></i> Back
                </a>
            </div>
        </div>
        <div class="box-body">
            <?php
            $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
            echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($row->barcode, $generator::TYPE_CODE_128)) . '" style="width:200px">';
            ?>
            <br>
            <?=$row->barcode?>
            <br><br>
            <a href="<?=site_url('item/barcode_print/'.$row->item_id)?>" target="_blank" class="btn btn-default btn-sm">
                <i class="fa fa-print"></i> Print
            </a>
        </div>
    </div>
 
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">QR-Code Generator <i class="fa fa-qrcode"></i></h3>
        </div>
        <div class="box-body">
            <?php
            use Endroid\QrCode\Builder\Builder;
            use Endroid\QrCode\Encoding\Encoding;
            use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
            use Endroid\QrCode\Label\Alignment\LabelAlignmentCenter;
            use Endroid\QrCode\Label\Font\NotoSans;
            use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
            use Endroid\QrCode\Writer\PngWriter;
    
            $result = Builder::create()
                ->writer(new PngWriter())
                ->writerOptions([])
                ->data("No Urut : $row->nomerurut
Serial Number : $row->barcode                
Nama : $row->name 
Keterangan : $row->keterangan
Tanggal Pengadaan : $row->tanggal_pengadaan")
                ->encoding(new Encoding('UTF-8'))
                ->errorCorrectionLevel(new ErrorCorrectionLevelHigh())
                ->size(300)
                ->margin(10)
                ->roundBlockSizeMode(new RoundBlockSizeModeMargin())
                // ->logoPath(__DIR__.'/assets/symfony.png')
                // ->labelText($row->barcode)
                // ->labelFont(new NotoSans(20))
                // ->labelAlignment(new LabelAlignmentCenter())
                ->validateResult(false)
                ->build();
 
            // Save it to a file
            $folder_qrcode = "";
            $result->saveToFile('uploads/qr-code/item-'.$row->barcode.'.png');
 
            //$qrCode = new Endroid\QrCode\QrCode($row->barcode);
            //$qrCode->writeFile('uploads/qr-code/item-'.$row->barcode.'.png');
            ?>
            <img src="<?=base_url('uploads/qr-code/item-'.$row->barcode.'.png')?>" style="width:200px">
            <br>
            <?=$row->barcode?>
            <br><br>
            <a href="<?=site_url('item/qrcode_print/'.$row->item_id)?>" target="_blank" class="btn btn-default btn-sm">
                <i class="fa fa-print"></i> Print
            </a>
        </div>
    </div>
</section>
