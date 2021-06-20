<form action="<?php echo $action; ?>" method="post"  enctype="multipart/form-data">
	    <div class="form-group">
            <label for="varchar">Nama Menu <?php echo form_error('nama_menu') ?></label>
            <input type="text" class="form-control" name="nama_menu" id="nama_menu" placeholder="Nama Menu" value="<?php echo $nama_menu; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Harga <?php echo form_error('harga') ?></label>
            <input type="number" class="form-control" name="harga" id="harga" placeholder="Harga" value="<?php echo $harga; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Kategori <?php echo form_error('id_kategori') ?></label>
            <?php echo cmb_dinamis('id_kategori', 'kategori', 'nama_kategori', 'id_kategori', $id_kategori) ?>
        </div>
	    <div class="form-group">
            <label for="deskripsi_menu">Deskripsi Menu <?php echo form_error('deskripsi_menu') ?></label>
            <textarea class="form-control" rows="3" name="deskripsi_menu" id="deskripsi_menu" placeholder="Deskripsi Menu"><?php echo $deskripsi_menu; ?></textarea>
        </div>
        <div class="form-group">
            <label for="varchar">Foto Menu <?php echo form_error('foto_menu') ?></label>
            <input type="file" name="foto_menu" id="foto_menu" accept="image/x-png,image/jpeg">
        </div>
	    <div class="form-group">
            <label for="enum">Status <?php echo form_error('status') ?></label>
            <select class="form-control" name="status" id="status">
                <option value="ready" <?php echo ($status=="ready") ? 'selected' : '' ;;?>>ready</option>
                <option value="habis" <?php echo ($status=="habis") ? 'selected' : '' ;;?>>habis</option>
            </select>
        </div>
	    <input type="hidden" name="id_menu" value="<?php echo $id_menu; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('admin/listmenu') ?>" class="btn btn-default">Cancel</a>
	</form>