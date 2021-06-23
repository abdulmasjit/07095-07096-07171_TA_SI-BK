<?php
if (!session_id()) {
  session_start();
}

require_once 'app/init.php';
require_once "app/Controllers/AuthController.php";
require_once "app/Controllers/HomeController.php";
require_once "app/Controllers/KategoriController.php";
require_once "app/Controllers/KelasController.php";
require_once "app/Controllers/GuruController.php";
require_once "app/Controllers/SiswaController.php";
require_once "app/Controllers/PelanggaranController.php";
require_once "app/Controllers/PelanggaranSiswaController.php";

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

// Master Kelas
Route::set('/kelas', function () {
  (new KelasController())->index();
});
Route::set('/kelas/save', function () {
  (new KelasController())->save();
}, 'POST');
Route::set('/kelas/update', function () {
  (new KelasController())->update();
}, 'POST');
Route::set('/kelas/delete/{any}', function ($id) {
  (new KelasController())->delete($id);
});
Route::set('/kelas/get-detail', function () {
  (new KelasController())->getDetail();
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

// Master Siswa
Route::set('/siswa', function () {
  (new SiswaController)->index();
}, 'GET|POST');
Route::set('/siswa/add', function () {
  (new SiswaController)->create();
});
Route::set('/siswa/edit/{id}', function ($id) {
  (new SiswaController)->edit($id);
});
Route::set('/siswa/save', function () {
  (new SiswaController())->save();
}, 'POST');
Route::set('/siswa/delete/{any}', function ($id) {
  (new SiswaController())->delete($id);
});

// Master Pelanggaran
Route::set('/pelanggaran', function () {
  (new PelanggaranController)->index();
});
Route::set('/pelanggaran/add', function () {
  (new PelanggaranController)->create();
});
Route::set('/pelanggaran/edit/{id}', function ($id) {
  (new PelanggaranController)->edit($id);
});
Route::set('/pelanggaran/simpan', function () {
  (new PelanggaranController())->store();
}, 'POST');
Route::set('/pelanggaran/delete/{any}', function ($id) {
  (new PelanggaranController())->delete($id);
});

// Master Pelanggaran Siswa
Route::set('/pelanggaran-siswa', function () {
  (new PelanggaranSiswaController)->index();
});
Route::set('/pelanggaran-siswa/add', function () {
  (new PelanggaranSiswaController)->create();
});
Route::set('/pelanggaran-siswa/edit/{id}', function ($id) {
  (new PelanggaranSiswaController)->edit($id);
});
Route::set('/pelanggaran-siswa/simpan', function () {
  (new PelanggaranSiswaController())->store();
}, 'POST');
Route::set('/pelanggaran-siswa/delete/{any}', function ($id) {
  (new PelanggaranSiswaController())->delete($id);
});
