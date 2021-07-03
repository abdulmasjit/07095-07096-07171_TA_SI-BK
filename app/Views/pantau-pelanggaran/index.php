<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header c-header">
        <span><b>Daftar Siswa</b></span>
      </div>
      <div class="card-body">
        <form id="formPencarian" method="POST">
          <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <select class="form-control" name="kelas" id="kelas">
                  <option value="">Semua Kelas</option>
                  <?php foreach ($data_kelas as $row) { ?>
                    <option  
                      <?php if(isset($detail)){
                        if($detail['kelas']==$row['id_kelas']){
                          echo 'selected ';
                        }
                      } ?>
                    value="<?= $row['id_kelas'] ?>"><?= $row['nama_kelas'] ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-md-4">
                  <div class="input-group">
                      <input type="text" id="cari" name="cari" class="form-control" placeholder="Cari . . ." 
                        value="<?php echo (isset($detail)) ? $detail['keyword'] : ''; ?>" 
                      >
                      <div class="input-group-append" id="btn-search" style="cursor:pointer;">
                          <span class="input-group-text">
                              <i class="fa fa-search"></i>
                          </span>
                      </div>
                  </div>
            </div>
          </div>
        </form>
        <div class="mt-3">
          <table class="table table-bordered">
            <thead>
              <tr class="bg-light">
                <th width="5%" style="text-align:center;">No.</th>
                <th width="20%">NIS</th>
                <th width="30%">Nama</th>
                <th width="20%">Kelas</th>
                <th width="10%" style="text-align:center;">Aksi</th>
              </tr>
            </thead>
            <tbody>
            <?php
              $jml_data = count($list);
              if($jml_data>0){              
                $no = 0;
                foreach ($list as $row) { $no++ ?>
                  <tr>
                    <td style="text-align:center;"><?= $no; ?>.</td>
                    <td><?= $row['nis'] ?></td>
                    <td><?= $row['nama_siswa'] ?></td>
                    <td><?= $row['nama_kelas'] ?></td>
                    <td style="text-align:center;">
                      <a href="<?= SITE_URL ?>/detail-pelanggaran/<?= $row['id_siswa'] ?>" class="btn btn-sm btn-info btn-ubah">Detail</a>
                    </td>
                  </tr>
            <?php 
                }
              }else{ ?>
              <!-- Data Kosong -->
              <tr>
                <td colspan="5">Data tidak ditemukan !</td>
              </tr>
            <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  // Event click icon search
  $('#btn-search').on('click', function (e) {
    $('#formPencarian').submit();
	})

  $('#kelas').on('change', function (e) {
    $('#formPencarian').submit();
	})
</script>