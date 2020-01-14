<?php

class VueGlobale {
    
    public function __construct(){
        ob_start();
    }

    public static function afficher(){
        return ob_get_clean() ;
    }

    public function generateFormToken($form) {
      $token = md5(uniqid(microtime(), true));
      $_SESSION[$form.'_token'] = $token; 
      return $token;
    }

}
?>
