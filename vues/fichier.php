<!DOCTYPE html>
<html>
<head>
	<title>Depot de fichier</title>
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
		<h3 id="titre_page">Dépot de fichier</h3>
		<form id="formulaire_del_fichier" action="index.php?page=fichier" method="post" >
		<!--Début Simulation de tableau d'information contenant les fichers que l'on peut télécharger-->
		<table id="tableau_fichier">
			<thead id="tete_tableau">
				<tr>
					<td><p>Select</p></td>
					<td>Nom</td>
					<td>Taille</td>
					<td>Type</td>
					<td>Date</td>
					<td>Visibilité</td>
				</tr>
			</thead>
			<tbody id="corps_tableau">
			<?php
				$p = 0;
				foreach ($liste_fichiers as $n)
				{
					echo '
					<tr>
						<td><input type="checkbox" name="fichiers_choisis_'.$p.'" value="'.$n['nom_unique'].'"/></td>
						<td><p><a href="index.php?page=download&file='.$n['nom_unique'].'">'.$n['nom_original'].'</a></p></td>
						<td>'.$n['taille'].' octets</td>
						<td>'.$n['extension'].'</td>
						<td>'.$n['date_post'].'</td>
						<td>'.$n['groupe'].'</td>
					</tr>
					';
					$p++;
				}
			?>
			</tbody>
		</table>
		<input type="submit" name="supprimer" value="Suprimer" id="boutton_suprimer"/>
		</form>
		<!--FIN de simulation-------------------------------------------------------------------------->
		<form id="formulaire_pour_fichier" action="index.php?page=fichier" method="post" enctype="multipart/form-data">
			<input type="file" name="file" id="transfer_fichier"/>
			<input type="submit" name="valider" value="Valider" id="boutton_valider"/>
			<input type="reset" value="Annuler" id="boutton_annuler"/>
			
			<div id="change_nom_fichier">
				<label for="nom_fichier_depose">Nom du fichier :</label>
				<input type="text" name="nom_fichier" id="nom_fichier_depose" required="on">
			</div>
			
				<label for="groupes">Dans quel groupe shouaité vous le déposer ?</label>
				<select name="groupe" id="groupes">
					<optgroup label="Spécialité">
						<option value="si">SI</option>
					</optgroup>
					<optgroup label="Classe">
						<option value="ts5">TS5</option>
					</optgroup>
					<optgroup label="Goupe">
						<option value="aide_histoire">aide_histoire</option>
						<option value="Delta">Delta</option>
						<option value="Petat">Petat</option>
						<option value="*Geek*">*Geek*</option>
					</optgroup>
				</select>
		</form>
	</section>
	<aside id="aside_droite">
		<h3 id="titre_activite">Activité</h3>
		<hr noshade/>
	</aside>
</body>
</html>
