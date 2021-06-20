
    <body>
        <h2 style="margin-top:0px">Order <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Id User <?php echo form_error('id_user') ?></label>
            <input type="text" class="form-control" name="id_user" id="id_user" placeholder="Id User" value="<?php echo $id_user; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Total Harga <?php echo form_error('total_harga') ?></label>
            <input type="text" class="form-control" name="total_harga" id="total_harga" placeholder="Total Harga" value="<?php echo $total_harga; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Waktu <?php echo form_error('waktu') ?></label>
            <input type="text" class="form-control" name="waktu" id="waktu" placeholder="Waktu" value="<?php echo $waktu; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Transaksi <?php echo form_error('transaksi') ?></label>
            <input type="text" class="form-control" name="transaksi" id="transaksi" placeholder="Transaksi" value="<?php echo $transaksi; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Kasir <?php echo form_error('id_kasir') ?></label>
            <input type="text" class="form-control" name="id_kasir" id="id_kasir" placeholder="Id Kasir" value="<?php echo $id_kasir; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Kasir <?php echo form_error('nama_kasir') ?></label>
            <input type="text" class="form-control" name="nama_kasir" id="nama_kasir" placeholder="Nama Kasir" value="<?php echo $nama_kasir; ?>" />
        </div>
	    <input type="hidden" name="id_order" value="<?php echo $id_order; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('order') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
