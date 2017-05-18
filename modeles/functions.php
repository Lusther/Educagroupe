<?php

function update_last_connection($user)
{
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=educagroup;charset=utf8', 'root', 'root');
	}
	catch(Exception $e)
	{
		die('Erreur : '.$e->getMessage());
	}
	$req = $bdd->prepare('UPDATE utilisateur SET last_connection = NOW() WHERE pseudo = ?');
	$req->execute(array($user));
	$req->closeCursor();
}

function connect_db()
{
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=educagroup;charset=utf8', 'root', 'root');
	}
	catch(Exception $e)
	{
		die('Erreur : '.$e->getMessage());
	}
	return $bdd;
}

function pseudo_into_name ($pseudo)
{
	$prenom_nom = explode('.',$pseudo);
	$prenom = $prenom_nom[0];
	$prenom = ucfirst($prenom);
	return $prenom;
}

function auto_del_groupe()
{
	connect_db();
	$reqdel = $bdd->prepare('DELETE * FROM groupe WHERE nb_membre>=2 AND del_countdown > DATE_ADD(del_countdown,INTERVAL +7 DAY)');
} 


?>