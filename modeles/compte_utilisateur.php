<?php 

function is_connected($pseudo)
{
	$bdd = connect_db();
	$req = $bdd->prepare('SELECT last_connection WHERE pseudo=?');
	$req->execute(array($pseudo));
	$timestamp = $req->fetch();
	$req->closeCursor;
	if ($timestamp < time() - 500)
	{
		return true;
	}
	else
	{
		return false;
	}
}

function get_password()
{
	$bdd = connect_db();
	$req = $bdd->prepare('SELECT mdp,classe FROM utilisateur WHERE pseudo = ?');
	$req->execute(array($_POST['login']));

	$donnees = $req->fetch();
	$req->closeCursor();
	return $donnees;
}

function modify_password($pseudo,$new_password)
{
	$bdd = connect_db;
	$req = $bdd->prepare('UPDATE utilisateur SET mdp=? WHERE pseudo = ?');
	$req->execute(array($new_password,$pseudo));
	$req->closeCursor;
}

function get_donnees_utilisateur($pseudo)
{
	$bdd = connect_db();
	
	$req = $bdd->prepare('SELECT ID,pseudo,mdp,classe,spe,gperso WHERE pseudo=?');
	$req->execute(array($pseudo));
	while ($donnees = $req->fetch())
	{
		$donnees_utilisateur[] = $donnees;
	}
	$req->closeCursor();
	
	return $donnees_utilisateur;
}
	
