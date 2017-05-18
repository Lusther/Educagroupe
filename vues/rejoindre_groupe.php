<!DOCTYPE html>
<html>
<head>
	<title>Rejoindre un groupe</title>
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
		<h3 id="titre_page">Rejoindre un groupe</h3>
		<form id="formulaire_pour_rejoindre" method="post" action="index.php?page=rejoindre_groupe" >
		<!--Début Simulation de tableau d'information contenant les les groupes et des informations complémantaires-->
		<table id="tableau_fichier">
			<thead id="tete_tableau">
				<tr>
					<td><p>Select</p></td>
					<td>Nom</td>
					<td>Admin</td>
					<td>Place</td>
					<td>Description</td>
				</tr>
			</thead>
			<tbody id="corps_tableau">
			<?php
				$p = 0;
				foreach ($liste_groupe as $n)
				{
					echo '
					<tr>
						<td><input name="groupes_choisis'.$p.'" value="'.$n['nom_groupe'].'" type="checkbox"/></td>
						<td>'.$n['nom_groupe'].'</td>
						<td>'.$n['nom_admin'].'</td>
						<td>?</td>
						<td><p>'.$n['description'].'</p></td>
					</tr>';
					$p++;
				}
			?>
			</tbody>
		</table>
		<!--FIN de simulation---------------------------------------------------------------------------------------->
			<input type="submit" name="valider" value="Valider" id="boutton_valider"/>
			<input type="submit" value="Annuler" id="boutton_annuler"/>
		</form>
	</section>
	<aside id="aside_droite">
		<h3 id="titre_activite">Activité</h3>
		<hr noshade/>
	</aside>
</body>
</html>
