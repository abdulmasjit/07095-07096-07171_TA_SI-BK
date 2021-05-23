<?php 
class Database {
  public function connect(){
    $db_host = DB_HOST;
    $db_user = DB_USER;
    $db_password = DB_PASSWORD;
    $db_database = DB_NAME;
  
    try {
        return new mysqli($db_host, $db_user, $db_password, $db_database);
    } catch (Exception $e) {
        echo "Terjadi kesalahan koneksi database";
    }
  }
}