<!-- <?= var_dump($data) ?> -->
<div class="card">
    <div class="card-header c-header">
        <span><b><?= $title ?></b></span>
    </div>
    <div class="card-body">
        <form class="" action="<?= SITE_URL; ?>/user-admin/simpan" method="POST">
            <input type="hidden" name="id" value="<?= $form['id_admin'] ?>" />
            <div class="row gap-3">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input id="nama" name="nama" class="form-control" type="text" class="w-full" value="<?= $form['nama'] ?>" required />
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input id="username" name="username" class="form-control" value="<?= $form['username'] ?>" type="text" class="w-full" required />
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input id="password" name="password" class="form-control" <?php if ($form['id_admin']) {
                                                                                        echo "disabled='true'";
                                                                                    } ?> value="<?= $form['password'] ?>" type="password" class="w-full" required />
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
                        <textarea class="form-control" id="address" name="address" rows="1"><?= (isset($form)) ? $form['alamat'] : '' ?></textarea>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end mt-2">
                <a href="<?= SITE_URL; ?>/user-admin" class="btn btn-secondary mr-3">Batal</a>
                <button class="btn btn-primary float-end" type="submit">Simpan</button>
            </div>
        </form>
    </div>
</div>