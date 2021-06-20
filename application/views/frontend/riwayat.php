 <div class="content-wrapper" style="margin-top: 160px;">

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
			<div class="card">
				<div class="card-body">
	                <div class="row">
	                	<table class="table table-bordered table-striped" id="mytable">
				            <thead>
				                <tr>
				                    <th width="80px">No</th>
				        		    <th>Tanggal</th>
				                    <th>Keterangan</th>
				        		    <th>Total</th>
				        		    <th width="200px">Action</th>
				                </tr>
				            </thead>
					        <tbody>
				                <?php $i=1;foreach ($dats as $key => $value) {?>
				                <tr>
				                    <td><?= $i?></td>
				                    <td><?= $value->date?></td>
				                    <td><?= $value->transaksi?></td>
				                    <td><?= "Rp.".rupiah($value->total_harga)?></td>
				                    <td><?= 
				                        anchor(site_url('web/checkout/'.$value->id_order),'detail')
				                    ?></td>
				                </tr>
				                <?php $i++;}?>

				            </tbody>
				        </table>
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