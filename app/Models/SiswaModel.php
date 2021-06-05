<?php
class SiswaModel extends Model{
    public function getAll(){
        $sql = " SELECT * FROM siswa ";
        $query = $this->db->query($sql);

        $hasil = [];
        while ($data = $query->fetch_assoc()) {
            $hasil[] = $data;
        }
        return $hasil;
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM siswa WHERE id_siswa = $id";
        $query = $this->db->query($sql);
        return $query->fetch_assoc();
    }

    public function insert($data)
    {
        // $sql = "INSERT INTO kategori (nama_kategori) VALUES ('".$data['nama']."')";
        // return $this->db->query($sql);
    }

    public function update($id, $data)
    {
        // $nama = $data['nama'];
        // $sql = "UPDATE kategori SET nama_kategori = '$nama' WHERE id_kategori = $id ";
        // return $this->db->query($sql);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM siswa WHERE id_siswa = $id";
        return $this->db->query($sql);
    }
}