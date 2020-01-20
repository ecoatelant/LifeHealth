<?php

class VuePatient {

    public function __construct () {}

    public function afficherCorpsSoins(){
        //TO-DO
        echo "";
    }

    public function afficherSoins($soins){
        echo "<style type=\"text/css\">
.tftable {font-size:12px;color:#333333;width:100%;border-width: 1px;border-color: #729ea5;border-collapse: collapse;}
.tftable th {font-size:12px;background-color:#acc8cc;border-width: 1px;padding: 8px;border-style: solid;border-color: #729ea5;text-align:left;}
.tftable tr {background-color:#d4e3e5;}
.tftable td {font-size:12px;border-width: 1px;padding: 8px;border-style: solid;border-color: #729ea5;}
.tftable tr:hover {background-color:#ffffff;}


input[type=button], input[type=submit], input[type=reset], button, .button {
    padding: 5px 15px;
    margin: 3px 4px;
    display: inline-block;
    color: #ffffff;
    font-size: 26px;
    cursor: pointer;
    background: #75CCFF;
    background: linear-gradient(top, #75CCFF 0%, #5cb3e6 100%);
    background: -moz-linear-gradient(top, #75CCFF 0%, #5cb3e6 100%);
    background: -webkit-linear-gradient(top, #75CCFF 0%, #5cb3e6 100%);
    background: -o-linear-gradient(top, #75CCFF 0%, #5cb3e6 100%);
    border: 1px solid #338bf6;
    border-radius: 5px;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    -o-border-radius: 5px;
    box-shadow:0px 0px 2px 1px rgba(0, 0, 0, 0.25), inset 1px 1px 0px 0px rgba(255, 255, 255, 0.25);
    -moz-box-shadow:0px 0px 2px 1px rgba(0, 0, 0, 0.25), inset 1px 1px 0px 0px rgba(255, 255, 255, 0.25);
    -webkit-box-shadow:0px 0px 2px 1px rgba(0, 0, 0, 0.25), inset 1px 1px 0px 0px rgba(255, 255, 255, 0.25);
    -o-box-shadow:0px 0px 2px 1px rgba(0, 0, 0, 0.25), inset 1px 1px 0px 0px rgba(255, 255, 255, 0.25);
    text-shadow: 1px 1px 0px rgba(0, 0, 0, 0.50);
}

input[type=button]:hover, input[type=submit]:hover, input[type=reset]:hover, button:hover, .button:hover {
    background: linear-gradient(top, #8fe6ff 0%, #75CCFF 100%);
    background: -moz-linear-gradient(top, #8fe6ff 0%, #75CCFF 100%);
    background: -webkit-linear-gradient(top, #8fe6ff 0%, #75CCFF 100%);
    background: -o-linear-gradient(top, #8fe6ff 0%, #75CCFF 100%);
}
input[type=button]:active, input[type=submit]:active, input[type=reset]:active, button:active, .button:active{
    opacity:0.8;
}
</style>

<center>

<a href=\"index.php?module=patient&action=soinsFormulaire\"><input type=\"button\" value=\"Nouveau vaccin\"></a>


<table class=\"tftable\" border=\"1\">
<tr><th>Nom du vaccin</th><th>Nombre de rappels au total</th><th>Numéro du rappel courant</th><th>Date de début</th><th>Age d'échéance</th><th>Obligatoire</th><th>Date du vaccin</th></tr>";

        $req=null;
        if(!empty($soins)){
            foreach ($soins as $donnees) {
                echo "<tr><td>";
                echo $donnees['nom'];
                echo "</td><td>";
                echo $donnees['nbRappel'];
                echo "</td><td>";
                echo $donnees['numRappel'];
                echo "</td><td>";
                echo $donnees['ageDebut'];
                echo "</td><td>";
                echo $donnees['ageEcheance'];
                echo "</td><td>";
                echo $donnees['obligatoire'];
                echo "</td><td>";
                echo $donnees['dateVaccination'];
                echo "</td></tr>";
            }
            echo "</table>";
        }
        echo "</center>";
    }
       
    public function afficherCoordonnees($coordonnees){
        echo "<style type=\"text/css\">
.tftable {font-size:12px;color:#333333;width:100%;border-width: 1px;border-color: #bcaf91;border-collapse: collapse;}
.tftable th {font-size:12px;background-color:#ded0b0;border-width: 1px;padding: 8px;border-style: solid;border-color: #bcaf91;text-align:left;}
.tftable tr {background-color:#e9dbbb;}
.tftable td {font-size:12px;border-width: 1px;padding: 8px;border-style: solid;border-color: #bcaf91;}
.tftable tr:hover {background-color:#ffffff;}
</style>

<center><table class=\"tftable\" border=\"1\">";
        if(!empty($coordonnees)){
            foreach ($coordonnees as $donnees) {
            echo "<tr><td>Identifiant</td><td>";
            echo $donnees['idPatient'];
            echo "</td></tr><tr><td>Nom</td><td>";
            echo $donnees['nom'];
            echo "</td></tr><tr><td>Prénom</td><td>";
            echo $donnees['prenom'];
            echo "</td></tr><tr><td>Genre</td><td>";
            echo $donnees['genre'];
            echo "</td></tr><tr><td>Date de naissance</td><td>";
            echo $donnees['dateDeNaiss'];
            echo "</td></tr><tr><td>Code postale de naissance</td><td>";
            echo $donnees['codePostalNaiss'];
            echo "</td></tr><tr><td>Adresse</td><td>";
            echo $donnees['adresse'];
            echo "</td></tr><tr><td>Code postal</td><td>";
            echo $donnees['codePostal'];
            echo "</td></tr><tr><td>E-mail</td><td>";
            echo $donnees['email'];
            echo "</td></tr><tr><td>Numéro de téléphone</td><td>";
            echo $donnees['num'];
            echo "</td></tr><tr><td>Numéro de carte vitale</td><td>";
            echo $donnees['numCarteVitale'];
            echo "</td></tr>";
            }
        }
        echo "</table></center>";
    }

    function soinForm(){
        echo "<form id=\"soinsForm\" method=\"post\" action=\"index.php?module=patient&action=insertVaccins\">
    <br>Nom du vaccin<br><input name=\"nom\" type=\"text\" >
    <br>Nombre de rappel<br><input name=\"nbRappel\" type=\"number\" >
    <br>Numéro de rappel<br><input name=\"numRappel\" type=\"number\" >
    <br>Age de début<br><input name=\"ageDeb\" type=\"number\" >
    <br>Age d'&eacute;ch&eacute;ance<br><input name=\"ageFin\" type=\"number\" >
    <br>Obligatoire<br><select name=\"obligatoire\" >
        <option value=\"true\" selected=\"selected\">Oui</option>
        <option value=\"false\" >Non</option>
    </select>
    <br>Date du vaccin<br><input name=\"dateVaccin\" type=\"date\" >
    <br><input name=\"submit7\" type=\"submit\" value=\"Valider\">
</form>";
    }

}

?>