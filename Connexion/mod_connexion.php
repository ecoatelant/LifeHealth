
<?php
require 'vue_connexion.php';
require 'cont_connexion.php';

class ModConnexion {
    
    public function __construct () {
        $cont = new ContConnexion();
        $vueC = new VueConnexion();

        if (isset($_GET['module'])){

            if($_GET['module' ]=='connexion') {

             if (isset($_GET['action'])) {

                switch ($_GET['action']) :

                    case 'validerinscription':
                        
                        $cont->valider_inscription();
                    break;
                    case 'formInscription':
                        $vueC->form_inscription();
                        break;
                    case 'CONNEXION':
                        $vueC->form_connexion();
                        break;
                    case 'seconnecter':
                        $cont->se_connecter();
                        break;
                   case 'DECONNEXION':
                        $cont->se_deconnecter();
                        break;
                    default:
                        echo "plus de switch action inconnu";
                    endswitch;
                }
            }
        }
        
    }
}
?>