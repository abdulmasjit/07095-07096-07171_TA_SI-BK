<?php 
class PantauPelanggaranController extends Controller{
  public function __construct()
  {
      $this->siswaModel = $this->model('SiswaModel');
      $this->pelanggaranSiswaModel = $this->model('PelanggaranSiswaModel');
  }

  public function index()
  {
    $keyword = (isset($_POST['cari'])) ? $_POST['cari'] : '';
    $data['title'] = 'Pelanggaran Siswa';
    $data['data_kelas'] = $this->siswaModel->getListKelas();
    $data['list'] = $this->siswaModel->getAll($keyword);
    $data['content'] = "pantau-pelanggaran/index.php";
    $this->view('layout/template', $data);
  }

  public function detailPelanggaran($id)
  {
    $data['title'] = 'Pelanggaran Siswa';
    $data['content'] = "pantau-pelanggaran/detailPelanggaran.php";
    $data['list'] = $this->pelanggaranSiswaModel->pelanggaranByIdSiswa($id);
    $this->view('layout/template', $data);
  }

}