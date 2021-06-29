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
        $namaKelas = $data['nama_kelas'];
        $idWalikelas = $data['id_walikelas'];
        $dayatampung = $data['daya_tampung'];
        $sql = "INSERT INTO kelas (nama_kelas, id_walikelas, daya_tampung) 
        VALUES ('$namaKelas', $idWalikelas, $dayatampung)";
        return $this->db->query($sql);
    }

    public function update($id, $data)
    {
        $namaKelas = $data['nama_kelas'];
        $idWalikelas = $data['id_walikelas'];
        $dayatampung = $data['daya_tampung'];
        $sql = "UPDATE kelas SET 
        nama_kelas = '$namaKelas',
        id_walikelas = '$idWalikelas', 
        daya_tampung = '$dayatampung'  
        WHERE id_kelas = $id ";
        return $this->db->query($sql);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM kelas WHERE id_kelas = $id";
        return $this->db->query($sql);
    }
}
