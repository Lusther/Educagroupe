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
		<h3 id="titre_page">Discution de groupe</h3>
		<div class="scrolldown" id="iframe" style="overflow-y: auto">
			<?php
				foreach ($message as $n)
				{
					$name = pseudo_into_name($n['auteur']);
					echo '<p><em>'.htmlspecialchars($n['heure_post']).'</em> : <strong>' . htmlspecialchars($name) . '</strong> : ' . htmlspecialchars($n['message']) . '</p>';
				}
			?>
		</div>
		<form id="formulaire_pour_text" method="post" action="index.php?page=groupe&groupe=<?php echo $_GET['groupe'];?>">
			<textarea name="champ_de_text" id="champ_de_text" placeholder="Votre text..."></textarea>
			<input type="submit" value="Envoyer" id="boutton_envoyer"/>
			<input type="submit" value="Nettoyer" id="boutton_nettoyer"/>
		</form>
	</section>
	<aside id="aside_droite">
		<h3 id="titre_activite">Activité</h3>
		<hr noshade/>
	</aside>
	
	
	<script type="text/javascript">
	window.onload = function() {
		Array.prototype.map.call(
			document.getElementsByClassName('scrolldown'),
			function(that) {
				that.scrollTop = that.scrollHeight;
			}
		);
	};
	</script>
</body>
</html>