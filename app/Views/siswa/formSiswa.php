<div class="card">
    <div class="card-header c-header">
        <span><b>Tambah Siswa</b></span>
				<a href="<?= SITE_URL; ?>/siswa" class="btn btn-sm btn-success" style="float:right; margin-bottom:-5px;">Kembali</a>
    </div>
    <form action="<?= SITE_URL; ?>/siswa/save" method="POST">
      <div class="card-body">
          <div class="row">
              <div class="col-md-12">
									<input type="hidden" name="id_siswa" id="id_siswa" class="form-control" value="<?= (isset($detail)) ? $detail['id_siswa'] : '' ?>">
                  <h6>Data Diri</h6>
                  <div class="form-group">
                      <label for="nis">NIS</label>
                      <input type="text" name="nis" id="nis" class="form-control" placeholder="NIS . . . " value="<?= (isset($detail)) ? $detail['nis'] : '' ?>" required>
                  </div>
                  <div class="form-group">
                      <label for="nama">Nama</label>
                      <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama . . . " value="<?= (isset($detail)) ? $detail['nama_siswa'] : '' ?>" required>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                          <label for="kelas">Kelas</label>
                          <select class="form-control" name="kelas" id="kelas" required>
                            <option value="">Pilih Kelas</option>
														<?php foreach ($data_kelas as $row) { ?>
                            	<option  
                                <?php if(isset($detail)){
                                  if($detail['id_kelas']==$row['id_kelas']){
                                    echo 'selected ';
                                  }
                                } ?>
                              value="<?= $row['id_kelas'] ?>"><?= $row['nama_kelas'] ?></option>
														<?php } ?>
                          </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                          <?php 
                            $listJenkel = array(
                              'L' => 'Laki - laki',
                              'P' => 'Perempuan',
                            ) 
                          ?>
                          <label for="jenkel">Jenis Kelamin</label>
                          <select class="form-control" name="jenkel" id="jenkel" required>
                            <option value="">Pilih Jenis Kelamin</option>
                            <?php foreach ($listJenkel as $key => $value) { ?>
                              <option
                                <?php if(isset($detail)){
                                  if($detail['jenkel']==$key){
                                    echo 'selected ';
                                  }
                                } ?>
                               value="<?= $key ?>"><?= $value ?></option>
                            <?php } ?>
                          </select>
                      </div>
                    </div>
                  </div>
                  <br>
                  <h6>Kontak & Alamat</h6>
                  <div class="form-group">
                      <label for="no_hp">No Telp / Hp</label>
                      <input type="number" name="no_hp" id="no_hp" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==13) return false;" class="form-control" value="<?= (isset($detail)) ? $detail['no_hp'] : '' ?>" placeholder="No Hp . . . ">
                  </div>
                  <div class="form-group">
                      <label for="alamat">Alamat</label>
                      <textarea name="alamat" id="alamat" class="form-control" placeholder="Alamat . . . "><?= (isset($detail)) ? $detail['alamat'] : '' ?></textarea>
                  </div>
                  <br>
                  <h6>Akun</h6>
                  <div class="alert alert-warning">
                    <?php if(isset($detail)){
                      echo 'Kosongkan password jika tidak ingin merubah password.';
                    }else{
                      echo 'Jika password dikosongkan, password akan digenerate otomatis "123456" oleh sistem.';
                    } ?>
                  </div>
                  <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" name="password" id="password" class="form-control" placeholder="Password . . . ">
                  </div>
              </div>
          </div>
      </div>
      <div class="card-footer text-right">
          <a href="<?= SITE_URL; ?>/siswa" class="btn btn-secondary">Batal</a>
          <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </form>
</div>