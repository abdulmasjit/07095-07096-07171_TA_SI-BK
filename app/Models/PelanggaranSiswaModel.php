<?php
class PelanggaranSiswaModel extends Model
{
    public function getAll()
    {
        $sql = "SELECT ps.id as id_pelanggaran_siswa,
            ps.id_siswa,
            ps.id_pelanggaran,
            ps.tgl_melanggar,
            ps.waktu_input,
            ps.tempat,
            ps.keterangan,
            s.nama_siswa,
            p.nama_pelanggaran 
            from pelanggaran_siswa ps 
            join siswa s 
            on s.id_siswa = ps.id_siswa 
            join pelanggaran p 
            on p.id_pelanggaran = ps.id_pelanggaran";
        $query = $this->db->query($sql);

        $hasil = [];
        while ($data = $query->fetch_assoc()) {
            $hasil[] = $data;
        }
        return $hasil;
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM pelanggaran_siswa ps WHERE ps.id = $id";
        $query = $this->db->query($sql);
        return $query->fetch_assoc();
    }

    public function insert($data)
    {
        // echo 'ini insert', var_dump($data);
        $idSiswa = $data['id_siswa'];
        $idPelanggaran = $data['id_pelanggaran'];
        $tglMelanggar = $data['tgl_melanggar'];
        $waktuInput = date("Y-m-d H:i:s");
        $tempat = $data['tempat'];
        $keterangan = $data['keterangan'];
        $sql = "INSERT INTO pelanggaran_siswa (id_siswa, id_pelanggaran, tgl_melanggar, waktu_input, tempat, keterangan) 
        VALUES ('$idSiswa', $idPelanggaran, '$tglMelanggar', '$waktuInput', '$tempat', '$keterangan')";
        return $this->db->query($sql);
    }

    public function update($id, $data)
    {
        // echo 'ini update', var_dump($data);
        // echo 'in Id =>', $id;

        $idSiswa = $data['id_siswa'];
        $idPelanggaran = $data['id_pelanggaran'];
        $tglMelanggar = $data['tgl_melanggar'];
        $waktuInput = date("Y-m-d H:i:s");
        $tempat = $data['tempat'];
        $keterangan = $data['keterangan'];
        $sql = "UPDATE pelanggaran_siswa SET 
        id_siswa = $idSiswa,
        id_pelanggaran = $idPelanggaran,
        tgl_melanggar = '$tglMelanggar' ,
        waktu_input = '$waktuInput',
        tempat ='$tempat',
        keterangan = '$keterangan'
        WHERE id = $id ";
        // echo 'ini sql', $sql;
        return $this->db->query($sql);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM pelanggaran_siswa WHERE id = $id";
        return $this->db->query($sql);
    }
}
