<!DOCTYPE html>
<html>
<head>
	<title>Discution groupe</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="groupe.css"/>
</head>
<body>
	<header>
		<h1 id="titre_site">EDUCAGROUPE</h1>
		<nav id="navigateur">
			<ul id="partie1">
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
	<section id="section_agenda">
		<h3 id="titre_page">Agenda</h3>
		<article id="agenda_selection">
			<!--Début simulation d'événement-->
			<?php
			foreach ($info as $n)
			{
				echo '
				<a href="index.php?page=agenda&ID='.$n['ID'].'">
					<div id="test">
						<h3 id="titre">'.$n['titre'].'</h3>
						<i id="date">Du '.$n['date_debut'].' au '.$n['date_fin'].'</i>
						<p id="lieu">'.$n['lieu'].'</p>
						<p id="evenement">'.$n['description'].'</p>
					</div>
				</a>
				';
			}
			?>
			<!--Fin de simulation d'événement-->
		</article>
		<article id="agenda_formulaire">
			<form id="formulaire_pour_evenement" action="index.php?page=agenda" method="post">
				<h2>Formulaire d'événement</h2>
				<br/>
				<input type="hidden" value="<?php if (isset($_GET['ID'])) echo $_GET['ID'];?>" name="ID" />
				<br/>
				<label for="nom_evenement">Nom événement :</label>
				<input type="text" name="nom_evenement" id="nom_evenement" value="<?php if (isset($_GET['ID'])) echo $info_value['titre'];?>"/>
				<br/>
				<br/>
				<br/>
				<label for="lieu_evenement">Lieu :</label>
				<input type="text" name="lieu_evenement" id="lieu_evenement" value="<?php if (isset($_GET['ID'])) echo $info_value['lieu'];?>"/>
				<br/>
				<br/>
				<br/>
				<label for="debut_date_evenement">Du :</label>
				<input type="date" name="debut_date_evenement" id="debut_date_evenement" value="<?php if (isset($_GET['ID'])) echo $date_debut[0];?>"/>
				<label for="debut_heure_evenement" id="temps"> à </label>
				<input type="time" name="debut_heure_evenement" id="debut_heure_evenement" value="<?php if (isset($_GET['ID'])) echo $date_debut[1];?>"/>
				<br/>
				<br/>
				<br/>
				<label for="fin_date_evenement">Au :</label>
				<input type="date" name="fin_date_evenement" id="fin_date_evenement" value="<?php if (isset($_GET['ID'])) echo $date_fin[0];?>"/>
				<label for="fin_heure_evenement" id="temps"> à </label>
				<input type="time" name="fin_heure_evenement" id="fin_heure_evenement" value="<?php if (isset($_GET['ID'])) echo $date_fin[1];?>"/>
				<br/>
				<br/>
				<br/>
				<label for="description_evenement">Description :</label>
				<textarea name="description_evenement" id="description_evenement" rows="10" cols="40"><?php if (isset($_GET['ID'])) echo $info_value['description'];?></textarea>
				<br/>
				<br/>
				<br/>
			<br/>
			<br/>
			<br/>
			<hr id="separation"/>
				<input type="submit" name="modifier" value="Modifier" id="bouton_enregistrement"/>
				<input type="reset" value="Annuler" id="bouton_annuler"/>
				<input type="submit" name="nouveau" value="Nouveau" id="bouton_nouveau"/>
				<input type="submit" name="supprimer" value="Supprimer" id="bouton_supprimer"/>
			</form>
		</article>
	</section>
	<aside id="aside_droite">
		<h3 id="titre_activite">Activité</h3>
		<hr noshade/>
	</aside>
</body>
</html>
