<!DOCTYPE html>
<?php 
  $page=$this->db->get_where('page', array('enum' => 'y'))->result();
  $infoweb=$this->db->get_where('info', array('id_info' => '1'))->row();
  $tema=$this->db->get_where('tema', array('id_tema' => '1'))->row();
  if($this->session->userdata("id")){
    $tema=$this->db->order_by('id_notifikasi', 'DESC')->get_where('view_notif', array('id_user' => $this->session->userdata("id")))->result();
  }
?>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>AdminLTE 3 | Top Navigation</title>
  <link rel="icon" href="<?php echo base_url(); ?>assets/img/<?= $infoweb->logo_web?>">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php  echo (base_url());?>assets/backend/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php  echo (base_url());?>assets/backend/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?php  echo (base_url());?>assets/backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="<?php  echo (base_url());?>assets/backend/plugins/toastr/toastr.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script src="<?php  echo (base_url());?>assets/backend/plugins/jquery/jquery.min.js"></script>
  <script src="<?php  echo (base_url());?>assets/js/popper.min.js"></script>
  <script src="<?php  echo (base_url());?>assets/backend/plugins/toastr/toastr.min.js"></script>

</head>
<body class="hold-transition layout-top-nav layout-navbar-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white" style="height: 150px;">
    <div class="container">
      <a href="<?php echo site_url('web') ?>" class="navbar-brand">
        <img src="<?php echo base_url(); ?>assets/img/<?= $infoweb->logo_web?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8;height: 90px;"><br>
        <!-- <span class="brand-text font-weight-light">Delivery Order</span> -->
      </a>
      
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="<?php echo site_url('web') ?>" class="nav-link">Beranda</a>
          </li>
          <?php foreach($page as $key){?>
          <li class="nav-item">
            <a href="<?php echo site_url('web/page/'.$key->link) ?>" class="nav-link" style="text-transform: capitalize;"><?= $key->link?></a>
          </li>
          <?php }?>
          <?php if(!$this->session->userdata("user_id")){?>
          <li class="nav-item">
            <a href="<?php echo site_url('login') ?>" class="nav-link">Login</a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('login/regis') ?>" class="nav-link">Registrasi</a>
          </li>
          <?php }else{?>
          <li class="nav-item">
            <a href="<?php echo site_url('web/logorder') ?>" class="nav-link">Riwayat Pesanan</a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('login/logout') ?>" class="nav-link">Logout</a>
          </li>
          <?php }?>
        </ul>

        <!-- SEARCH FORM -->
        <form class="form-inline ml-0 ml-md-3" action="<?= base_url(); ?>web/search" method="post">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" name="keyword" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </form>
      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <!-- Notifications Dropdown Menu -->
        <?php if($this->session->userdata("id")){?>
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge"><?= count($tema);?></span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <!-- <span class="dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div> -->
            <?php foreach($tema as $key) : ?>
            <a href="#" class="dropdown-item">
              <i class="fas fa-shopping-cart mr-2"></i> Orderan #<?= $key->id_order?>
              <span class="float-right text-muted text-sm"><?= $key->sts?></span>
            </a>
            <div class="dropdown-divider"></div>
            <?php endforeach; ?>            
            <!-- <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a> -->
          </div>
        </li>
        <?php }?>
        <li class="nav-item dropdown">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
            <i class="fas fa-shopping-cart"></i>
            <span id="count" style="<?php $count=count($this->cart->contents()); if ($count<0) {?>display: none !important;<?php }?>" class="badge badge-warning navbar-badge"><?php echo($count>0) ? $count : 0 ;?></span>
          </a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
 <?php
      echo $contents;
  ?>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark" style="overflow: auto;border: 1px solid #17a2b8;height: 100%;width: 500px;background: white;position: fixed;">
    <div class="p-3" style="margin-top: 200px">
      <h5 style="color: black">Keranjang Belanja</h5>
      <table class="table">
            <tbody id="body-tabel" style="color: black;">
            <?php $i = 1;$b=0; $keid = array(); foreach($this->cart->contents() as $key) : ?>
              <tr class="text-center" id="table<?= $key['rowid']; ?>">
                <td style="vertical-align: middle;">
                  <button type="button" onclick="hapus('<?= $key['rowid']; ?>')" class="btn btn-block btn-danger" data-type="plus" data-field="">X</button>
                </td>
                <td style="vertical-align: middle;width: 130px;"><?= $key['name']?></td>
                <input type="hidden" id="price<?= $key['rowid']; ?>" value="<?= $key['price']?>">
        
                <td style="vertical-align: middle;">
                  <button type="button" onclick="kurang('<?= $key['rowid']; ?>')" style='width: 30px;float: left;' class="btn btn-block btn-info"  data-type="minus" data-field="">-</button>
                  <input type="number" value="<?= $key['qty']?>" id="quantity<?= $key['rowid']; ?>" style='width: 50px;float: left;'  class="form-control " name="quantity"  value="1" min="1" max="100">
                  <button type="button" onclick="tambah('<?= $key['rowid']; ?>')" style='width: 30px;float: left;' class="btn btn-block btn-info" data-type="plus" data-field="">+</button>
                </td>
                
                <td style="vertical-align: middle;" id="sb<?= $key['rowid']; ?>">Rp.<?= rupiah($key['subtotal'])?></td>
              </tr><!-- END TR-->
            <?php $i++;endforeach; ?>
            </tbody>
      </table>
      <h5 style="color: black">Total 
        <span id="totals" style="float: right;">Rp.<?php echo rupiah($this->cart->total()); ?></span>
      </h5>
      <?php if($count>0){?>
      <a href="<?= base_url(); ?>web/checkout" id="checkout"><button class="btn btn-block btn-warning">Check Out</button></a>
      <?php } ?>
    </div>
    <script type="text/javascript">
        $(function() {
          const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
          });
        });
        function hapus(a) {
          $.ajax({
            type:"GET",
            dataType : "JSON",
            url:"<?=site_url('web/hapus_cart');?>/"+a,    
            success: function(data){   
              document.getElementById('count').style.display = "block";
              document.getElementById('count').innerHTML = data.jml;
              if (!data.jml) {document.getElementById('checkout').style.display = "none";}
              document.getElementById('table'+a).innerHTML = "<tr></tr>";   
              document.getElementById('totals').innerHTML = "Rp."+data.format;
            }  
          });
        }
        function tambah(a) {
          var quantity = parseInt($('#quantity'+a).val());
          var qty = quantity + 1;
          var price = parseInt($('#price'+a).val());
              $('#quantity'+a).val(qty);
              document.getElementById('sb'+a).innerHTML="Rp."+(qty*price);
              update(a,qty);
        }
        function kurang(a) {
          var quantity = parseInt($('#quantity'+a).val());
          var qty = quantity - 1;
          var price = parseInt($('#price'+a).val());
              // Increment
              if(quantity>1){
              $('#quantity'+a).val(qty);
              document.getElementById('sb'+a).innerHTML="Rp."+(qty*price);
              update(a,qty);
              }
        }
        function update(a,b) {
          $.ajax({
            type:"GET",
            url:"<?=site_url('web/update_cart');?>/"+a+'/'+b,  
            dataType : "JSON",    
            success: function(data){   
              document.getElementById('totals').innerHTML = "Rp."+data.format;   
            }  
          });
        }
    </script>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer bg-navy">
    <div class="row">
      <div class="col-sm-4 col-md-1 "></div>
      <div class="col-sm-4 col-md-8 ">
        <div class="card-body">
          <strong>Follow Instagram Kami </strong>
        </div>
      </div>
      <div class="col-sm-4 col-md-3 ">
        <div class="card-body">
          <a href="https://www.instagram.com/cafewarna2020/">
            <img style="height: 40px;" src="<?php  echo (base_url());?>assets/img/instagram.png">
            <strong style="color: white;"><?= $infoweb->nama_web?></strong>
          </a>
        </div>
      </div>
    </div>
  </footer>
  <footer class="main-footer ">
    <div class="row invoice-info">
      <div class="col-sm-1 invoice-col">
      </div>
      <div class="col-sm-4 invoice-col">
        <address>
          <strong><?= $infoweb->nama_web?></strong><br>
          <?= $infoweb->alamat?>
        </address>
      </div>
    </div>
  </footer>
  <footer class="main-footer text-center">
    <strong>Copyright &copy; <?= date("Y")?> <a href="<?php echo site_url('dashboard') ?>"><?= $infoweb->nama_web?></a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- Bootstrap 4 -->
<script src="<?php  echo (base_url());?>assets/backend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php  echo (base_url());?>assets/backend/dist/js/adminlte.min.js"></script>
</body>
</html>
