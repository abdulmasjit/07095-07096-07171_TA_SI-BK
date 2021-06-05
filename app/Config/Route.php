<?php
class Route{
  private $routes = [];
  public static function parse_url(){
    /**
     * Function parse_url digunakan untuk mereplace route sesuai route yang telah ditentukan
     */
    // $basename = basename($_SERVER['SCRIPT_NAME']); // Exp. index.php
    $dirname = dirname($_SERVER['SCRIPT_NAME']); // Exp. /SIM-BK
    $script_name = $_SERVER['SCRIPT_NAME']; // Exp. /SIM-BK/index.php 
    $request_uri = str_replace([$script_name, $dirname], null, $_SERVER['REQUEST_URI']);
    if($request_uri==null){
      return '/';
    }else{
      return $request_uri;
    }
  }

  public static function set($url, $callback, $method = 'GET'){
    /**
     * Pendeklarian method yang akan digunakan di route url
     * secara default GET
     * untuk menambahkan method (bisa lebih dari satu dengan delimiter | ) Exp. POST|GET
     */
    $method = explode('|', strtoupper($method));
    if(in_array($_SERVER['REQUEST_METHOD'], $method)){
      /**
       * Pattern digunakan untuk mereplace paramater dalam url misalkan id, agar bisa dibaca oleh sistem routing
       * Ada 2 pattern {any} dan {id}
       * {any} => isian bebas boleh kombinasi angka dan huruf
       * {id} => isian hanya angka
       */
      $patterns = [
        '{any}' => '([0-9a-zA-Z]+)',
        '{id}' => '([0-9]+)',
      ];
      $url = str_replace(array_keys($patterns), array_values($patterns), $url);
      $request_uri = self::parse_url();

      // Cek Route apakah route terdaftar
      if(preg_match('@^'. $url . '$@', $request_uri, $parameters)){
        /**
         * unset untuk paramater 0, berfungsi untuk memecah parameter. 
         * misalkan id dioperkan ke url 
         */
        unset($parameters[0]);
        if(is_callable($callback)){
          /**
           * call_user_function_array() adalah method bawaan php
           * digunakan untuk memanggil method atau function sesuai dengan controller yang dipanggil pada route
           */
          call_user_func_array($callback, $parameters);
        } 
      }
    }
  }
}