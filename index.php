<?php
if (!session_id()) {
  session_start();
}

require_once 'app/init.php';
require_once "app/Controllers/AuthController.php";
require_once "app/Controllers/HomeController.php";
require_once "app/Controllers/KategoriController.php";
require_once "app/Controllers/GuruController.php";

// Auth
Route::set('/auth/login', function () {
  (new AuthController())->login();
}, 'POST');
Route::set('/auth/logout', function () {
  (new AuthController())->logout();
});

// Home
Route::set('/', function () {
  (new AuthController())->index();
});
Route::set('/home', function () {
  (new HomeController())->index();
});

// Master Kategori
Route::set('/kategori', function () {
  (new KategoriController())->index();
});
Route::set('/kategori/save', function () {
  (new KategoriController())->save();
}, 'POST');
Route::set('/kategori/update', function () {
  (new KategoriController())->update();
}, 'POST');
Route::set('/kategori/delete/{any}', function ($id) {
  (new KategoriController())->delete($id);
});
Route::set('/kategori/get-detail', function () {
  (new KategoriController())->getDetail();
}, 'POST');

// Master Guru
Route::set('/guru', function () {
  (new GuruController)->index();
});
Route::set('/guru/add', function () {
  (new GuruController)->create();
});
Route::set('/guru/edit/{id}', function ($id) {
  (new GuruController)->edit($id);
});
Route::set('/guru/simpan', function () {
  (new GuruController())->store();
}, 'POST');
Route::set('/guru/delete/{any}', function ($id) {
  (new GuruController())->delete($id);
});

Route::set('/coba/route/{any}/{id}', function ($nama, $umur) {
  echo "Nama $nama, umur $umur";
});
