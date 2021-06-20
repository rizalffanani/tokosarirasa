 <div class="content-wrapper" style="margin-top: 160px;">

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div id="demo" class="carousel slide" data-ride="carousel" style="height: 350px;">
              <ul class="carousel-indicators">
                <?php $i=0;foreach ($slider as $key => $value) {?>
                <li data-target="#demo" data-slide-to="<?= $i?>" class="<?php echo ($i==0) ? 'active' : '' ; ?>"></li>
                <?php $i++;}?>
              </ul>
              <style>
              /* Make the image fully responsive */
              .carousel-caption{
                background: #faebd796;
                position: absolute;
                height: 150px;
                width: 400px;
                left: 55%;
                top: 8%;
                z-index: 10;
                padding: 20px;
                border-radius:10px;
                color: black;
                text-align: right;
              }
              .carousel-inner img {
                width: 100%;
                height: 100%;
              }
              </style>
              <div class="carousel-inner">
                <?php $i=0;foreach ($slider as $key => $value) {?>
                <div class="carousel-item <?php echo ($i==0) ? 'active' : '' ; ?>">
                  <img src="<?php  echo (base_url());?>gambar/slider/<?= $value->images?>" alt="Chicago" width="1100" height="500">
                  <div class="carousel-caption">
                    <h2><?= $value->judul?></h2>
                    <p><b><?= $value->deskripsi?></b></p>
                  </div>   
                </div>
                <?php $i++;}?>
              </div>
              <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
              </a>
              <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
              </a>
            </div>
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-12 col-sm-6 col-lg-12">
                    <div class="card card-info card-tabs">
                      <div class="card-header p-0 pt-1">
                        <ul class="nav nav-tabs justify-content-center" id="custom-tabs-one-tab" role="tablist">
                          <?php $i=1; foreach ($kategori as $key => $value) {?>
                          <li class="nav-item">
                            <a class="nav-link <?php echo ($i==1) ? 'active' : '' ; ?>" id="custom-tabs-one-<?php echo$i;?>-tab" data-toggle="pill" href="#custom-tabs-one-<?php echo$i;?>" role="tab" aria-controls="custom-tabs-one-<?php echo$i;?>" aria-selected="false"><?php echo$value->nama_kategori;?></a>
                          </li>
                          <?php $i++;}?>
                        </ul>
                      </div>
                      <div class="card-body">
                        <div class="tab-content" id="custom-tabs-one-tabContent">
                          <?php $i=1; foreach ($kategori as $key => $val) {?>
                          <div class="tab-pane fade <?php echo ($i==1) ? 'show active' : '' ; ?>" id="custom-tabs-one-<?php echo($i);?>" role="tabpanel" aria-labelledby="custom-tabs-one-<?php echo($i);?>-tab">
                              <div class="row">  
                                <?php $a=0;foreach ($menu as $key => $value) { if ($value->id_kategori==$val->id_kategori) {?>
                                  <div class="col-md-3">
                                    <div class="position-relative " style="height: 180px">
                                      <img src="<?php echo(base_url()) ?>gambar/<?php echo $value->foto_menu; ?>" style="width: 100%;height: 130%;" alt="Photo 1" class="img-fluid">
                                    </div>
                                    <div class="card card-info card-outline">
                                      <div class="card-body box-profile">
                                        <div class="text-center" style="height: 50px">
                                          <a href="#"><h5 style="color: black"><?php echo ($value->nama_menu)?></h5></a>
                                        </div>
                                        <?php if($value->id_kategori==9){?>
                                        <p style="position: absolute;z-index: 4;top: -90%;background: #17a2b8!important;color: white;padding: 4px;border-radius: 15px;">
                                          Promo cuma<br>
                                          Rp.<?php echo ($value->harga)?>
                                        </p>
                                        <?php }?>
                                        <ul class="list-group list-group-unbordered mb-3">
                                          <li class="list-group-item">
                                            <b>Harga</b> <a class="float-right">Rp.<?php echo rupiah($value->harga)?></a>
                                          </li>
                                        </ul>

                                        <a href="#" onclick="ds('<?= $value->id_menu?>')" id="ok" data-toggle="modal" data-target="#myModal" class="btn btn-outline-info btn-block"><b>Add to cart</b></a>
                                      </div>
                                    </div>
                                  </div>
                                <?php $a++;} }?>
                                <?php if ($a<5) {for ($a=$a; $a < 4; $a++) { ?>
                                  <div class="col-md-3 text-center">
                                    <div class="menu-wrap">
                                      <div style="width: 327px;height:300px;"></div>
                                    </div>
                                  </div>
                                <?php }}?>
                              </div>
                          </div>
                          <?php $i++;}?>
                        </div>
                      </div>
                      <!-- /.card -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" style="color: black;">Jumlah</h4>
          </div>
          <div class="modal-body">
            <div class="row">
                  <div class="col-3">
                    <button type="button" class="quantity-left-minus btn"  data-type="minus" data-field="">
                     <i class="icon-minus"></i>
                    </button>
                  </div>
                  <div class="col-3">
                    <input type="number" id="quantity" name="quantity" class="form-control" value="1" min="1" max="100">
                    <input type="hidden" id="idmenu" name="idmenu">
                  </div>
                  <div class="col-2">
                    <button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
                       <i class="icon-plus"></i>
                   </button>
                  </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" onclick="ok()" class="btn btn-default" data-dismiss="modal">ok</button>
          </div>
        </div>
      </div>
    </div>
    <script>
      function ds(a) {
        document.getElementById('idmenu').value = a;
      }
      $(function() {

        toastr.options = {
          "closeButton": false,
          "debug": false,
          "newestOnTop": false,
          "progressBar": false,
          "positionClass": "toast-top-center",
          "preventDuplicates": false,
          "onclick": null,
          "showDuration": "300",
          "hideDuration": "1000",
          "timeOut": "5000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
        }
      });
      function ok() {
        var a = document.getElementById('idmenu').value
        var b = document.getElementById('quantity').value
        $.ajax({
          type:"GET",
          url:"<?=site_url('web/add_to_cart');?>/"+a+'/'+b,    
          success: function(data){   
            toastr.success('Ok berhasil');
            document.getElementById('count').style.display = "block";
            document.getElementById('count').innerHTML = data;
            location.reload();
          }  
        });
      }
      $(document).ready(function(){
        var quantitiy=0;
        $('.quantity-right-plus').click(function(e){
            
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#quantity').val());
            
            // If is not undefined
                
                $('#quantity').val(quantity + 1);

              
                // Increment            
        });
        $('.quantity-left-minus').click(function(e){
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#quantity').val());
            
            // If is not undefined
          
                // Increment
                if(quantity>0){
                $('#quantity').val(quantity - 1);
                }
        });
      });
    </script>