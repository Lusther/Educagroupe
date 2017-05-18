<!DOCTYPE html>
<html>
<head>
	<title>Créer un groupe</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="groupe.css"/>
</head>
<body>
	<header>
		<h1 id="titre_site">EDUCAGROUPE</h1>
		<nav id="navigateur">
			<ul>
				<li><a href="index.php?page=agenda">Calendrier</a></li>
				<li><a href="index.php?page=groupe">Groupes</a></li>
				<li><a href="index.php?page=fichier">Fichiers</a></li>
				<li><a href="index.php?page=rejoindre_groupe">Rejoindre</a></li>
				<li><a href="index.php?page=creer_groupe">Créer</a></li>
				<li>
					<img src="/media/arnaud/1E0C-111C/isn/Ressource/Images/account.svg"/><br/>
					<ul id="sous_partie1">
						<li><a href="Connexion">Déconnexion</a></li>
						<li><a href="mon-compte">Mon compte</a></li>
					</ul>
				</li>
			</ul>
		</nav>
	</header>
	<aside id="aside_gauche">
		<h3 id="titre_info">Infos</h3>
		<hr noshade/>
	</aside>
	<section>
		<h3 id="titre_page">Créer un groupe</h3>
		<form id="formulaire_pour_créer" method="post" action="index.php?page=creer_groupe">
			<fieldset>
				<legend>Formulaire d'enregistrement</legend>
					<div id="fpc_partie_1">
						<label for="nom_du_group">Nom du groupe* :</label>
						<input type="text" name="nom_du_group" id="nom_du_group" required/>
					</div>
					<div id="fpc_partie_2">
						<label for="matiere_du_group">Matière :</label>
						<input type="text" name="matiere_du_group" id="matiere_du_group" />
					</div>
					<div id="fpc_partie_3">
						<label for="description_du_group">Description* :</label>
						<textarea name="description_du_group" id="description_du_group" required></textarea>
					</div>
					<div id="fpc_partie_4">
						<input type="checkbox" id="checkbox_chartre" name="checkbox_chartre" required/>
						<label for="checkbox_chartre">Je m'engage à être l'unique responsable du groupe de travail.</label>
					</div>
			</fieldset>
			<p>* les champs comportants une étoile sont obligatoires.</p>
			<i id="avertissement">A partir du moment ou vous enregistrez votre nouveau groupe, il ne vous reste plus que 48h pour y intégrer un autre membre que vous, au quel cas il sera automatiquement détruit !</i>
			<input type="submit" value="Valider" id="boutton_valider_creer"/>
			<input type="submit" value="Annuler" id="boutton_annuler_creer"/>
		</form>
	</section>
	<aside id="aside_droite">
		<h3 id="titre_activite">Activité</h3>
		<hr noshade/>
	</aside>
</body>
</html>
