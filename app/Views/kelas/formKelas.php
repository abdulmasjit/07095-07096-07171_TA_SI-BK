<!-- <?= var_dump($data) ?> -->
<div class="card">

    <div class="card-header c-header">
        <span><b><?= $title ?></b></span>
    </div>
    <div class="card-body">
        <form class="" action="<?= SITE_URL; ?>/kelas/simpan" method="POST">
            <input type="hidden" name="id" value="<?= $form['id_kelas'] ?>" />
            <div class="">
                <div class="mb-3">
                    <label for="nama" class="form-label">Kelas</label>
                    <input id="nama" name="nama" class="form-control" value="<?= $form['nama_kelas'] ?>" type="text" class="w-full" required />
                </div>
                <div class="mb-3">
                    <label for="idwalikelas" class="form-label">ID Wali Kelas</label>
                    <input id="idwalikelas" name="idwalikelas" class="form-control" value="<?= $form['id_walikelas'] ?>" type="text" class="w-full" required />
                </div>
                <div class="mb-3">
                    <label for="dayatampung" class="form-label">Daya Tampung</label>
                    <input id="dayatampung" name="dayatampung" class="form-control" value="<?= $form['daya_tampung'] ?>" type="text" class="w-full" required />
                </div>
            </div>
            <div class="d-flex justify-content-end mt-2">
                <a href="<?= SITE_URL; ?>/kelas" class="btn btn-secondary mr-3">Batal</a>
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