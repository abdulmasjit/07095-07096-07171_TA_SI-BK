<!-- <h4>Dashboard</h4>    -->
<div class="alert alert-info mb-4" style="border-radius: 7px !important;">
  <h4 style="font-weight:510">Selamat datang <?= $_SESSION['user']['nama'] ?>, di Aplikasi Bimbingan Konseling. </h4> 
  <p>Aplikasi SIM-BK ini merupakan alat bantu dan media pengelolaan pelanggaran siswa, Silahkan pilih menu disamping untuk memulai.</p>
</div>

<?php 
  $role = $_SESSION['user']['role'];
  if($role=='HA01'){ 
?>
    <div class="row">
      <div class="col-md-3 col-sm-6 col-xs-12 col-lg-3">
        <div class="small-box bg-blue">
          <div class="inner">
            <h3><?= $dashboard['total_siswa'] ?></h3>
            <p>Siswa</p>
          </div>
          <div class="icon d-icons">
            <i class="fa fa-users"></i>
          </div>
          <a href="<?= SITE_URL; ?>/siswa" @click="visitor"  class="small-box-footer">Lihat</a>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12 col-lg-3">
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3><?= $dashboard['total_guru'] ?></h3>
            <p>Guru</p>
          </div>
          <div class="icon d-icons">
            <i class="fa fa-address-card"></i>
          </div>
          <a href="<?= SITE_URL; ?>/guru" @click="visitor"  class="small-box-footer">Lihat</a>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12 col-lg-3">
        <div class="small-box bg-red">
          <div class="inner">
            <h3><?= $dashboard['total_kelas'] ?></h3>
            <p>Kelas</p>
          </div>
          <div class="icon d-icons">
            <i class="fa fa-university"></i>
          </div>
          <a href="javascript:void(0)" @click="visitor"  class="small-box-footer">Lihat</a>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12 col-lg-3">
        <div class="small-box bg-green">
          <div class="inner">
            <h3><?= $dashboard['total_pelanggaran'] ?></h3>
            <p>Pelanggaran</p>
          </div>
          <div class="icon d-icons">
            <i class="fa fa-edit"></i>
          </div>
          <a href="<?= SITE_URL; ?>/pelanggaran" @click="visitor"  class="small-box-footer">Lihat</a>
        </div>
      </div>
    </div>
<?php } ?>
