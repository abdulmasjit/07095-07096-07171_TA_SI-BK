<?php
class PelanggaranSiswaController extends Controller
{
    public function __construct()
    {
        $this->pelanggaranModel = $this->model('PelanggaranModel');
        $this->pelanggaranSiswaModel = $this->model('PelanggaranSiswaModel');
        $this->siswaModel = $this->model('SiswaModel');
    }

    public function index()
    {
        $data['title'] = 'Pelanggaran Siswa';
        $data['list'] = $this->pelanggaranSiswaModel->getAll();
        $data['content'] = "pelanggaran-siswa/index.php";
        $this->view('layout/template', $data);
    }

    public function create()
    {
        $data['title'] = 'Tambah Pelanggaran Siswa';
        $data['form'] = array(
            'id' => null,
            'id_pelanggaran' => null,
            'id_siswa' => null,
            'tgl_melanggar' => null,
            'tempat' => null,
            'keterangan' => null
        );
        $data['listPelanggaran'] = $this->pelanggaranModel->getAll();
        $data['listSiswa'] = $this->siswaModel->getAll();
        $data['content'] = "pelanggaran-siswa/formPelanggaranSiswa.php";
        $this->view('layout/template', $data);
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Pelanggaran Siswa';
        $data['form'] = $this->pelanggaranSiswaModel->getById($id);
        $data['listPelanggaran'] = $this->pelanggaranModel->getAll();
        $data['listSiswa'] = $this->siswaModel->getAll();
        $data['content'] = "pelanggaran-siswa/formPelanggaranSiswa.php";
        $this->view('layout/template', $data);
    }

    public function store()
    {
        $id = $_POST['id'];
        $data = array(
            'id_pelanggaran' => $_POST['id_nama_pelanggaran'],
            'id_siswa' => $_POST['id_nama_pelanggar'],
            'tgl_melanggar' => $_POST['tgl_melanggar'],
            'tempat' => $_POST['lokasi_melanggar'],
            'keterangan' => $_POST['keterangan']
        );
        $save = null;
        $editOrAdd = null;
        if ($id) {
            $save = $this->pelanggaranSiswaModel->update($id, $data);
            $editOrAdd = 'diubah';
        } else {
            $save = $this->pelanggaranSiswaModel->insert($data);
            $editOrAdd = 'ditambah';
        }

        // echo 'ini di cont', $save;
        // return hasil query save 1
        if ($save) {
            Flasher::setFlash("Data Pelanggaran Siswa berhasil $editOrAdd", 'Berhasil', 'success');
            header('location:' . SITE_URL . '/pelanggaran-siswa');
        } else {
            Flasher::setFlash("Data Pelanggaran Siswa gagal $editOrAdd", 'Gagal', 'danger');
            header('location:' . SITE_URL . '/pelanggaran-siswa');
        }
    }

    public function delete($id)
    {
        $delete = $this->pelanggaranSiswaModel->delete($id);
        if ($delete) {
            Flasher::setFlash('Data pelanggaran berhasil dihapus', 'Berhasil', 'success');
            header('location:' . SITE_URL . '/pelanggaran-siswa');
        } else {
            Flasher::setFlash('Data pelanggaran gagal dihapus', 'Gagal', 'danger');
            header('location:' . SITE_URL . '/pelanggaran-siswa');
        }
    }
}
