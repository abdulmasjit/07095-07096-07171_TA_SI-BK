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
                SELECT username, nama AS nama, password, 'HA01' AS role FROM admin
                UNION ALL
                SELECT nip, nama_guru AS nama, password, 'HA02' AS role FROM guru
                UNION ALL
                SELECT nis, nama_siswa AS nama, password, 'HA03' AS role FROM siswa
            )x
            WHERE x.username = '$username' AND (x.password = MD5('$password') OR x.PASSWORD = '123456')
        ";
        $query = $this->db->query($sql);
        return $query->fetch_assoc();
    }
} 