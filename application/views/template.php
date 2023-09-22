<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Daftar Barang</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/dist/css/skins/_all-skins.min.css">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini <?=$this->uri->segment(0) == 'sale' ?  'sidebar-collapse': null ?>">
<div class="wrapper">
  <header class="main-header">
    <a href="<?php echo base_url('dashboard')?>" class="logo">
      <span class="logo-mini"><b>SCI</span>
      <span class="logo-lg"><b>DAFTAR BARANG NON ASET</b></span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown tasks-menu">

            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 3 tasks</li>
              <li>
                <ul class="menu">
                  <li>
                    <a href="#">
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li>
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url()?>assets/dist/img/foto-profil-wa2.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"> <?php echo $this->fungsi->user_login()->name?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <img src="<?php echo base_url()?>assets/dist/img/foto-profil-wa2.jpg" class="img-circle" alt="User Image">
                <p><?php echo $this->fungsi->user_login()->name?>
                  <small><?php echo $this->fungsi->user_login()->address?></small>
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo site_url('auth/logout')?>" class="btn btn-flat bg-red">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  
  <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url()?>assets/dist/img/foto-profil-wa2.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo ucfirst($this->fungsi->user_login()->name)?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- /.sidebar menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
    <li <?=$this->uri->segment(1)== 'dashboard'|| $this->uri->segment(1)== ''? 'class="active"' :''?>>
          <a href="<?php echo site_url('dashboard')?>"> <i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
		</li>
    
    <?php if($this->fungsi->user_login()->level== 1) { ?>
        <li class="treeview  <?=$this->uri->segment(1)== 'category' || $this->uri->segment(1)== 'unit' || $this->uri->segment(1)== 'item' ? 'active' :''?>">
          <a href="#">
            <i class="fa fa-archive"></i> <span>Produk</span>
            <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i></span>
          </a>
         
          <ul class="treeview-menu">
            <li <?=$this->uri->segment(1)== 'item' ? 'class="active"' :''?>><a href="<?php echo site_url('item')?>"><i class="fa fa-circle-o"></i> Barang</a></li>
          </ul>
          <?php }?>
          <!-- <li>
          <a href="http://localhost/apriori_toko_parfum/login.php"> <i class="fa fa-users"></i> <span>apriori</span></a>
		    </li> -->
    <!-- <li><a href="#"><i class="fa fa-circle-o"></i> Sales</a></li>
					<li><a href="#"><i class="fa fa-circle-o"></i> Stocks</a></li> -->
			</ul>
		</li>
    <?php if($this->fungsi->user_login()->level== 1) { ?>
		<li><a href="<?php echo site_url('user')?>"> <i class="fa fa-user"></i> <span>Pengguna</span></a>
  </li>
    <?php }?>
	  </ul>
    </section>
  </aside>

  <script src="<?php echo base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>

  <!-- Content Wrapper--->
  <div class="content-wrapper">
        <?php echo $contents ?>
	</div>


  <footer class="main-footer">
    <div class="pull-right hidden-xs">
    </div>
    <strong>Copyright &copy; 2023 <a href="https://www.sucofindo.co.id/">PT. SUCOFINDO</a>.</strong> All rights
    reserved.
  </footer>

	</div>


	<script src="<?php echo base_url()?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url()?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="<?php echo base_url()?>assets/dist/js/adminlte.min.js"></script>

	<script src="<?php echo base_url()?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url()?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>


  <script>
  $(document).ready(function(){
      $('#table1').dataTable()
  })
  </script>
</body>
</html>
