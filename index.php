<?php
require_once 'app/init.php';
require_once "app/Controllers/HomeController.php";
require_once "app/Controllers/KategoriController.php";

// Home
Route::set('/', function(){
  (new HomeController())->index();
});
Route::set('/home', function(){
  (new HomeController())->index();
});
// Route::set('/home/post', function(){
//   (new Home())->getPost();
// }, 'POST');
// Route::set('/home/{any}', function ($nama) {
//   echo "nama $nama";
// });

// Master Kategori
Route::set('/kategori', function(){
  (new KategoriController())->index();
});
Route::set('/kategori/add', function(){
  (new KategoriController())->create();
});




