<?php
class KelasController extends Controller
{

  public function __construct()
  {
    $this->KelasModel = $this->model('KelasModel');
    $this->GuruModel = $this->model('GuruModel');
  }

  public function index()
  {
    $data['title'] = 'Master Kelas';
    $data['list'] = $this->KelasModel->getAll();
    $data['content'] = "kelas/index.php";
    $this->view('layout/template', $data);
  }

  public function getDetail()
  {
    $id = $_POST['id'];
    $data = $this->KelasModel->getById($id);
    echo json_encode($data);
  }

  public function create()
  {
      $data['title'] = 'Tambah Kelas';
      $data['listKelas'] = $this->GuruModel->getAll();
      $data['content'] = "kelas/formKelas.php";
      $this->view('layout/template', $data);
      $data['form'] = array(
        'id' => null,
        'nama_kelas' => null,
        'id_walikelas' => null,
        'daya_tampung' => null,
      );
      $data['listKelas'] = $this->GuruModel->getAll();
      $data['content'] = "kelas/formKelas.php";
      $this->view('layout/template', $data);
  }

  public function save()
  {
    $data = array(
      'nama' => $_POST['Kelas']
    );
    $save = $this->KelasModel->insert($data);
    // return hasil query save 1
    if ($save) {
      Flasher::setFlash('Data Kelas berhasil ditambahkan', 'Berhasil', 'success');
      header('location:' . SITE_URL . '/Kelas');
    } else {
      Flasher::setFlash('Data Kelas gagal ditambahkan', 'Gagal', 'danger');
      header('location:' . SITE_URL . '/Kelas');
    }
  }

  public function update()
  {
    $id = $_POST['id_Kelas'];
    $data = array(
      'nama' => $_POST['Kelas']
    );
    $update = $this->KelasModel->update($id, $data);
    if ($update) {
      Flasher::setFlash('Data Kelas berhasil diupdate', 'Berhasil', 'success');
      header('location:' . SITE_URL . '/Kelas');
    } else {
      Flasher::setFlash('Data Kelas gagal diupdate', 'Gagal', 'danger');
      header('location:' . SITE_URL . '/Kelas');
    }
  }

  public function delete($id)
  {
    $delete = $this->KelasModel->delete($id);
    if ($delete) {
      Flasher::setFlash('Data Kelas berhasil dihapus', 'Berhasil', 'success');
      header('location:' . SITE_URL . '/Kelas');
    } else {
      Flasher::setFlash('Data Kelas gagal dihapus', 'Gagal', 'danger');
      header('location:' . SITE_URL . '/Kelas');
    }
  }
}
