<?php

if(!isset($_SESSION['idPatient']) && !defined('CONSTANT')){
    session_start();
    @$_SESSION['idPatient'];
    define('CONSTANT',NULL);
}

if(empty($_SESSION['idPatient'])) {
    echo "Vous n'etes pas connecté.";
}else{
    echo "Vous etes connecté.";
}

require('vue_header.php');

require_once('Connexion/mod_connexion.php');
require_once('Docteur/mod_docteur.php');
require_once('Patient/mod_patient.php');

ModeleConnexion::initConnexion();

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
                if (!isset($_SESSION['idPatient'])) {
                    echo "Pour accéder à cette fonctionnalité du site, veuillez vous connecter.";
                } else {
                    $modulePatient = new ModPatient();
                }
            break;
        }
        
    }
require('vue_footer.php');

    if(!empty($_SESSION['login'])){}
		
?>
