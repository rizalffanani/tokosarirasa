<table class="table">
	    <tr><td>Nama Menu</td><td><?php echo $nama_menu; ?></td></tr>
	    <tr><td>Harga</td><td><?php echo $harga; ?></td></tr>
	    <tr><td>Id Kategori</td><td><?php echo $id_kategori; ?></td></tr>
	    <tr><td>Deskripsi Menu</td><td><?php echo $deskripsi_menu; ?></td></tr>
	    <tr><td>Foto Menu</td><td><img src="<?php echo(base_url()) ?>gambar/<?php echo $foto_menu; ?>" style="width:180px"></td></tr>
	    <tr><td>Status</td><td><?php echo $status; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('admin/listmenu') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>