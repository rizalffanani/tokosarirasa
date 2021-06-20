<h2 style="margin-top:0px">Slider <?php echo $button ?></h2>
<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="varchar">Judul <?php echo form_error('judul') ?></label>
        <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul" value="<?php echo $judul; ?>" />
    </div>
    <div class="form-group">
        <label for="deskripsi">Deskripsi <?php echo form_error('deskripsi') ?></label>
        <textarea class="form-control" rows="3" name="deskripsi" id="deskripsi" placeholder="Deskripsi"><?php echo $deskripsi; ?></textarea>
    </div>
    <div class="form-group">
        <label for="varchar">Images <?php echo form_error('images') ?></label>
        <input type="file" name="images" id="images" accept="image/x-png,image/jpeg">
    </div>
    <input type="hidden" name="id_slider" value="<?php echo $id_slider; ?>" /> 
    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
    <a href="<?php echo site_url('slider') ?>" class="btn btn-default">Cancel</a>
</form>