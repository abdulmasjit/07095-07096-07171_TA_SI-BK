<?php
class AuthModel extends Model {
    /**
     * Keterangan Hak Akses / Role
     * HA01 = Admin
     * HA02 = Guru
     * HA03 = Siswa
     */
    public function checkAuth($username, $password)
    {
        $sql = "
            SELECT * FROM (
                SELECT id_admin AS id, username, nama AS nama, password, 'HA01' AS role, 'ADMIN' AS nama_role FROM admin
                UNION ALL
                SELECT id_guru AS id, nip AS username, nama_guru AS nama, password, 'HA02' AS role, 'GURU' AS nama_role FROM guru
                UNION ALL
                SELECT id_siswa AS id, nis AS username, nama_siswa AS nama, password, 'HA03' AS role, 'SISWA' AS nama_role FROM siswa
            )x
            WHERE x.username = '$username' AND (x.password = MD5('$password') OR x.PASSWORD = '$password')
            LIMIT 1
        ";
        $query = $this->db->query($sql);
        return $query->fetch_assoc();
    }
} 