<form action="<?= base_url('admin/pesanantamu/bayar')?>" method="post" class='box'>
    <div class='box-body' style="overflow-x:auto;">
        <table class="table table-bordered table-striped" >
            <thead>
                <tr>
        		    <th>Nama</th>
        		    <th>Harga</th>
        		    <th>Qty</th>
        		    <th style="width:300px">Total</th>
                </tr>
            </thead>
    	    <tbody>
                <?php foreach ($detail as $row){?>
                <tr>
                    <td><?php echo $row->nama_menu ?></td>
                    <td>Rp.<?php echo rupiah($row->harga) ?></td>
                    <td><?php echo $row->qty ?></td>
        		    <td>Rp.<?php echo rupiah($row->total_harga) ?></td>
    	        </tr>
                <?php }?>
                <tr>
                    <td colspan="3"></td>
                    <td>Rp.<?= rupiah($order->total_harga)?></td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                    <td>
                        <input type="hidden" name="metode" value="debit">
                        Debit
                        <!-- <select name="metode" class="form-control">
                            <option value="tunai">Tunai</option>
                            <option value="debit">Debit</option>
                        </select> -->
                    </td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                    <td>
                        <input type="number" name="diskon" min="0" max="100" placeholder="Diskon%" onkeyup="pot(this.value)" class="form-control"/>
                        <input type="hidden" name="subttl" id="subttl" value="<?= $order->total_harga?>">
                        <input type="hidden" name="total" id="total" value="<?= $order->total_harga?>">
                        <input type="hidden" name="bayar" id="bayar" value="<?= $order->total_harga?>">
                    </td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                    <td>Total Tagihan = <span id="sub">Rp <?= rupiah($order->total_harga)?></span></td>
                </tr>
                <tr>
                    <td colspan="3"><input type="hidden" name="id" value="<?= $order->id_order?>"></td>
                    <td><a href="#" data-toggle="modal" data-target="#modal-lg2" ><button class="btn btn-primary">Lunas</button></a></td>
                </tr>
            </tbody>
        </table>
    </div><!-- /.box -->
    <button type="submit" id="kirim" style="display: none;"></button>
</form><!-- /.col -->
<div class="modal fade" id="modal-lg2">
    <div class="modal-dialog modal-sm">
      <form class="modal-content" >
        <div class="modal-body">
            <div class="form-horizontal">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-3 col-form-label">dibayar</label>
                    <div class="col-sm-9">
                      <input type="number" id="jml_pembayaran2" value="<?= $order->total_harga?>" onkeyup="jm(this.value)" class="form-control" placeholder="Pembayaran">
                    </div>
                  </div>
                </div>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="submit" type="button" onclick="ok();" class="btn btn-primary" data-dismiss="modal">Save</button>
          <button type="button" class="btn btn-default" data-dismiss="modal" id="close">Close</button>
        </div>
      </form>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script type="text/javascript">
    function pot(a) {
        var subttl = document.getElementById('subttl').value;
        var ttl = parseInt(subttl)-(parseInt(subttl)*parseInt(a)/100);
        document.getElementById('jml_pembayaran2').value = ttl;
        document.getElementById('total').value = ttl;
        document.getElementById('sub').innerHTML = formatMoney(ttl);
    }
    function jm(a) {
        document.getElementById('bayar').value = a;
    }
    function formatMoney(number) {
        return number.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' });
    }
    function ok() {
        document.getElementById("kirim").click();
    }
</script>