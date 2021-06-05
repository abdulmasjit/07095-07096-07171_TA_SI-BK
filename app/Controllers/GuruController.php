<?php
class GuruController extends Controller
{
    public function __construct()
    {
        $this->guruModel = $this->model('GuruModel');
    }

    public function index()
    {
        $data['title'] = 'Master Guru';
        $data['list'] = $this->guruModel->getAll();
        $data['content'] = "guru/index.php";
        $this->view('layout/template', $data);
    }

    public function create()
    {
        $data['title'] = 'Tambah Guru';
        $data['form'] = array(
            'id_guru' => null,
            'nip' => null,
            'nama_guru' => null,
            'jenkel' => null,
            'no_hp' => null,
            'password' => null,
            'alamat' => null
        );
        $data['content'] = "guru/formGuru.php";
        $this->view('layout/template', $data);
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Guru';
        $data['form'] = $this->guruModel->getById($id);
        $data['content'] = "guru/formGuru.php";
        $this->view('layout/template', $data);
    }

    public function store()
    {
        $id = $_POST['id'];
        $data = array(
            'name' => $_POST['name'],
            'nip' => $_POST['nip'],
            'sex' => $_POST['sex'],
            'no_hp' => $_POST['no_hp'],
            'password' => $_POST['password'],
            'address' => $_POST['address']
        );
        $save = null;
        if ($id) {
            $save = $this->guruModel->update($id, $data);
        } else {
            $save = $this->guruModel->insert($data);
        }

        // echo 'ini di cont', $save;
        // return hasil query save 1
        if ($save) {
            Flasher::setFlash('Data Guru berhasil ditambahkan', 'Berhasil', 'success');
            header('location:' . SITE_URL . '/guru');
        } else {
            Flasher::setFlash('Data Guru gagal ditambahkan', 'Gagal', 'danger');
            header('location:' . SITE_URL . '/guru');
        }
    }

    public function delete($id)
    {
        $delete = $this->guruModel->delete($id);
        if ($delete) {
            Flasher::setFlash('Data guru berhasil dihapus', 'Berhasil', 'success');
            header('location:' . SITE_URL . '/guru');
        } else {
            Flasher::setFlash('Data guru gagal dihapus', 'Gagal', 'danger');
            header('location:' . SITE_URL . '/guru');
        }
    }
}
