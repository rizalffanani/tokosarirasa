<table class="table">
    <tr><td>Nama Pelanggan</td><td><?php echo $id_user; ?></td></tr>
    <tr><td>Metode Pembayaran</td><td><?php echo $metode; ?></td></tr>
    <tr><td>Dibayar</td><td>Rp.<?php echo rupiah($bayar); ?></td></tr>
    <?php $real=($total_harga);if ($diskon>0) { $dtotal = 100-$diskon;$real=($total_harga/$dtotal)*100;?>
    <tr><td>Diskon</td><td><?php echo $diskon; ?>%</td></tr>
    <?php }?>
    <tr><td>Total Harga</td><td>Rp.<?php echo rupiah($real); ?></td></tr>
    <!-- <tr><td>Harga Diskon</td><td>Rp.<?php echo rupiah($total_harga); ?></td></tr> -->
    <tr><td>Kembali</td><td>Rp.<?php echo rupiah($bayar-$total_harga); ?></td></tr>
    <tr><td>Waktu</td><td><?php echo $date.' '.$waktu; ?></td></tr>
    <tr><td>Transaksi</td><td><?php echo $transaksi; ?></td></tr>
    <tr><td>Nama Kasir</td><td><?php echo $nama_kasir; ?></td></tr>
    <tr><td colspan="2">
    	<table class="table">
            <thead>
                <tr class="text-center">
                    <th>#</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Qty</th>
                    <th>Harga</th>
                    <th style="width:300px">Total</th>
                </tr>
            </thead>
            <tbody id="body-tabel">
            <?php $i = 1;$b=0; $keid = array(); foreach($detail as $key) : ?>
              <tr class="text-center">
                <tr class="text-center">
	                <td><?= $i?></td>
	                <td><?= $key->nama_menu?></td>
	                <td><?= $key->nama_kategori?></td>
	                <td><?= $key->qty?></td>
	                <td>Rp.<?= rupiah($key->harga)?></td>
	                <td>Rp.<?= rupiah($key->total_harga)?></td>
	            </tr><!-- END TR-->
            <?php $i++;endforeach; ?>
            </tbody>
        </table>
    </td></tr>
    <tr><td></td><td><a href="<?php echo site_url('order') ?>" class="btn btn-default">Cancel</a></td></tr>
</table>
