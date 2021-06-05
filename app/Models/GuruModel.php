<?php
class GuruModel extends Model
{
    public function getAll()
    {
        $sql = " SELECT * FROM guru ";
        $query = $this->db->query($sql);

        $hasil = [];
        while ($data = $query->fetch_assoc()) {
            $hasil[] = $data;
        }
        return $hasil;
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM guru WHERE id_guru = $id";
        $query = $this->db->query($sql);
        return $query->fetch_assoc();
    }

    public function insert($data)
    {
        $sql = "INSERT into guru (nama_guru, nip, jenkel, no_hp, password, alamat) 
        VALUES('" . $data['name'] . "', '" . $data['nip'] . "', '" . $data['sex'] . "', 
        '" . $data['no_hp'] . "', '" . $data['password'] . "', '" . $data['address'] . "')";
        // echo 'ini di model', $sql;
        return $this->db->query($sql);
    }

    public function update($id, $data)
    {
        $sql = "UPDATE guru SET nama_guru = '" . $data['name'] . "', 
        nip = '" . $data['nip'] . "', jenkel= '" . $data['sex'] . "', 
        no_hp='" . $data['no_hp'] . "', alamat='" . $data['address'] . "' WHERE id_guru = $id ";
        return $this->db->query($sql);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM guru WHERE id_guru = $id";
        return $this->db->query($sql);
    }
}
