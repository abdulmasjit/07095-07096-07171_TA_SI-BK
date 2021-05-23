<?php
/**
 * Class Controller digunakan sebagai class indix dan di extend ke class yang ada difolder controller
 */
class Controller{
  public function view($name, $data=[]){
    extract($data);
    require_once 'app/Views/' . $name . '.php';
  }

  public function model($name){
    require_once 'app/Models/' . $name . '.php';  
    return new $name();
  }
}