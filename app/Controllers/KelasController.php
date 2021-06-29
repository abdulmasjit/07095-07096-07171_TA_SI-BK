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
    $data['title'] = 'Tambah Pelanggaran';
    $data['form'] = array(
        'id_kelas' => null,
        'nama_kelas' => null,
        'id_walikelas' => null,
        'daya_tampung' => null
    );
    $data['listid_walikelas'] = $this->GuruModel->getAll();
    $data['content'] = "kelas/formKelas.php";
    $this->view('layout/template', $data);
  }

  public function edit($id)
    {
        $data['title'] = 'Edit kelas';
        $data['form'] = $this->KelasModel->getById($id);
        $data['listid_walikelas'] = $this->GuruModel->getAll();
        $data['content'] = "kelas/formKelas.php";
        $this->view('layout/template', $data);
    }

  public function save()
  {
    $id = $_POST['id'];
        $data = array(
            'nama_kelas' => $_POST['nama'],
            'id_walikelas' => $_POST['idwalikelas'],
            'data_tampung' => $_POST['dayatampung'],
        );
        $save = null;
        $editOrAdd = null;
        if ($id) {
            $save = $this->KelasModel->update($id, $data);
            $editOrAdd = 'diubah';
        } else {
            $save = $this->KelasModel->insert($data);
            $editOrAdd = 'ditambah';
        }

        // echo 'ini di cont', $save;
        // return hasil query save 1
        if ($save) {
            Flasher::setFlash("Data Kelas berhasil $editOrAdd", 'Berhasil', 'success');
            header('location:' . SITE_URL . '/kelas');
        } else {
            Flasher::setFlash("Data Kelas gagal $editOrAdd", 'Gagal', 'danger');
            header('location:' . SITE_URL . '/kelas');
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
