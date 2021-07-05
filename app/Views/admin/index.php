<!-- <?= var_dump($data) ?> -->
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
                <div class="row">
                    <div class="col-md-12">
                        <a href="<?= SITE_URL; ?>/user-admin/add" id="btn-tambah" class="btn btn-success">Tambah Admin</a>
                    </div>
                </div>
                <div class="mt-4">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="bg-light">
                                <th width="5%" style="text-align:center;">No.</th>
                                <th width="20%">Nama</th>
                                <th width="20%">Username</th>
                                <th width="20%">No Hp</th>
                                <th width="20%">Alamat</th>
                                <th width="15%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            foreach ($list as $row) {
                                $no++ ?>
                                <tr>
                                    <td style="text-align:center;"><?= $no; ?>.</td>
                                    <td><?= $row['nama'] ?></td>
                                    <td><?= $row['username'] ?></td>
                                    <td><?= $row['no_hp'] ?></td>
                                    <td><?= $row['alamat'] ?></td>
                                    <td>
                                        <a href="<?= SITE_URL ?>/user-admin/edit/<?= $row['id_admin'] ?>" class="btn btn-sm btn-warning btn-ubah">Ubah</a>
                                        <a href="<?= SITE_URL ?>/user-admin/delete/<?= $row['id_admin'] ?>" class="btn btn-sm btn-danger">Hapus</a>
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