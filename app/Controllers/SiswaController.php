<?php 
class siswaController extends Controller{
    public function __construct()
    {
        $this->siswaModel = $this->model('SiswaModel');
    }

    public function index()
    {	
		$keyword = (isset($_POST['cari'])) ? $_POST['cari'] : '';
		$data['title'] = 'Master Siswa';
        $data['list'] = $this->siswaModel->getAll($keyword);
        $data['content'] = "siswa/index.php";
        $this->view('layout/template', $data);
    }

    public function create()
    {
        $data['title'] = 'Tambah Siswa';
        $data['data_kelas'] = $this->siswaModel->getListKelas();
        $data['content'] = "siswa/formSiswa.php";
        $this->view('layout/template', $data);
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Siswa';
        $data['data_kelas'] = $this->siswaModel->getListKelas();
        $data['detail'] = $this->siswaModel->getById($id);
        $data['content'] = "siswa/formSiswa.php";
        $this->view('layout/template', $data);
    }

    public function save()
    {
        $id_siswa = $_POST['id_siswa'];
        $data = array(
            'nis' => $_POST['nis'],
            'nama' => $_POST['nama'],
            'jenkel' => $_POST['jenkel'],
            'alamat' => $_POST['alamat'],
            'no_hp' => $_POST['no_hp'],
            'password' => NULL,
            'id_kelas' => $_POST['kelas']
        );
        
        if($id_siswa==""){
			$data['password'] = ($_POST['password'] != '') ? $_POST['password'] : '123456'; // jika kosong default 123456
        	$save = $this->siswaModel->insert($data);
        }else{
			$detail = $this->siswaModel->getById($id_siswa);
			$data['password'] = ($_POST['password'] != '') ? $_POST['password'] : $detail['password'];
        	$save = $this->siswaModel->update($id_siswa, $data);
        }

        if($save){
            Flasher::setFlash('Data siswa berhasil disimpan', 'Berhasil', 'success');
            header('location:'. SITE_URL .'/siswa');
        }else{
            Flasher::setFlash('Data siswa gagal disimpan', 'Gagal', 'danger');
            header('location:'. SITE_URL .'/siswa');
        }
    }

    public function delete($id)
    {
        $delete = $this->siswaModel->delete($id);
        if($delete){
            Flasher::setFlash('Data siswa berhasil dihapus', 'Berhasil', 'success');
            header('location:'. SITE_URL .'/siswa');
        }else{
            Flasher::setFlash('Data siswa gagal dihapus', 'Gagal', 'danger');
            header('location:'. SITE_URL .'/siswa');
        }
    }
}