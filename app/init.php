<?php
// Digunakan untuk meload semua class yang ada di difolder app config
spl_autoload_register(function($class){
  require_once 'Config/'.$class.'.php';
});