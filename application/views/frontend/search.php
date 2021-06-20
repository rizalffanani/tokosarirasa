 <div class="content-wrapper" style="margin-top: 160px;">

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
			<div class="card">
				<h5 class="card-title"><?= count($products);?> Item Hasil Pencarian</h5>
				<div class="card-body">
	                <div class="row">  
                    <?php $a=0;foreach ($products as $key => $value) {?>
                      <div class="col-md-3">
                        <div class="position-relative " style="height: 180px">
                          <img src="<?php echo(base_url()) ?>gambar/<?php echo $value->foto_menu; ?>" style="width: 100%;height: 130%;" alt="Photo 1" class="img-fluid">
                        </div>
                        <div class="card card-info card-outline">
                          <div class="card-body box-profile">
                            <div class="text-center" style="height: 50px">
                              <a href="#"><h5 style="color: black"><?php echo ($value->nama_menu)?></h5></a>
                            </div>

                            <!-- <p class="text-muted text-center"><?php echo ($value->deskripsi_menu)?></p> -->

                            <ul class="list-group list-group-unbordered mb-3">
                              <li class="list-group-item">
                                <b>Harga</b> <a class="float-right">Rp.<?php echo rupiah($value->harga)?></a>
                              </li>
                            </ul>

                            <a href="#" onclick="ds('<?= $value->id_menu?>')" id="ok" data-toggle="modal" data-target="#myModal" class="btn btn-outline-info btn-block"><b>Add to cart</b></a>
                          </div>
                        </div>
                      </div>
                    <?php $a++;}?>
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
        

        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#mytable').DataTable();
            } );
        </script>