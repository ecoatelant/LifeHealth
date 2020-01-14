<?php

if(!isset($_SESSION['login']) && !defined('CONSTANT')){
    session_start();
    define('CONSTANT',NULL);
}

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
                $moduleAdm = new ModPatient();
            break;
        }
        
    }

    $module=htmlspecialchars($_GET['module']);

    $content = VueGlobale::afficher();

    if(!empty($_SESSION['login'])){}else if(empty($module)){
        //require('header.php');
        require('modele_client.php');
    }

?>
