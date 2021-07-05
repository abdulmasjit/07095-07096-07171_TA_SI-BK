<?php 
class HomeController extends Controller{
  public function __construct()
  {
      $this->mainModel = $this->model('MainModel');
  }

  public function index()
  {
      $data['title'] = 'Home';
      $data['dashboard'] = $this->mainModel->getDashboard();
      $data['content'] = "dashboard/index.php";
      $this->view('layout/template', $data);
  }
}