
<html lang="fr">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<title>LifeHealh</title>
		<link href="img/styleVue_client.css" rel="stylesheet" type="text/css">

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	</head>
	<body>
		<div id="divTitre" >
			<img id="TitreImg"src="img/Titre.png" alt="Logo du site">
			<a id="TitreA1" href="index.php?module=connexion&action=choix_Connexion" >Connexion   </a>	
			<a id="TitreA2" href="index.php?module=connexion&action=choix_Connexion" >Inscription </a>		
		</div>
		<header>
		<nav id="Barre">
		<a href="index.php">Accueil</a><!-- Les liens avec des # vise des pages pas encore crée -->
				<a href="index.php?module=patient&action=soins">Historique des soins</a>
				<a href="index.php?module=patient&action=maladie">Maladie</a>
				<a href="index.php?module=patient&action=examens">Examens</a>
				<a href="index.php?module=patient&action=compteRendu">Compte rendu</a>
				<a href="index.php?module=patient&action=coordonnes">Coordonnées</a>
		</nav>
		</header>

	</body>
</html>
