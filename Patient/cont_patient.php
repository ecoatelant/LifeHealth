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

}


?>