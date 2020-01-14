<?php

require 'cont_docteur.php';

class ModDocteur {

    public function __construct () {
        $docteur =  new ContDocteur();
        if (isset($_GET['module'])){
            if($_GET['module']=='docteur') {
                if (isset($_GET['action'])) {
                    switch ($_GET['action']) {}
                }
            }
        }
    
    $moduleM = VueGlobale::afficher();
    echo $moduleM;

    }

}

?>