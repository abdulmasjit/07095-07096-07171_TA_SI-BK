<?php
class PelanggaranModel extends Model
{
    public function getAll()
    {
        $sql = "SELECT p.id_pelanggaran, 
        p.nama_pelanggaran, p.id_kategori, 
        p.point, k.nama_kategori from pelanggaran p 
        join kategori k on 
        p.id_kategori = k.id_kategori";
        $query = $this->db->query($sql);

        $hasil = [];
        while ($data = $query->fetch_assoc()) {
            $hasil[] = $data;
        }
        return $hasil;
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM pelanggaran p WHERE p.id_pelanggaran = $id";
        $query = $this->db->query($sql);
        return $query->fetch_assoc();
    }

    public function insert($data)
    {
        // echo 'ini insert', var_dump($data);
        $namaPelanggaran = $data['nama_pelanggaran'];
        $point = $data['point'];
        $idKategori = $data['id_kategori'];
        $sql = "INSERT INTO pelanggaran (nama_pelanggaran, point, id_kategori) 
        VALUES ('$namaPelanggaran', $point, $idKategori)";
        return $this->db->query($sql);
    }

    public function update($id, $data)
    {
        $namaPelanggaran = $data['nama_pelanggaran'];
        $point = $data['point'];
        $idKategori = $data['id_kategori'];
        $sql = "UPDATE pelanggaran SET 
        nama_pelanggaran = '$namaPelanggaran',
        point = $point,
        id_kategori = $idKategori 
        WHERE id_pelanggaran = $id ";
        return $this->db->query($sql);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM pelanggaran WHERE id_pelanggaran = $id";
        return $this->db->query($sql);
    }
}
