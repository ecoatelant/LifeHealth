<?php

require 'cont_patient.php';

class ModPatient {

    public function __construct () {
        $patient =  new ContPatient();
        if (isset($_GET['module'])){
            if($_GET['module']=='patient') {
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