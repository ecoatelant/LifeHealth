<?php
require_once 'vue_patient.php';
require_once 'modele_patient.php';

class ContPatient {

    private $modPat;
    private $vuePat;

    public function __construct () {
        $this->vuePat = new VuePatient();
        $this->modPat = new ModelePatient();
    }

    function soins() {
        VuePatient::afficherSoins(ModelePatient::recupererSoins());
    }

    function examens() {
        VuePatient::afficherExamens(ModelePatient::recuperationExamens());
    }

    function maladies() {
        VuePatient::afficherMaladies(ModelePatient::recuperationMaladies());
    }

    function coordonnees(){
        VuePatient::afficherCoordonnees(ModelePatient::recuperationCoordonnees());
        }

    function soinsForm(){
        VuePatient::soinForm();
    }

    function formInsertVaccin(){
        ModelePatient::ajoutSoins($_POST['nom'],$_POST['numRappel'],$_POST['nbRappel'],$_POST['ageDeb'],$_POST['ageFin'],$_POST['obligatoire'],$_POST['dateVaccin']);
    }

}


?>