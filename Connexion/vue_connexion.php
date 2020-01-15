<?php

class VueConnexion {
    public function __construct () {
        parent::__construct();
    }
       
        public function form_connexion(){

            $newToken = self::generateFormToken('formCo');

            echo 'Vous êtes sur la page de connexion <br><br>
            Connexion à l\'espace membre :<br /><br> 
            <form action="index.php?module=connexion&action=seconnecter" method="post">
            Login : <input type="text" name="login"><br /></br>
            Mot de passe : <input type="password" name="mp" ><br />
            <input type="hidden" name="token" value="'.$newToken.'">
            <br/><input type="submit" name="connexion" value="Connexion">
            </form><br />
            <a href="index.php?module=connexion&action=formInscription"> Vous inscrire </a><br/><br/>';
            if (isset($erreur)) echo '<br /><br />',$erreur;

        }

        public function form_inscription(){
            $newToken = self::generateFormToken('formCo');
            echo 'Inscription à l\'espace membre :<br />
            <form action="index.php?module=connexion&action=validerinscription" method="post"><br />
            Login : <input type="text" name="login" ><br /> <br />
            Mot de passe : <input type="password" name="mp" ><br /><br />
            Confirmation du mot de passe : <input type="password" name="mp_confirm" ><br /><br />
            <input type="hidden" name="token" value="'.$newToken.'"><br />
            <input type="submit" name="inscription" value="Inscription">
            </form>';
            if (isset($erreur)) echo '<br />',$erreur;
                    }
        }
?>