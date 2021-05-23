<?php
if(!session_id()) {session_start();}

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

// Example Post Data 
// Route::set('/home/post', function(){
//   (new Home())->getPost();
// }, 'POST');

// Example Url With Params
// Route::set('/home/{any}', function ($nama) {
//   echo "nama $nama";
// });

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



