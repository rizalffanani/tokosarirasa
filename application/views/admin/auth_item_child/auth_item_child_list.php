<div class='box'>
    <div class='box-header'>
      <h3 class='box-title'>
        <?php echo anchor('admin/auth_item_child/create/','Setting',array('class'=>'btn btn-danger btn-sm'));?>          
        </h3>
    </div><!-- /.box-header -->
    <?=@$err?>
</div><!-- /.box -->
<div class="row">
    <?php foreach ($dataparent as $key => $value) {?>
    <div class="col-md-4">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"><?= $value->name?></h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">
            <ul class="products-list product-list-in-card pl-2 pr-2">
              <!-- /.item -->
                <?php
                    $start = 0; foreach ($auth_item_child_data as $auth_item_child){
                        if ($auth_item_child->parent==$value->name) {
                ?>
                <li class="item">
                    <div class="product-img">
                      <?php echo $auth_item_child->parent ?>
                    </div>
                    <div class="product-info">
                        <a href="<?= site_url('admin/auth_item_child/read/'.$auth_item_child->idc)?>" class="product-title">
                            <?php echo $auth_item_child->name ?>
                            <span class="badge badge-success float-right"><?php echo $auth_item_child->tipe ?></span>
                        </a>
                        <span class="product-description">
                            <?php echo $auth_item_child->link ?>
                        </span>
                    </div>
                </li>
                <?php }}?>
              <!-- /.item -->
            </ul>
          </div>
        </div>
    </div>
    <?php }?>
</div>