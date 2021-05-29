<?php
if(!session_id()) {session_start();}

require_once 'app/init.php';
require_once "app/Controllers/AuthController.php";
require_once "app/Controllers/HomeController.php";
require_once "app/Controllers/KategoriController.php";

// Auth
Route::set('/auth/login', function(){
  (new AuthController())->login();
}, 'POST');
Route::set('/auth/logout', function(){
  (new AuthController())->logout();
});

// Home
Route::set('/', function(){
  (new AuthController())->index();
});
Route::set('/home', function(){
  (new HomeController())->index();
});

// Master Kategori
Route::set('/kategori', function(){
  (new KategoriController())->index();
});
Route::set('/kategori/save', function(){
  (new KategoriController())->save();
}, 'POST');
Route::set('/kategori/update', function(){
  (new KategoriController())->update();
}, 'POST');
Route::set('/kategori/delete/{any}', function ($id) {
  (new KategoriController())->delete($id);  
});
Route::set('/kategori/get-detail', function () {
  (new KategoriController())->getDetail();  
}, 'POST');

// 

Route::set('/coba/route/{any}/{id}', function ($nama, $umur) {
  echo "Nama $nama, umur $umur";  
});


