<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header c-header">
                <span><b><?= $title ?></b></span>
            </div>
            <div class="card-body">
                <!-- Pesan -->
                <div class="row">
                    <div class="col-md-12">
                        <?php Flasher::flashMessage(); ?>
                    </div>
                </div>
                <!-- <?= var_dump($list) ?> -->
                <div class="row">
                    <div class="col-md-12">
                        <a href="<?= SITE_URL; ?>/kelas/add" id="btn-tambah" class="btn btn-success">Tambah Kelas</a>
                    </div>
                </div>
                <div class="mt-4">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="bg-light">
                                <th width="10%" style="text-align:center;">No.</th>
                                <th width="10%">Kelas</th>
                                <th width="10%">ID Wali Kelas</th>
                                <th width="10%">Daya Tampung</th>
                                <th width="20%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            foreach ($list as $row) {
                                $no++ ?>
                                <tr>
                                    <td style="text-align:center;"><?= $no; ?>.</td>
                                    <td><?= $row['nama_kelas'] ?></td>
                                    <td><?= $row['id_walikelas'] ?></td>
                                    <td><?= $row['daya_tampung'] ?></td>
                                    <td>
                                        <a href="<?= SITE_URL ?>/kelas/edit/<?= $row['id_kelas'] ?>" class="btn btn-sm btn-warning btn-ubah">Ubah</a>
                                        <a href="<?= SITE_URL ?>/kelas/delete/<?= $row['id_kelas'] ?>" class="btn btn-sm btn-danger">Hapus</a>
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