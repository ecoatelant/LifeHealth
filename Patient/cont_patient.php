<?php
require_once 'vue_patient.php';
require_once 'modele_patient.php';
require_once 'cont_globale.php';

class ContPatient extends ContGlobale{
    private $modPat;
    private $vuePat;

    public function __construct () {
        parent::__construct();
        $this->vuePat = new VuePatient();
        $this->modPat = new ModelePatient();
    }

    public function verifierJeton(){
        if (self::verifyFormToken('formCo')) {} else {
            echo "Tentative de detecé HaCk !.";
            die ( ' ERREUR vous n\'êtes pas autoriser à poursuivre sur cette page ' ) ;
          }
    }

    public function se_connecter(){
        self::verifierJeton();
        if (isset($_POST['membre']) && $_POST['membre'] == 'membre') {
	        if ((isset($_POST['login']) && !empty($_POST['login'])) && (isset($_POST['mdp']) && !empty($_POST['mdp']))) {
                //if(self::membre_admin()==true)
                $data=$this->vuePat->membre($_POST["login"]);
                if(password_verify($_POST['mdp'],$data['motPass'])){
                    $_SESSION['monid']=$data['idmembre'];
                    $_SESSION['login'] = $_POST['login'];
                    $_GET['module']=null;
                    $_GET['action']=null;
                   require('index.php'); 
                   exit();
                }
                elseif ($data == 0) {
                    if($_POST['login']=='admin' and $_POST['mp']=='admin'){
                        $_SESSION['login']='admin';
                        $_GET['module']='admin';
                        require('index.php'); 
                        exit();
                    }
                    else
                        $erreur = 'Compte non reconnu.';
                }
                else {
                    $erreur = 'Probème dans la base de données : plusieurs membres ont les mêmes identifiants de membre.';
                }
            }
            else {
                $erreur = 'Au moins un des champs est vide.';
            }
            }
            if (isset($erreur)) echo '<br />',$erreur;
        }
    

    public function valider_inscription(){
        self::verifierJeton();
        if (isset($_POST['inscription']) && $_POST['inscription'] == 'Inscription') {
            if ((isset($_POST['login']) && !empty($_POST['login'])) && (isset($_POST['mp']) && !empty($_POST['mp'])) && (isset($_POST['mp_confirm']) && !empty($_POST['mp_confirm']))) {
            if ($_POST['mp'] != $_POST['mp_confirm']) {
                $erreur = 'Les 2 mots de mp e sont différents.';
            }
            else {

                $data=$this->vuePat->selection_membre($_POST["login"]);

                if ($data[0] == 0) {
                    $this->vuePat->insertion_membre($_POST["login"]);
                    $m_p=$this->vuePat->membre($_POST["login"],($_POST['mp']));
                   
                    $_SESSION['login'] = $_POST['login'];
                    $_SESSION['monid']=$m_p['idmembre'];
                    $_GET['module']=null;
                    $_GET['action']=null;
                   require('index.php');
                exit();
                }
                else {
                    $erreur = 'Un membre possède déjà ce login.';
            }
            }
        }
            else {
                $erreur = 'Au moins un des champs est vide.';
            }
        }
    }

    public  function se_deconnecter(){
        session_unset();
        session_destroy();

        $_GET['action']=null;
        $_GET['module']=null;
        require('index.php'); 
        exit();
    }
}


?>