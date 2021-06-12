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
                        <a href="<?= SITE_URL; ?>/pelanggaran/add" id="btn-tambah" class="btn btn-success">Tambah Pelanggaran</a>
                    </div>
                </div>
                <div class="mt-4">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="bg-light">
                                <th width="10%" style="text-align:center;">No.</th>
                                <th width="25%">Nama Pelanggaran</th>
                                <th width="25%">Kategori</th>
                                <th width="20%">Point</th>
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
                                    <td><?= $row['nama_pelanggaran'] ?></td>
                                    <td><?= $row['nama_kategori'] ?></td>
                                    <td><?= $row['point'] ?></td>
                                    <td>
                                        <a href="<?= SITE_URL ?>/pelanggaran/edit/<?= $row['id_pelanggaran'] ?>" class="btn btn-sm btn-warning btn-ubah">Ubah</a>
                                        <a href="<?= SITE_URL ?>/pelanggaran/delete/<?= $row['id_pelanggaran'] ?>" class="btn btn-sm btn-danger">Hapus</a>
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