<!DOCTYPE html>
<html>
<head>
	<title>Page de Connexion</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="connexion.css"/>
</head>
<body>
	<article id="corps" role="main">
		<section id="cadre_flotant">
			<hgroup>	
				<h1 id="nom_etablissement">EDUCAGROUP</h1>
				<h6 id="nom_site">Portail éducatif de groupe d'entraide</h6>
			</hgroup>
			<form method="post" action="index.php?page=connexion">
				<input type="text" name="login" id="login" placeholder=" Identifiant" autofocus="on" autocomplete="on" required="on">
				<input type="password" name="password" id="password" placeholder=" Mot de passe" autocomplete="off" required="on">
				<input type="submit" name="connexion" id="bouton_valider" value="Connexion">
			</form>
		</section>
	</article>
	<article id="pieds">
		<footer id="pied_de_page">
			<p>Oeuvre réalisé dans un cadre pédagogique par ORLAY Arnaud<p>
		</footer>
	</article>
	
	<?php
	if (isset($wrong_password))
	{
		echo '
		<script>
			alert(\'Mauvais identifiant/Mot de passe!\');
		</script>';
	}?>
	
</body>
</html>