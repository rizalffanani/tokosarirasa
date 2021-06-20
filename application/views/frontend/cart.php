<div class="content-wrapper" style="margin-top: 200px;">
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-12 col-sm-6 col-lg-12">
                  <table class="table ">
                      <tbody>
                          <tr><td>Email</td><td><?= $row3->email?></td></tr>
                          <tr><td>Nama</td><td><?= $row3->first_name?></td></tr>
                          <tr><td>Hp</td><td><?= $row3->phone?></td></tr>
                          <tr><td>Nota</td><td>#<?= $row->id_order?></td></tr>
                          <?php if (!empty($row->lokasi)) {?>
                            <tr><td>Lokasi</td><td><?= $row->lokasi?></td></tr>
                            <tr><td>Catatan</td><td><?= $row->catatan?></td></tr>
                          <?php }?>
                          <tr>
                            <td>Tanggal</td>
                            <td><?php $date=date_create($row->date);echo date_format($date,"d F Y").' '.$row->waktu;?></td>
                          </tr>
                      </tbody>
                  </table>         
                  <table class="table table-bordered  table-bordered">
                      <thead>
                          <tr>
                              <th><center>#</center></th>
                              <th><center>ITEM NAME</center></th>
                              <th><center>PRICE</center></th>
                              <th><center>QTY</center></th>
                              <th><center>TOTAL</center></th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php $i = 1;foreach($row2 as $key) : ?>
                          <tr>
                            <td><?= $i?></td>
                            <td><?= $key->nama_menu?></td>
                            <td>Rp.<?= rupiah($key->harga)?></td>
                            <td><?= $key->qty?></td>
                            <td>Rp.<?= rupiah($key->total_harga)?></td>
                          </tr>
                          <?php $i++;endforeach; ?>
                          <tr>
                              <th colspan="4"><center>Bill Total</center></th>
                              <th>Rp.<?= rupiah($row->total_harga)?></th>
                          </tr>
                      </tbody>
                  </table>
                  <?php if(empty($row->transaksi)){?>
                  <form action="<?php echo site_url('web/konfirm'); ?>" method="post" class="row">
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Alamat Pengirim</label>
                        <textarea class="form-control" name="catatan" rows="3" placeholder="Enter ..." required></textarea>
                      </div>
                    </div> 
                    <input type="hidden" name="id" value="<?= $row->id_order?>">
                    <br>
                        <button type="submit" class="btn btn-primary">Konfirmasi</button> 
                  </form>
                   <?php }?>
                  <!-- <div class="order-footer">
                    <span class="ng-binding">*Additional 10% government tax is not included in subtotal price</span>
                  </div> --> 
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
</div>