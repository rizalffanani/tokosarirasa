<!-- <h2 style="margin-top:0px">Slider Read</h2> -->
<table class="table">
    <tr><td>Judul</td><td><?php echo $judul; ?></td></tr>
    <tr><td>Deskripsi</td><td><?php echo $deskripsi; ?></td></tr>
    <tr><td>Images</td><td><img src="<?php echo(base_url()) ?>coffee/images/<?php echo $images; ?>"></td></tr>
    <tr><td></td><td><a href="<?php echo site_url('slider') ?>" class="btn btn-default">Cancel</a></td></tr>
</table>