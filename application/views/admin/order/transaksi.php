<form action="<?= base_url('pesanantamu/checkout')?>" method="post" class='box'>
    <?php 
        $data = $this->db->get('menu1')->result(); 
        $datas = array();
        foreach ($this->cart->contents() as $key){
          $datas[] = $key['id'];
        }
    ?>
    <select class="form-control" id="menu" onchange="tambah(this.value)">
        <?php //echo dinamis('menu1', 'nama_menu', 'id_menu',0); 
            echo "<option value='0'>pilih</option>";
            foreach ($data as $d){
                if (!in_array($d->id_menu, $datas)) {
                    echo "<option value='".$d->id_menu."'>".strtoupper($d->nama_menu)."</option>";
                }
            }
        ?>
    </select><br>
    <div class='box-body' style="overflow-x:auto;">
        <table class="table table-bordered table-striped" id="tableId">
            <thead>
                <tr>
        		    <th style="width:40%">Nama</th>
        		    <th style="width:20%">Harga</th>
        		    <th style="width:10%">Qty</th>
                    <th style="width:20%">Total</th>
        		    <th style="width:10%">#</th>
                </tr>
            </thead>
    	    <tbody id="table">
                <?php $a=0;foreach ($this->cart->contents() as $key){?>
                <tr>
                    <td>
                        <input type="hidden" name="rowid[]" class="form-control" value="<?= $key['rowid']?>"/>
                        <input type="hidden" name="id[]" class="form-control" value="<?= $key['id']?>"/>
                        <input type="hidden" name="id_kategori[]" class="form-control" value="<?= $key['id_kategori']?>"/>
                        <input type="hidden" name="nama_kategori[]" class="form-control" value="<?= $key['nama_kategori']?>"/>
                        <input type="hidden" name="gambar[]" class="form-control" value="<?= $key['gambar']?>"/>
                        <input type="text" name="name[]" class="form-control" value="<?= $key['name']?>" readonly/>
                    </td>
                    <td>
                        <input type="number" name="price[]" class="form-control" id="harga_jual<?= $a?>" value="<?= $key['price']?>" mk<?= $a?>="<?= $a?>" readonly/>
                    </td>
                    <td>
                        <input type="number" name="qty[]" class="form-control" id="qtys<?= $a?>" value="<?= $key['qty']?>" min="1" onchange="plus(this.value,<?= $a?>,'<?= $key['rowid']; ?>')"  />
                    </td>
                    <td>
                        <input type="number" name="subtotal[]" class="form-control" id="subtototal<?= $a?>" value="<?= $key['subtotal']?>" readonly>
                    </td>
                    <td><a href="#" onclick="hapus2(this,'<?= $key["rowid"]?>')">Hapus</a></td>
                </tr>
                <?php $a++;}?>   
            </tbody>
        </table>
        <table class="table table-bordered table-striped" >
            <tbody>
                <tr>
                    <td style="width:70%"><button type="submit" class="btn btn-primary">Checkout</button></td>
                    <td style="width:20%"><input type="number" name="totals" id="totals" class="form-control" value="<?= (@$this->cart->total()==0) ? '' : @$this->cart->total() ; ?>" readonly required></td>
                    <td style="width:10%"></td>
                </tr>
            </tbody>
        </table>

    </div><!-- /.box -->
</form><!-- /.col -->
<script type="text/javascript">

    var table = document.getElementById("tableId");
    var hitung = table.tBodies[0].rows.length;
    function tambah (a) {
        if (a>0) {
            var newRow=document.getElementById('table').insertRow();
            newRow.id = "tr"+hitung;
            hitung += 1;
            $.ajax({
                type:"POST",
                url:"<?=site_url('transaksi/tabel');?>", 
                data : {a:hitung,b:a},  
                success: function(data){   
                    newRow.innerHTML=data;
                    var x = document.getElementById("menu");
                    x.remove(x.selectedIndex);
                    update(a,1);
                }  
            });
        };
    }
    function hapus2(a,b) {
        var row = a.parentNode.parentNode;
        row.parentNode.removeChild(row);
        $.ajax({
            type:"POST",
            url:"<?=site_url('transaksi/hapus_cart');?>", 
            dataType : "JSON",
            data : {row_id:b},
            success: function(data){
                var x = document.getElementById("menu");
                var option = document.createElement("option");
                option.value = data.value.id;
                option.innerHTML = data.value.name.toUpperCase();
                x.add(option);
                document.getElementById('totals').value = data.nilai; 
            }  
        });
    }
    function plus(qty,b,a) {
        var harga_jual = document.getElementById('harga_jual'+b).value;
        document.getElementById('subtototal'+b).value = (harga_jual*qty);
        update(a,qty);
    }
    function update(a,b) {
        $.ajax({
          type:"GET",
          url:"<?=site_url('web/update_cart');?>/"+a+'/'+b, 
          dataType : "JSON",   
          success: function(data){   
            document.getElementById('totals').value = data.nilai;   
          }  
        });
    }
</script>