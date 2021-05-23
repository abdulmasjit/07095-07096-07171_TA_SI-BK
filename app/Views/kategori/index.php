<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
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
            <a href="javascript:;" id="btn-tambah" class="btn btn-success">Tambah</a>
          </div>
        </div>
        <div class="mt-4">
          <table class="table table-bordered">
            <thead>
              <tr>
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
<?php include 'form_modal.php'; ?>
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