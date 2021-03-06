<nav id="sidebar" class="sidebar-wrapper col-md-3 col-lg-2 d-md-block sidebar collapse">
    <div class="sidebar-content">
        <div class="sidebar-menu">
            <ul>
                <li class="header-menu" style="color:#f7f7f7 !important;"><span>Menu</span></li>
                <li><a href="<?= SITE_URL; ?>/home"><i class="fa fa-home"></i><span>Home</span></a></li>
                <?php
                $role = $_SESSION['user']['role'];
                /**
                 * HA01 => Admin
                 * HA02 => Guru
                 * HA03 => Siswa
                 */
                if ($role == 'HA01') { ?>
                    <li class="sidebar-dropdown">
                        <a href="#"><i class="fa fa-list"></i><span>Master Data</span></a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li><a href="<?= SITE_URL; ?>/user-admin">Admin</a></li>
                                <li><a href="<?= SITE_URL; ?>/kelas">Kelas</a></li>
                                <li><a href="<?= SITE_URL; ?>/guru">Guru</a></li>
                                <li><a href="<?= SITE_URL; ?>/kategori">Kategori</a></li>
                                <li><a href="<?= SITE_URL; ?>/pelanggaran">Pelanggaran</a></li>
                            </ul>
                        </div>
                    </li>
                    <li><a href="<?= SITE_URL; ?>/siswa"><i class="fa fa-users"></i><span>Data Siswa</span></a></li>
                    <li><a href="<?= SITE_URL; ?>/pelanggaran-siswa"><i class="fa fa-edit"></i><span>Pelanggaran Siswa</span></a></li>
                <?php } else if ($role == 'HA02' || $role == 'HA03') { ?>
                    <li><a href="<?= SITE_URL; ?>/pantau-pelanggaran"><i class="fa fa-copy"></i><span>Pelanggaran Siswa</span></a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>