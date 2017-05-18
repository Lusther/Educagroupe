<?php

function creer_groupe ($nom_groupe, $nom_admin, $description)
{
	$bdd = connect_db();
	
	$req = $bdd->prepare('INSERT INTO groupe (nom_groupe, nb_membre,nom_admin,description,type,del_countdown) VALUES(?,1,?,?,2,NOW())');
	$req->execute(array($nom_groupe,$nom_admin,$description));
	$req->closeCursor;
}

function del_groupe($id)
{
	$bdd = connect_db();
	
	$req = $bdd->prepare('DELETE * FROM groupe WHERE ID=?');
	$req->execute(array($id));
	$req->closeCursor;
}

function quit_group($pseudo,$groupe)
{
	$bdd = connect_db();
	
	$req = $bdd->prepare('SELECT gperso FROM utilisateur WHERE pseudo=?');
	$req->execute(array($pseuso));
	$groupes = explode('.',$reqgroupe->fetch()['gperso']);
	$req->closeCursor();
	foreach ($groupes as $n => $value)
	{
		if ($value == $groupe)
		{
			unset($groupes[$n]);
		}
	}
	$update = $bdd->prepare('UPDATE utilisateur SET gperso=? WHERE pseudo=?');
	$sub_number = $bdd->prepare('UPDATE groupe SET del_countdown=NOW(),nb_membre=nb_membre - 1 WHERE groupe=?');
	$update->execute(array(implode('.',$groupes),$pseudo));
	$sub_number->execute(array($groupe));
	$update->closeCursor();
	$add_number->closeCursor();
}

function add_user_to_group($user, $groupe)
{
	$bdd = connect_db();
	
	$reqgroupe = $bdd->prepare('SELECT gperso FROM utilisateur WHERE pseudo=?');
	$reqgroupe->execute(array($user));
	$groupes = explode('.',$reqgroupe->fetch()['gperso']);
	$reqgroupe->closeCursor();
	if(count($groupes)<=3){
		$groupes[] = $groupe;
		$update = $bdd->prepare('UPDATE utilisateur SET gperso=? WHERE pseudo=?');
		$add_number = $bdd->prepare('UPDATE groupe SET nb_membre=nb_membre + 1 WHERE groupe=?');
		$update->execute(array(implode('.',$groupes),$user));
		$add_number->execute(array($groupe));
		$update->closeCursor();
		$add_number->closeCursor();
	}
	else{
		return 0;
	}
}

function get_groupe()
{
	$bdd = connect_db();
	
	$req = $bdd->query('SELECT nom_groupe,nb_membre,nom_admin,description FROM groupe WHERE type=2');
	$info_groupe = array();
	
	while ($donnees = $req->fetch())
	{
		$info_groupe[] = $donnees;
	}
	$req->closeCursor();
	return $info_groupe;
}

function get_admin_name($groupe)
{
	$bdd = connect_db();
	$req = $bdd->prepare('SELECT nom_admin FROM groupe WHERE nom_groupe=?');
	$req->execute(array($groupe));
	$admin = $req->fetch()['nom_admin'];
	$req->closeCursor();
	return $admin;
}
	
