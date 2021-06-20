<!-- <?= var_dump($form) ?> -->
<!-- <?= date("Y-m-d H:i:s"); ?> -->
<div class="card">
    <div class="card-header c-header">
        <span><b><?= $title ?></b></span>
    </div>
    <div class="card-body">
        <form class="" action="<?= SITE_URL; ?>/pelanggaran-siswa/simpan" method="POST">
            <input type="hidden" name="id" value="<?= $form['id'] ?>" />
            <div class="">
                <div class="mb-3">
                    <label for="idNamaPelanggaran" class="form-label">Nama Pelanggaran</label>
                    <select name="id_nama_pelanggaran" id="idNamaPelanggaran" class="form-control" required>
                        <option value="">Pilih Nama Pelanggaran</option>
                        <?php foreach ($listPelanggaran as $key) : ?>
                            <option value="<?php echo $key['id_pelanggaran'] ?>" <?php if ($key['id_pelanggaran'] == $form['id_pelanggaran']) : ?> selected="selected" <?php endif; ?>><?php echo $key['nama_pelanggaran'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="idNamaPelanggar" class="form-label">Nama Pelanggar</label>
                    <select name="id_nama_pelanggar" id="idNamaPelanggar" class="form-control" required>
                        <option value="">Pilih Nama Pelanggar</option>
                        <?php foreach ($listSiswa as $key) : ?>
                            <option value="<?php echo $key['id_siswa'] ?>" <?php if ($key['id_siswa'] == $form['id_siswa']) : ?> selected="selected" <?php endif; ?>><?php echo $key['nama_siswa'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="idTglMelanggar" class="form-label">Tanggal Melanggar</label>
                    <input type="date" name="tgl_melanggar" id="idTglMelanggar" class="form-control" value="<?= $form['tgl_melanggar'] ?>" required>
                </div>
                <div class="mb-3">
                    <label for="idLokasiMelanggar" class="form-label">Lokasi Melanggar</label>
                    <input id="idLokasiMelanggar" name="lokasi_melanggar" class="form-control" class="w-full" value="<?= $form['tempat'] ?>" required />
                </div>
                <div class="mb-3">
                    <label for="idKeterangan" class="form-label">Keterangan</label>
                    <textarea id="idKeterangan" name="keterangan" class="form-control" class="w-full" value="<?= $form['keterangan'] ?>"></textarea>
                </div>
            </div>
            <div class="d-flex justify-content-end mt-2">
                <a href="<?= SITE_URL; ?>/pelanggaran-siswa" class="btn btn-secondary mr-3">Batal</a>
                <button class="btn btn-primary float-end" type="submit">Simpan</button>
            </div>
        </form>
    </div>
</div>