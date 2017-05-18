<?php


function add_info ($titre, $date_debut, $date_fin, $lieu, $description)
{
	$bdd = connect_db();
	$req = $bdd->prepare('INSERT INTO info(titre, date_debut, date_fin, lieu, description) VALUES (?,?,?,?,?)');
	$req->execute(array($titre, $date_debut, $date_fin, $lieu,$description));
	$req->closeCursor();
}

function get_info($number = NULL)
{
	$bdd = connect_db();
	if ($number === NULL)
	{
		$req = $bdd->query('SELECT ID,titre, date_debut, date_fin, lieu, description FROM info ORDER BY date_debut');
	}
	else
	{
		$req = $bdd->prepare('SELECT ID,titre, date_debut, date_fin, lieu, description FROM info ORDER BY date_debut LIMIT 0,?');
		$req->execute(array($number));
	}
	
	$info = array();
	while ($donnees = $req->fetch())
	{
		$info[] = $donnees;
	}
	$req->closeCursor();
	return $info;
}

function modify_info ($id, $titre, $date_debut, $date_fin, $lieu, $description)
{
	$bdd = connect_db();
	$req = $bdd->prepare('UPDATE info SET titre=?,date_debut=?,date_fin=?,lieu=?,description=? WHERE ID=?');
	$req->execute(array($titre, $date_debut, $date_fin, $lieu,$description ,$id));
	$req->closeCursor();
}

function del_info($id)
{
	$bdd = connect_db();
	
	$del = $bdd->prepare('DELETE FROM info WHERE ID=?');
	$del->execute(array($id));
	$del->closeCursor();
}

function get_value_info($ID)
{
	$bdd = connect_db();
	
	$req = $bdd->prepare('SELECT titre, date_debut, date_fin, lieu, description FROM info WHERE ID=?');
	$req->execute(array($ID));
	$value_info = $req->fetch();
	$req->closeCursor();
	return $value_info;
}
?>

