<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header c-header">
        <span><b>Master Siswa</b></span>
      </div>
      <div class="card-body">
        <!-- Pesan -->
        <div class="row">
          <div class="col-md-12">
            <?php Flasher::flashMessage(); ?>
          </div>
        </div>
        <div class="row">
          <div class="col-md-8">
            <a href="<?= SITE_URL ?>/siswa" id="btn-tambah" class="btn btn-success">Tambah Siswa</a>
          </div>
          <div class="col-md-4">
              <form id="formPencarian" method="POST">
                <div class="input-group">
                    <input type="text" id="cari" name="cari" class="form-control" placeholder="Cari . . .">
                    <div class="input-group-append" id="btn-search" style="cursor:pointer;">
                        <span class="input-group-text">
                            <i class="fa fa-search"></i>
                        </span>
                    </div>
                </div>
              </form>
          </div>
        </div>
        <div class="mt-4">
          <table class="table table-bordered">
            <thead>
              <tr class="bg-light">
                <th width="5%" style="text-align:center;">No.</th>
                <th width="20%">NIS</th>
                <th width="20%">Nama</th>
                <th width="20%">Kelas</th>
                <th width="15%" style="text-align:center;">Aksi</th>
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
                      <a href="<?= SITE_URL ?>/siswa/edit/<?= $row['id_siswa'] ?>" class="btn btn-sm btn-warning btn-ubah">Ubah</a>
                      <a href="<?= SITE_URL ?>/siswa/delete/<?= $row['id_siswa'] ?>" onclick="return confirm('Apakah Anda yakin menghapus data siswa ?')" class="btn btn-sm btn-danger">Hapus</a>
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
</script>