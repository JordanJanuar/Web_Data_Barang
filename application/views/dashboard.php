<?php 
$this->db->select('name,stock');
$dataproductchart = $this->db->get("p_item")->result();
foreach ($dataproductchart as $key => $value) {
  $arrprod[]=['label'=>$value->name,'y' => $value->stock];
}
// print_r(json_encode($arrprod, JSON_NUMERIC_CHECK));die();
?>

<section class="content-header">
      <h1> Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Dashboard</li>
      </ol>
</section>

<!-- Main content -->
<section class="content">
<div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-blue"><i class="fa fa-database"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Barang</span>
              <span class="info-box-number"><?=$this->fungsi->count_item()?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-blue"><i class="fa fa-users"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Admin</span>
              <span class="info-box-number"><?=$this->fungsi->count_user()?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->


</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"> </script>



</section>