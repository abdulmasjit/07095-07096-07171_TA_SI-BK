<?php 
class siswaController extends Controller{

  public function __construct()
  {
    $this->siswaModel = $this->model('SiswaModel');
  }
  
  public function index()
  {
    $data['title'] = 'Master Siswa';
    $data['list'] = $this->siswaModel->getAll();
    $data['content'] = "siswa/index.php";
    $this->view('layout/template', $data);
  }

  public function getDetail(){
    $id = $_POST['id'];
    $data = $this->siswaModel->getById($id);
    echo json_encode($data);
  }

  public function save()
  {
    $data = array(
      'nama' => $_POST['nama']
    );
    $save = $this->siswaModel->insert($data);
    // return hasil query save 1
    if($save){
      Flasher::setFlash('Data siswa berhasil disimpan', 'Berhasil', 'success');
      header('location:'. SITE_URL .'/siswa');
    }else{
      Flasher::setFlash('Data siswa gagal disimpan', 'Gagal', 'danger');
      header('location:'. SITE_URL .'/siswa');
    }
  }

  public function update()
  {
    $id = $_POST['id_siswa'];
    $data = array(
      'nama' => $_POST['nama']
    );
    $update = $this->siswaModel->update($id, $data);
    if($update){
      Flasher::setFlash('Data siswa berhasil diupdate', 'Berhasil', 'success');
      header('location:'. SITE_URL .'/siswa');
    }else{
      Flasher::setFlash('Data siswa gagal diupdate', 'Gagal', 'danger');
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