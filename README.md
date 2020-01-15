# LifeHealth

Pour utiliser Git, il faut :
 
    - Pour rajouter une MàJ :
        (git add .)
        git commit -m ""
        git push origin master
        
    - Pour chercher les MàJ :
        git pull

INSERT INTO utilPatient VALUES (DEFAULT, 'qchastel', 'CHASTEL', 'Quentin', '2000/05/03', '71 Rue Danielle Casanova', '', '', '','','','','','')

pour quentin token :
<?php
require_once 'modele_globale.php';
require_once 'vue_globale.php';

class ContGlobale {

    protected $vueG;
    protected $modeleG;

    public function __construct () {
        $this->vue = new VueGlobale();
        $this->m = new ModeleGlobale();
    }

    public function verifyFormToken($form) {
        if(!isset($_SESSION[$form.'_token'])) { 
            return false;
        }
        if(!isset($_POST['token'])) {
            return false;
        }
        if ($_SESSION[$form.'_token'] !== $_POST['token']) {
            return false;
        }
        return true;
    }
    
   
}
