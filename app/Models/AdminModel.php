<?php
class AdminModel extends Model
{
    public function getAll()
    {
        $sql = " SELECT * FROM admin ";
        $query = $this->db->query($sql);

        $hasil = [];
        while ($data = $query->fetch_assoc()) {
            $hasil[] = $data;
        }
        return $hasil;
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM admin WHERE id_admin = $id";
        $query = $this->db->query($sql);
        return $query->fetch_assoc();
    }

    public function insert($data)
    {
        $nama = $data['nama'];
        $username = $data['username'];
        $jenkel = $data['jenkel'];
        $noHp = $data['no_hp'];
        $password = $data['password'];
        $address = $data['address'];
        $sql = "INSERT into admin (nama, username, jenkel, no_hp, password, alamat) 
        VALUES('$nama', '$username', '$jenkel', '$noHp', '$password', '$address')";
        // echo 'ini di model', $sql;
        return $this->db->query($sql);
    }

    public function update($id, $data)
    {
        $nama = $data['nama'];
        $username = $data['username'];
        $jenkel = $data['jenkel'];
        $noHp = $data['no_hp'];
        $password = $data['password'];
        $address = $data['address'];
        $sql = "UPDATE admin SET
        nama = '$nama', 
        username = '$username', 
        jenkel = '$jenkel', 
        no_hp = '$noHp',
        alamat='$address' WHERE id_admin = $id ";
        return $this->db->query($sql);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM admin WHERE id_admin = $id";
        return $this->db->query($sql);
    }
}
