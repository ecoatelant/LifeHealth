
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
                	

                    case 'validerinscription':
                        
                        $contCo::valider_inscription();
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
                      
                    case 'seconnecter':
                        $contCo::se_connecter();
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