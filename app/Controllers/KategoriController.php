<?php 
class KategoriController extends Controller{
  public function index()
  {
    $kategoriModel = $this->model('KategoriModel');
    $data['list'] = $kategoriModel->getAll();
    $data['content'] = "kategori/index.php";
    $this->parse_template('layout/template', $data);
  }

  public function create(){
    $data['content'] = "kategori/create.php";
    $this->parse_template('layout/template', $data);  
  }
}