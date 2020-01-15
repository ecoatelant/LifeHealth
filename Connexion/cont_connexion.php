<?php

require_once 'modele_connexion.php';

class ContConnexion {
    private $vueCo;
    private $modCo;

    public function __construct () {
        parent::__construct();
        $this->vueCo = new VueConnexion();
        $this->modCo = new ModeleConnexion();
    }

    public function form_connexion(){
        $this->vueCo->form_connexion();
    }
    public function form_inscription(){//formulaire d'inscription
        $this->vueCo->form_inscription();
    }

    public function verifierJeton(){
        if (self::verifyFormToken('formCo')) {

            // ... more security testing
            // on pourrai rajouter plus de condition pour améliorer et tester la securité
            // if pass, send email
          
          } else {
            
            echo "Tentative de detecé Hack !.";
            die ('ERREUR vous n\'êtes pas autoriser à poursuivre sur cette page') ;
          
          }
    }
    public function se_connecter(){
        self::verifierJeton();
        if (isset($_POST['connexion']) && $_POST['connexion'] == 'Connexion') {
	        if ((isset($_POST['login']) && !empty($_POST['login'])) && (isset($_POST['mdp']) && !empty($_POST['mdp']))) {
                //if(self::connexion_admin()==true)
                $data=$this->modCo->connexion($_POST["login"]);
                if(verificationMDP($_POST['mdp'],$data['motPass'])){
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
                    $erreur = 'Probème dans la base de données : plusieurs membres ont les mêmes identifiants de connexion.';
                }
            }
            else {
                $erreur = 'Au moins un des champs est vide.';
            }
            }
            if (isset($erreur)) echo '<br />',$erreur;
        }
    

    public function validationInscription(){
        self::verifierJeton();
        if (isset($_POST['inscription']) && $_POST['inscription'] == 'Inscription') {
            if ((isset($_POST['login']) && !empty($_POST['login'])) && (isset($_POST['mdp']) && !empty($_POST['mdp'])) && (isset($_POST['mdpConfirme']) && !empty($_POST['mdpConfirme']))) {
            if ($_POST['mdp'] != $_POST['mdpConfirme']) {
                $erreur = 'Les deux mots de passe sont différents.';
            }
            else {

                $data=$this->modCo->selection_membre($_POST["login"]);

                if ($data[0] == 0) {
                    $this->modCo->insertion_membre($_POST["login"]);
                    $m_p=$this->modCo->connexion($_POST["login"],($_POST['mdp']));
                   
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