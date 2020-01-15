<?php

class VueDocteur {

    public function __construct () {
        parent::__construct();
    }
       
    public function coordonnees(){
        echo '<a href="index.php?module=patient&action=coordonnees">
        Coordonnées </a>
        <a href="index.php?module=membre&action=form_infoCompte">
        Modifier les informations du Compte </a>
         <a href="index.php?module=membre&action=supp_compte">
         Supprimer mon compte </a>
         ';
    }

}

?>