<?php 
class HomeController extends Controller{
  public function index()
  {
    $data['title'] = 'Home';
    $data['content'] = "dashboard/index.php";
    $this->view('layout/template', $data);
  }
}