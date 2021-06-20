<?php
class KelasModel extends Model
{
    public function getAll()
    {
        $sql = " SELECT * FROM kelas ";
        $query = $this->db->query($sql);

        $hasil = [];
        while ($data = $query->fetch_assoc()) {
            $hasil[] = $data;
        }
        return $hasil;
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM kelas WHERE id_kelas = $id";
        $query = $this->db->query($sql);
        return $query->fetch_assoc();
    }

    public function insert($data)
    {
        // echo 'ini insert', var_dump($data);
        $namaSiswa = $data['nama_siswa'];
        $kelas = $data['kelas'];
        $sql = "INSERT INTO kelas (nama_siswa, kelas) 
        VALUES ('$namaSiswa', $kelas)";
        return $this->db->query($sql);
    }

    public function update($id, $data)
    {
        $nama = $data['nama_siswa'];
        $kelas = $data['kelas'];
        $sql = "UPDATE kelas SET 
        nama_siswa = '$nama',
        kelas = '$kelas' 
        WHERE id_kelas = $id ";
        return $this->db->query($sql);

    }

    public function delete($id)
    {
        $sql = "DELETE FROM kelas WHERE id_kelas = $id";
        return $this->db->query($sql);
    }
}
