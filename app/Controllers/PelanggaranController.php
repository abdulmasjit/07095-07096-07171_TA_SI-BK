<?php
class PelanggaranController extends Controller
{
    public function __construct()
    {
        $this->pelanggaranModel = $this->model('PelanggaranModel');
        $this->kategoriModel = $this->model('kategoriModel');
    }

    public function index()
    {
        $data['title'] = 'Master Pelanggaran';
        $data['list'] = $this->pelanggaranModel->getAll();
        $data['content'] = "pelanggaran/index.php";
        $this->view('layout/template', $data);
    }

    public function create()
    {
        $data['title'] = 'Tambah Pelanggaran';
        $data['form'] = array(
            'id_pelanggaran' => null,
            'point' => 0,
            'nama_pelanggaran' => null,
            'id_kategori' => null
        );
        $data['listKategori'] = $this->kategoriModel->getAll();
        $data['content'] = "pelanggaran/formPelanggaran.php";
        $this->view('layout/template', $data);
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Pelanggaran';
        $data['form'] = $this->pelanggaranModel->getById($id);
        $data['listKategori'] = $this->kategoriModel->getAll();
        $data['content'] = "pelanggaran/formPelanggaran.php";
        $this->view('layout/template', $data);
    }

    public function store()
    {
        $id = $_POST['id'];
        $data = array(
            'point' => $_POST['point'],
            'nama_pelanggaran' => $_POST['namaPelanggaran'],
            'id_kategori' => $_POST['kategori']
        );
        $save = null;
        $editOrAdd = null;
        if ($id) {
            $save = $this->pelanggaranModel->update($id, $data);
            $editOrAdd = 'diubah';
        } else {
            $save = $this->pelanggaranModel->insert($data);
            $editOrAdd = 'ditambah';
        }

        // echo 'ini di cont', $save;
        // return hasil query save 1
        if ($save) {
            Flasher::setFlash("Data Pelanggaran berhasil $editOrAdd", 'Berhasil', 'success');
            header('location:' . SITE_URL . '/pelanggaran');
        } else {
            Flasher::setFlash("Data Pelanggaran gagal $editOrAdd", 'Gagal', 'danger');
            header('location:' . SITE_URL . '/pelanggaran');
        }
    }

    public function delete($id)
    {
        $delete = $this->pelanggaranModel->delete($id);
        if ($delete) {
            Flasher::setFlash('Data pelanggaran berhasil dihapus', 'Berhasil', 'success');
            header('location:' . SITE_URL . '/pelanggaran');
        } else {
            Flasher::setFlash('Data pelanggaran gagal dihapus', 'Gagal', 'danger');
            header('location:' . SITE_URL . '/pelanggaran');
        }
    }
}
