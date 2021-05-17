<?php
/**
 * Class Model digunakan untuk meload database untuk di extend ke class yang ada difolder model
 */
class Model{
  protected $db;
  public function __construct()
  {
    $this->db = (new Database())->connect();
  }
}