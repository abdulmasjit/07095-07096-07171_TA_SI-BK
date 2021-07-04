<?php
class AdminController extends Controller
{
    public function __construct()
    {
        $this->adminModel = $this->model('AdminModel');
    }

    public function index()
    {
        $data['title'] = 'Master Admin';
        $data['list'] = $this->adminModel->getAll();
        $data['content'] = "admin/index.php";
        $this->view('layout/template', $data);
    }

    public function create()
    {
        $data['title'] = 'Tambah Admin';
        $data['form'] = array(
            'id_admin' => null,
            'nama' => null,
            'jenkel' => null,
            'no_hp' => null,
            'password' => null,
            'username' => null,
            'alamat' => null
        );
        $data['content'] = "admin/formAdmin.php";
        $this->view('layout/template', $data);
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Admin';
        $data['form'] = $this->adminModel->getById($id);
        $data['content'] = "admin/formAdmin.php";
        $this->view('layout/template', $data);
    }

    public function store()
    {
        $id = $_POST['id'];
        $data = array(
            'nama' => $_POST['nama'],
            'username' => $_POST['username'],
            'sex' => $_POST['sex'],
            'no_hp' => $_POST['no_hp'],
            'password' => $_POST['password'],
            'address' => $_POST['address']
        );
        $save = null;
        $editOrAdd = null;
        if ($id) {
            $save = $this->adminModel->update($id, $data);
            $editOrAdd = 'diubah';
        } else {
            $save = $this->adminModel->insert($data);
            $editOrAdd = 'ditambah';
        }

        // echo 'ini di cont', $save;
        // return hasil query save 1
        if ($save) {
            Flasher::setFlash("Data Admin berhasil $editOrAdd", 'Berhasil', 'success');
            header('location:' . SITE_URL . '/user-admin');
        } else {
            Flasher::setFlash("Data Admin gagal $editOrAdd", 'Gagal', 'danger');
            header('location:' . SITE_URL . '/user-admin');
        }
    }

    public function delete($id)
    {
        $delete = $this->adminModel->delete($id);
        if ($delete) {
            Flasher::setFlash('Data Admin berhasil dihapus', 'Berhasil', 'success');
            header('location:' . SITE_URL . '/user-admin');
        } else {
            Flasher::setFlash('Data Admin gagal dihapus', 'Gagal', 'danger');
            header('location:' . SITE_URL . '/user-admin');
        }
    }
}
