
<?php

require 'cont_connexion.php';

class ModConnexion {
    
    public function __construct () {
        $contCo = new ContConnexion();
        $vueCo = new VueConnexion();

        if (isset($_GET['module'])){

            if($_GET['module' ]=='connexion') {

             if (isset($_GET['action'])) {

                switch ($_GET['action']) {
                    //Vérifier si l'on le garde
                    case 'validerinscription':
                        $contCo::validationInscription();
                    break;
                    case 'choix_Connexion':
                        $vueCo::choix_Connexion();
                        break;
                    case 'patient':
                        $vueCo::form_connexionPatient();
                        break;
                    case 'docteur':
                        $vueCo::form_connexionDocteur();
                        break;
                      
                    case 'seConnecter':
                        ContConnexion::seConnecter();
                        break;
                   case 'DECONNEXION':
                        $contCo::se_deconnecter();
                        break;
                    default:
                        echo 'plus de switch action inconnu';
                        break;
                    }
                    
            }
         }
      }
   }        
}
?>