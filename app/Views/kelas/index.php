<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header c-header">
        <span><b>Master Kelas</b></span>
      </div>
      <div class="card-body">
        <!-- Pesan -->
        <div class="row">
          <div class="col-md-12">
            <?php Flasher::flashMessage(); ?>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <a href="javascript:;" id="btn-tambah" class="btn btn-success">Tambah Kelas</a>
          </div>
        </div>
        <!-- <div class="mt-4">
          <table class="table table-bordered">
            <thead>
              <tr class="bg-light">
                <th width="5%" style="text-align:center;">No.</th>
                <th width="60%">Kelas</th>
                <th width="15%" style="text-align:center;">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 0;
              foreach ($list as $row) {
                $no++ ?>
                <tr>
                  <td style="text-align:center;"><?= $no; ?>.</td>
                  <td><?= $row['nama_kelas'] ?></td>
                  <td style="text-align:center;">
                    <a href="javascript:;" class="btn btn-sm btn-warning btn-ubah" data-id="<?= $row['id_kelas'] ?>">Ubah</a>
                    <a href="<?= SITE_URL ?>/kelas/delete/<?= $row['id_kelas'] ?>" class="btn btn-sm btn-danger">Hapus</a>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div> -->
      </div>
    </div>
  </div>
</div>

<!-- Form Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabel">Tambah kelas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formData" action="<?= SITE_URL; ?>/kelas/save" method="POST">
        <div class="modal-body">
          <input type="hidden" class="form-control" id="id_kelas" name="id_kelas"></input>
          <div class="form-group">
            <label for="kelas">Nama kelas</label>
            <input type="text" class="form-control" id="kelas" name="kelas" placeholder="Nama kelas . . ." required></input>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script>
  /**
   * Untuk menampilkan modal tambah
   */
  $('#btn-tambah').on('click', function() {
    $('#formData').attr('action', '<?= SITE_URL ?>/kelas/save');
    $("#formModalLabel").html('Tambah kelas');
    $("#formModal").modal('show');
  })

  /**
   * Untuk menampilkan modal ubah
   */
  $('.btn-ubah').on('click', function() {
    const id = $(this).data('id');
    $("#formModalLabel").html('Ubah kelas');
    $('#formData').attr('action', '<?= SITE_URL ?>/kelas/update');

    $.ajax({
      url: '<?= SITE_URL ?>/kelas/get-detail',
      data: {
        id: id
      },
      method: 'post',
      dataType: 'json',
      success: function(data) {
        console.log('ubah data', data);
        $("#id_kelas").val(data.id_kelas);
        $("#kelas").val(data.nama_kelas);
        $("#formModal").modal('show');
      }
    })
  })
</script>