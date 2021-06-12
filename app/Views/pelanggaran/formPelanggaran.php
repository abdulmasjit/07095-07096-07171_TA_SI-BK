<!-- <?= var_dump($data) ?> -->
<div class="card">
    <div class="card-header c-header">
        <span><b><?= $title ?></b></span>
    </div>
    <div class="card-body">
        <form class="" action="<?= SITE_URL; ?>/pelanggaran/simpan" method="POST">
            <input type="hidden" name="id" value="<?= $form['id_pelanggaran'] ?>" />
            <div class="">
                <div class="mb-3">
                    <label for="point" class="form-label">Point</label>
                    <input id="point" name="point" class="form-control" type="number" min="0" max="100" class="w-full" value="<?= $form['point'] ?>" required />
                </div>
                <div class="mb-3">
                    <label for="namaPelanggaran" class="form-label">Nama Pelanggaran</label>
                    <input id="namaPelanggaran" name="namaPelanggaran" class="form-control" value="<?= $form['nama_pelanggaran'] ?>" type="text" class="w-full" required />
                </div>
                <div class="mb-3">
                    <label for="kategori" class="form-label">Nama Pelanggaran</label>
                    <select name="kategori" id="kategori" class="form-control" required>
                        <option value="">Pilih Kategori Pelanggaran</option>
                        <?php foreach ($listKategori as $key) : ?>
                            <option value="<?php echo $key['id_kategori'] ?>" <?php if ($key['id_kategori'] == $form['id_kategori']) : ?> selected="selected" <?php endif; ?>><?php echo $key['nama_kategori'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="d-flex justify-content-end mt-2">
                <a href="<?= SITE_URL; ?>/pelanggaran" class="btn btn-secondary mr-3">Batal</a>
                <button class="btn btn-primary float-end" type="submit">Simpan</button>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function() {
        var type = getSelection
        $('input[type="number"]').keydown(function() {
            // Save old value.
            if (!$(this).val() || (parseInt($(this).val()) <= 100 && parseInt($(this).val()) >= 0))
                $(this).data("old", $(this).val());
        });
        $('input[type="number"]').keyup(function() {
            // Check correct, else revert back to old value.
            if (!$(this).val() || (parseInt($(this).val()) <= 100 && parseInt($(this).val()) >= 0))
            ;
            else
                $(this).val($(this).data("old"));
        });
    });
</script>