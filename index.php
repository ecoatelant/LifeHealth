<?php

if(!isset($_SESSION['login']) && !defined('CONSTANT')){
    session_start();
    define('CONSTANT',NULL);
}

require_once('Connexion/mod_connexion.php');
require_once('Docteur/mod_docteur.php');
require_once('Patient/mod_patient.php');

ModeleConnexion::initConnexion();
    require('vue_header.php');

if (isset($_GET['module'])) {
        $module=htmlspecialchars($_GET['module']);
        switch ($module) {
            case 'connexion':
                $moduleC = new ModConnexion();
            break;
            case 'docteur':
                $moduleM = new ModDocteur();
               
            break;
            case 'patient':
                if(!empty($_SESSION['login'])){
                    echo "Vous devez vous connecter pour accéder aux différentes particules du site."; //à mettre dans une vue
                }else{
                    $moduleAdm = new ModPatient();
                }
            break;
        }
        
    }
require('vue_footer.php');


    if(!empty($_SESSION['login'])){}
		
?>
