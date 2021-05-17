<?php 
class HomeController extends Controller{
  public function index()
  {
    $data['content'] = "dashboard/index.php";
    $this->parse_template('layout/template', $data);
  }
}