<form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Tpq <?php echo form_error('nama_tpq') ?></label>
            <input type="text" class="form-control" name="nama_tpq" id="nama_tpq" placeholder="Nama Tpq" value="<?php echo $nama_tpq; ?>" />
        </div>
	    <div class="form-group">
            <label for="alamat">Alamat <?php echo form_error('alamat') ?></label>
            <textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="varchar">Email <?php echo form_error('email') ?></label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
        </div>
	    <input type="hidden" name="id_tpq" value="<?php echo $id_tpq; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('admin/data_tpq') ?>" class="btn btn-default">Cancel</a>
	</form>