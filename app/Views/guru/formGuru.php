<!-- <?= var_dump($data) ?> -->
<div class="card">
    <div class="card-header c-header">
        <span><b><?= $title ?></b></span>
    </div>
    <div class="card-body">
        <form class="" action="<?= SITE_URL; ?>/guru/simpan" method="POST">
            <input type="hidden" name="id" value="<?= $form['id_guru'] ?>" />
            <div class="row gap-3">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="nip" class="form-label">NIP</label>
                        <input id="nip" name="nip" class="form-control" type="number" class="w-full" value="<?= $form['nip'] ?>" required />
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input id="name" name="name" class="form-control" value="<?= $form['nama_guru'] ?>" type="text" class="w-full" required />
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input id="password" name="password" class="form-control" value="<?= $form['password'] ?>" type="password" class="w-full" required />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="no_hp" class="form-label">No. Telephone</label>
                        <input id="no_hp" name="no_hp" class="form-control" type="number" value="<?= $form['no_hp'] ?>" class="w-full" required />
                    </div>
                    <div class="mb-3">
                        <?php $interests = array(
                            'L' => 'Pria',
                            'P' => 'Perempuan',
                        ); ?>
                        <label for="sex">Jenis Kelamin</label>
                        <select id="sex" name="sex" class="form-control" value="<?= $form['jenkel'] ?>" required>
                            <?php foreach ($interests as $var => $interest) : ?>
                                <option value="<?php echo $var ?>" <?php if ($var == $form['jenkel']) : ?> selected="selected" <?php endif; ?>><?php echo $interest ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Alamat</label>
                        <textarea class="form-control" id="address" name="address" rows="1">
                        <?= $form['alamat']; ?></textarea>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end mt-2">
                <button class="btn btn-primary float-end" type="submit">Simpan</button>
            </div>
        </form>
    </div>
</div>