
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php //echo anchor(site_url('kas/create'), 'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <input class="form-control" value="<?= $date = ($date) ? $date : date("Y-m-d") ;?>" type="date" id="date" onchange="dare(this.value)">
            </div>
        </div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
        		    <th>Tanggal</th>
                    <th>Keterangan</th>
        		    <th>Total</th>
                    <th>Status</th>
        		    <th width="200px">Action</th>
                </tr>
            </thead>
	        <tbody>
                <?php $i=1;foreach ($dats as $key => $value) {?>
                <tr>
                    <td><?= $i?></td>
                    <td><?= $value->date?></td>
                    <td>Transaksi Order <?= $value->id_user?></td>
                    <td><?= "Rp.".rupiah($value->total_harga)?></td>
                    <td>
                        <?php
                            if ($value->transaksi=="terkonfirmasi") {
                                echo(anchor(site_url('admin/kas/update/'.$value->id_order.'/'.'dikirim'),'dikirim'));
                            }
                            if ($value->transaksi=="dikirim") {
                                echo(anchor(site_url('admin/kas/update/'.$value->id_order.'/'.'diterima'),'diterima'));
                            }
                            if ($value->transaksi=="diterima") {
                                echo('selesai');
                            }
                        ?>
                    </td>
                    <td><?= 
                        anchor(site_url('admin/kas/read/'.$value->id_order),'Read')
                    ?></td>
                </tr>
                <?php $i++;}?>

            </tbody>
        </table>

        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#mytable').DataTable();
            } );
        </script>
        <script type="text/javascript">

            function dare(api) {
              window.location.href = "<?php echo base_url() ?>admin/kas/index/"+api;
            }
        </script>