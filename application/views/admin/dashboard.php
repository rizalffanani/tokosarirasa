<?php 
  $infoweb=$this->db->get_where('info', array('id_info' => '1'))->row();
?>
<section class='content'>
      <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Selamat Datang <?php echo $this->session->userdata("first_name"); ?></h5>

                <p class="card-text" style = "text-transform:lowercase;">
                  Silahkan pilih menu yang tersedia, untuk mengelolah <?= $infoweb->tentang?><br>Selamat Bekerja!!
                </p>
              </div>
            </div>
          </div>
        </div>
</section>