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
                        <a href="<?= SITE_URL; ?>/guru/add" id="btn-tambah" class="btn btn-success">Tambah Guru</a>
                    </div>
                </div>
                <div class="mt-4">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="bg-light">
                                <th width="10%" style="text-align:center;">No.</th>
                                <th width="25%">Nama Guru</th>
                                <th width="20%">NIP</th>
                                <th width="25%">Alamat</th>
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
                                    <td><?= $row['nama_guru'] ?></td>
                                    <td><?= $row['nip'] ?></td>
                                    <td><?= $row['alamat'] ?></td>
                                    <td>
                                        <a href="<?= SITE_URL ?>/guru/edit/<?= $row['id_guru'] ?>" class="btn btn-sm btn-warning btn-ubah">Ubah</a>
                                        <a href="<?= SITE_URL ?>/guru/delete/<?= $row['id_guru'] ?>" class="btn btn-sm btn-danger">Hapus</a>
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