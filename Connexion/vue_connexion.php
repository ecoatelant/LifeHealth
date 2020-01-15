<?php

class VueConnexion {
    public function __construct () {
    }
       
        public function form_connexionPatient(){

           // $newToken = self::generateFormToken('formCo');

            echo '<html lang="fr">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<title>LifeHealth</title>
		<link href="../img/styleVue_ConnexionPatient.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<section>
		
			<article>
			<h1>Patient</h1>
			<div>
			<h2>Connexion patient</h2>			
			<form method="post" action="index.php?module=connexion&action=seConnecter" value="Connexion">
					<br>Identifiant<br><input name="id" type="text required" >
					<br>Mot de passe<br><input name="mdp" type="password" required>
					<br><input name="connexionPatient" type="submit" value="Connexion" >
			</form>
			</div>
				<h2>Inscription patient</h2>			
			<form method="post" action="index.php?module=connexion&action=validerinscription" >
				<br>Pr&eacute;nom *<br><input name="prenom" id="prenom" type="text" required >
				<br>Nom *<br><input name="nom" id="nom" type="text" required >
				<br>Mot de passe *<br><input name="mdp" id="mdp" type="password" required >
				<br>Mot de passe Confirmé *<br><input name="mdpC" id="mdpC" type="password" required >
				<br>Genre *
				<br><select name="genre" id="genre" required >
					<option value="Homme" selected="selected">Homme</option>
					<option value="Femme" >Femme</option>
					<option value="Autre" >Autre</option>
					</select>
				<br>Num&eacute;ro de Carte Vitale *<br><input name="nbCV" id="nbCV" type="number" required >
				<br>Email<br><input name="email" id="email" type="email" required >
				<br>Adresse<br><input name="adresse" id="adresse" type="text" >
				<br>Code Postal<br><input name="nbCP" id="nbCP" type="number" >
				<br>Date de naissance<br><input name="date" id="date" type="text" >
				<br>Lieu Naissance<br><input name="lieuNais" id="lieuNais" type="text" >
				<br>Code Postal de naissance<br><input name="nbCPNais" id="nbCPNais" type="number" >
				<br><input name="inscriptionPatient" type="submit" value="Inscription" >
			</form>
			</div>
			
			</article>
			<aside>
			</aside>
			
			
		</section>
		
		
	</body>
				</html>';
            if (isset($erreur)) echo '<br /><br />',$erreur;

        }

       public function form_connexionDocteur(){
       	
			echo'<html lang="fr">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<title>LifeHealth</title>
		<link href="img/styleModele_connexion.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<section>
		
		
			<article>
			<h1>Docteur</h1>
			<div>
			<h2>Connexion Docteur</h2>			
			<form id="connectDoc" method="post" action="" >
					<br>Identifiant<br><input name="text1" id="text1" type="text" >
					<br>Mot de passe<br><input name="password2" id="password2" type="password" >
					<br><input name="submit3" type="submit" value="Valider" >
			</form>
			</div>
			<h2>Inscription Docteur</h2>			
			<form id="connectDoc" method="post" action="" >
					
					<br>Identifiant<br><input name="text1" id="text1" type="text" >
					<br>Mot de passe<br><input name="password2" id="password2" type="password" >
					<br><input name="submit3" type="submit" value="Valider" >
			</form>
			</div>
			
			</article>
			<aside>
			</aside>
			
			
		</section>
		
		
	</body>
			</html>';
           if (isset($erreur)) echo '<br /><br />',$erreur;
       }
       public function choix_Connexion(){
		echo'	<html lang="fr">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<title>LifeHealth</title>
		<link href="img/styleModele_connexion.css" rel="stylesheet" type="text/css">
	</head>
	<body>

		<section>
		
		
			<article>
				<a href="index.php?module=connexion&action=patient">Vous êtes un patient</a>
				<a href="index.php?module=connexion&action=docteur">Vous êtes un docteur</a>
			</article>
			<aside>
			</aside>
		</section>
		
		
		
		
	</body>
</html>';

			if (isset($erreur)) echo '<br /><br />',$erreur;
       }
}	       
?>