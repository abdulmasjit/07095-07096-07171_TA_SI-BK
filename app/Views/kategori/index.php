<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <span><b>Master Kategori</b></span>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">
            <a href="javascript:;" class="btn btn-success">Tambah</a>
          </div>
        </div>
        <div class="mt-4">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th width="5%" style="text-align:center;">No.</th>
                <th width="50%">Kategori</th>
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
                    <a href="javascript:;" class="btn btn-warning">Ubah</a>
                    <a href="javascript:;" class="btn btn-danger">Hapus</a>
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