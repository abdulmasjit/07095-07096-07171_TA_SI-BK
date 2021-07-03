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

  public function create()
  {
    $data['title'] = 'Tambah Kelas';
    $data['form'] = array(
        'id_kelas' => null,
        'nama_kelas' => null,
        'id_walikelas' => null,
        'daya_tampung' => null
    );
    $data['listGuru'] = $this->GuruModel->getAll();
    $data['content'] = "kelas/formKelas.php";
    $this->view('layout/template', $data);
  }

  public function edit($id)
    {
        $data['title'] = 'Edit kelas';
        $data['form'] = $this->KelasModel->getById($id);
        $data['listGuru'] = $this->GuruModel->getAll();
        $data['content'] = "kelas/formKelas.php";
        $this->view('layout/template', $data);
    }

  public function store()
  {
    $id = $_POST['id'];
        $data = array(
            'nama_kelas' => $_POST['nama'],
            'id_walikelas' => $_POST['idwalikelas'],
            'daya_tampung' => $_POST['dayatampung'],
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
      header('location:' . SITE_URL . '/kelas');
    } else {
      Flasher::setFlash('Data Kelas gagal dihapus', 'Gagal', 'danger');
      header('location:' . SITE_URL . '/kelas');
    }
  }
}
