<?php 
class PantauPelanggaranController extends Controller{
  public function __construct()
  {
      $this->siswaModel = $this->model('SiswaModel');
      $this->pelanggaranSiswaModel = $this->model('PelanggaranSiswaModel');
  }

  public function index()
  {
    $data['title'] = 'Pelanggaran Siswa';
    $role = $_SESSION['user']['role'];
    if($role=='HA01' || $role=='HA02'){
      $keyword = (isset($_POST['cari'])) ? $_POST['cari'] : '';
      $idKelas = (isset($_POST['kelas'])) ? $_POST['kelas'] : '';
      $data['detail'] = array(
        'kelas' => $idKelas,  
        'keyword' => $keyword,  
      );
      $data['data_kelas'] = $this->siswaModel->getListKelas();
      $data['list'] = $this->siswaModel->getSiswaByKelas($idKelas, $keyword);
      $data['content'] = "pantau-pelanggaran/index.php";
      $this->view('layout/template', $data);
    }else{
      $id_siswa = $_SESSION['user']['id'];
      $this->detailPelanggaran($id_siswa);
    }
  }

  public function detailPelanggaran($id)
  {
    $data['title'] = 'Pelanggaran Siswa';
    $data['content'] = "pantau-pelanggaran/detailPelanggaran.php";
    $data['list'] = $this->pelanggaranSiswaModel->pelanggaranByIdSiswa($id);
    $data['detail_siswa'] = $this->siswaModel->getById($id);
    $this->view('layout/template', $data);
  }
}