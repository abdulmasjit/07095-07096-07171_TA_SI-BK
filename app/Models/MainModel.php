<?php
class MainModel extends Model {
    public function getDashboard()
    {
        $query1 = $this->db->query("SELECT COUNT(*) AS jml FROM siswa");
        $query2 = $this->db->query("SELECT COUNT(*) AS jml FROM guru");
        $query3 = $this->db->query("SELECT COUNT(*) AS jml FROM kelas");
        $query4 = $this->db->query("SELECT COUNT(*) AS jml FROM pelanggaran");
        $querySiswa = $query1->fetch_assoc();
        $queryGuru = $query2->fetch_assoc();
        $queryKelas = $query3->fetch_assoc();
        $queryPelanggaran = $query4->fetch_assoc();

        $data = array(
          'total_siswa' => $querySiswa['jml'],
          'total_guru' => $queryGuru['jml'],
          'total_kelas' => $queryKelas['jml'],
          'total_pelanggaran' => $queryPelanggaran['jml'],
        );
        return $data;
    }
} 