<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header c-header">
        <span><b>Master Kategori</b></span>
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
            <a href="javascript:;" id="btn-tambah" class="btn btn-success">Tambah Kategori</a>
          </div>
        </div>
        <div class="mt-4">
          <table class="table table-bordered">
            <thead>
              <tr class="bg-light">
                <th width="5%" style="text-align:center;">No.</th>
                <th width="60%">Kategori</th>
                <th width="15%" style="text-align:center;">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $no = 0;
              foreach ($list as $row) { $no++ ?>
                <tr>
                  <td style="text-align:center;"><?= $no; ?>.</td>
                  <td><?= $row['nama_kategori'] ?></td>
                  <td style="text-align:center;">
                    <a href="javascript:;" class="btn btn-sm btn-warning btn-ubah" data-id="<?= $row['id_kategori'] ?>">Ubah</a>
                    <a href="<?= SITE_URL ?>/kategori/delete/<?= $row['id_kategori'] ?>" class="btn btn-sm btn-danger">Hapus</a>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Form Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabel">Tambah Kategori</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formData" action="<?= SITE_URL; ?>/kategori/save" method="POST">
        <div class="modal-body">
          <input type="hidden" class="form-control" id="id_kategori" name="id_kategori"></input>
          <div class="form-group">
            <label for="kategori">Nama Kategori</label>
            <input type="text" class="form-control" id="kategori" name="kategori" placeholder="Nama Kategori . . ." required></input>
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
    $('#btn-tambah').on('click', function(){
        $('#formData').attr('action', '<?= SITE_URL ?>/kategori/save');
        $("#formModalLabel").html('Tambah Kategori');   
        $("#formModal").modal('show');   
    })

    /**
      * Untuk menampilkan modal ubah
     */
    $('.btn-ubah').on('click', function(){
        const id = $(this).data('id');
        $("#formModalLabel").html('Ubah Kategori');
        $('#formData').attr('action', '<?= SITE_URL ?>/kategori/update');

        $.ajax({
            url : '<?= SITE_URL ?>/kategori/get-detail',
            data : {id : id},
            method : 'post',
            dataType : 'json',
            success : function (data) {
                console.log('ubah data', data);
                $("#id_kategori").val(data.id_kategori);      
                $("#kategori").val(data.nama_kategori);      
                $("#formModal").modal('show');      
            }
        })
    })
</script>