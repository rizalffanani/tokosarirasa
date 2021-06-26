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
                          <tr><td>Status</td><td><?= $row->transaksi?></td></tr>
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
                   <?php }elseif($row->transaksi=="masuk"){?>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="box box-default">
                          <!-- /.box-header -->
                          <div class="box-body">
                            <div class="callout callout-danger">
                              <div class="order-footer">
                                <span class="ng-binding">
                                  Silahkan lakukan Pembayaran ke Rekening di bawah ini
                                </span>
                              </div> 
                              <h4><?php $i = 1;foreach($row4 as $key){
                                    echo($i.".".$key->nama_bank.' '.$key->nomor.' / '.$key->atas_nama.'<br>');
                                    $i++;
                              } ?></h4>
                            </div>
                          </div>
                          <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                      </div>
                      <div class="col-md-6">
                        <div class="box box-default">
                          <div class="box-body">
                            <div class="callout callout-success">
                              <h4>Bukti Pembayaran</h4>
                              <form action="<?php echo site_url('web/upload'); ?>" method="post"  enctype="multipart/form-data" class="row">
                                <input type="hidden" name="id" value="<?= $row->id_order?>">
                                <div class="input-group input-group-sm">
                                  <input type="file" name="bukti" class="form-control" style="height: 39px;">
                                      <span class="input-group-btn">
                                        <button type="submit" class="btn btn-info btn-flat">Upload!</button>
                                      </span>
                                </div>
                              </form>
                            </div>
                          </div>
                          <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                      </div>
                    </div>
                  
                  
                  <?php }?>
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