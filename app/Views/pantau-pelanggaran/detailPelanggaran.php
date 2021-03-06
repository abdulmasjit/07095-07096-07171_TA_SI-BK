<!-- <a href="<?= SITE_URL; ?>/pantau-pelanggaran" class="btn btn-success" style="margin-bottom:10px;">Kembali</a> -->
<div class="row">
  <div class="col-md-4">
    <div class="card">
      <div class="card-header c-header">
        <span><b>Detail Siswa</b></span>
      </div>
      <div class="card-body">
        <div class="text-center">
          <span><b>Jumlah Poin Aktif</b></span>
          <h1 style="color:red; font-size:40pt;"><?php echo 100 - $detail_siswa['total_poin'] ?></h1>
        </div>
        <br>
        <!-- <hr> -->
        <table class="table table-sm">
          <tr>
            <td valign="top" width="10%">NIS</td>
            <td valign="top" width="3%">:</td>
            <td valign="top" width="50%"><?= $detail_siswa['nis'] ?></td>
          </tr>
          <tr>
            <td valign="top">Nama</td>
            <td valign="top">:</td>
            <td valign="top"><?= $detail_siswa['nama_siswa'] ?></td>
          </tr>
          <tr>
            <td valign="top">Kelas</td>
            <td valign="top">:</td>
            <td valign="top"><?= $detail_siswa['kelas'] ?></td>
          </tr>
          <tr>
            <td valign="top">No Telp</td>
            <td valign="top">:</td>
            <td valign="top"><?= $detail_siswa['no_hp'] ?></td>
          </tr>
          <tr>
            <td valign="top">Alamat</td>
            <td valign="top">:</td>
            <td valign="top"><?= $detail_siswa['alamat'] ?></td>
          </tr>
        </table>
        <?php 
          $role = $_SESSION['user']['role'];
          if($role=='HA01' || $role=='HA02'){ ?>
            <a href="<?= SITE_URL; ?>/pantau-pelanggaran" class="btn btn-success" style="float:right;">Kembali</a>
        <?php } ?>
      </div>
    </div>
    <br>
  </div>
  <div class="col-md-8">
    <div class="card">
      <div class="card-header c-header">
        <span><b>Daftar Pelanggaran</b></span>
      </div>
      <div class="card-body">
        <table class="table table-bordered">
          <thead>
            <tr class="bg-light">
              <th width="5%" class="text-center">No.</th>
              <th width="30%">Pelanggaran</th>
              <th width="30%">Keterangan</th>
              <th class="text-center" width="5%">Poin</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $jml_data = count($list);
              if($jml_data>0){              
                $no = 0;
                foreach ($list as $row) { $no++ ?>
                  <tr>
                    <td class="text-center"><?= $no; ?>.</td>
                    <td>
                      <?= $row['nama_pelanggaran'] ?>
                    </td>
                    <td>
                      <b>Tanggal :</b> <?= $row['tanggal'] ?><br>
                      <b>Kategori :</b> <i><?= $row['kategori'] ?></i><br>
                      <b>Tempat :</b> <i><?= ($row['tempat']!="") ? $row['tempat'] : '-' ?></i><br>
                      <b>Keterangan :</b> <i><?= ($row['keterangan']!="") ? $row['keterangan'] : '-' ?></i><br>
                    </td>
                    <td class="text-center"><?= $row['point'] ?></td>
                  </tr>
            <?php 
                }
              }else{ ?>
              <!-- Data Kosong -->
              <tr>
                <td colspan="4">Data tidak ditemukan !</td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>