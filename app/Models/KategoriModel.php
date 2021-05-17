<?php
class KategoriModel extends Model{
  public function getAll(){
    $sql = " SELECT * FROM kategori ";
    $query = $this->db->query($sql);

    $hasil = [];
    while ($data = $query->fetch_assoc()) {
        $hasil[] = $data;
    }
    return $hasil;
  }
}