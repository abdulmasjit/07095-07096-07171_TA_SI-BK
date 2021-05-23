<?php
// Digunakan untuk meload semua class yang ada di difolder app config
// spl_autoload_register(function($class){
//   require_once 'Config/'.$class.'.php';
// });
require_once 'Config/Config.php';
require_once 'Config/Database.php';
require_once 'Config/Controller.php';
require_once 'Config/Model.php';
require_once 'Config/Flasher.php';
require_once 'Config/Route.php';