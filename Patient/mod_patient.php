<?php

require 'cont_patient.php';

class ModPatient {

    public function __construct () {

        $controleurPatient =  new ContPatient();

        if (isset($_GET['module'])){                            //Si "module" n'est pas vide.

            if (isset($_GET['action'])) {                       //Si "action" n'est pas vide.

                switch ($_GET['action']) {

                    case 'soins':
                         ContPatient::soins();
                        break;

                    case 'maladie':
                        # code...
                        break;

                    case 'examens':
                        # code...
                        break;

                    case 'compteRendu':
                        # code...
                        break;

                    case 'coordonnes':
                        # code...
                        break;

                }
            }
        }

    }

}

?>