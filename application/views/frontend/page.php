 <div class="content-wrapper" style="margin-top: 160px;">

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
			<div class="card">
				<div class="card-body">
	                <div class="row">
	                	<h1><?php echo $judul; ?></h1>
	                	<table class="table">
						    <tr><td><?php echo $deskripsi; ?></td></tr>
						    <!-- <tr><td><?php echo $foto; ?></td></tr> -->
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