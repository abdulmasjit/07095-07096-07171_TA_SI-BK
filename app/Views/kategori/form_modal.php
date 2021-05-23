<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabel">Tambah Kategori</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formData" action="<?= SITE_URL; ?>/kategori/save"" method="POST">
        <div class="modal-body">
          <input type="text" class="form-control" id="id_kategori" name="id_kategori"></input>
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