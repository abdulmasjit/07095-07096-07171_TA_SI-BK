<?php 
class KategoriController extends Controller{

  public function __construct()
  {
    $this->kategoriModel = $this->model('KategoriModel');
  }
  
  public function index()
  {
    $data['title'] = 'Master Kategori';
    $data['list'] = $this->kategoriModel->getAll();
    $data['content'] = "kategori/index.php";
    $this->view('layout/template', $data);
  }

  public function getDetail(){
    $id = $_POST['id'];
    $data = $this->kategoriModel->getById($id);
    echo json_encode($data);
  }

  public function save()
  {
    $data = array(
      'nama' => $_POST['kategori']
    );
    $save = $this->kategoriModel->insert($data);
    // return hasil query save 1
    if($save){
      Flasher::setFlash('Data kategori berhasil ditambahkan', 'Berhasil', 'success');
      header('location:'. SITE_URL .'/kategori');
    }else{
      Flasher::setFlash('Data kategori gagal ditambahkan', 'Gagal', 'danger');
      header('location:'. SITE_URL .'/kategori');
    }
  }

  public function update()
  {
    $id = $_POST['id_kategori'];
    $data = array(
      'nama' => $_POST['kategori']
    );
    $update = $this->kategoriModel->update($id, $data);
    if($update){
      Flasher::setFlash('Data kategori berhasil diupdate', 'Berhasil', 'success');
      header('location:'. SITE_URL .'/kategori');
    }else{
      Flasher::setFlash('Data kategori gagal diupdate', 'Gagal', 'danger');
      header('location:'. SITE_URL .'/kategori');
    }
  }

  public function delete($id)
  {
    $delete = $this->kategoriModel->delete($id);
    if($delete){
      Flasher::setFlash('Data kategori berhasil dihapus', 'Berhasil', 'success');
      header('location:'. SITE_URL .'/kategori');
    }else{
      Flasher::setFlash('Data kategori gagal dihapus', 'Gagal', 'danger');
      header('location:'. SITE_URL .'/kategori');
    }
  }
}