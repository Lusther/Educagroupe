<?php
$dossier = 'fichier/';

function upload($files,$nom_original,$groupe)
{
	global $dossier;
	$taille_maxi = 10000000;
	$taille_maxi_groupe_perso = 1000000000;
	$taille_maxi_groupe_autre = 2000000000;

	$bdd = connect_db();
	
	//Récupère le type de groupe
	$req_type = $bdd->prepare('SELECT type FROM groupe WHERE nom_groupe = ?');
	$req_type->execute(array($groupe));
	$groupe_perso = $req_type->fetch()['type'];
	$req_type->closeCursor();
	
	//Récupère la capacité actuelle occupée par les fichiers
	$req_taille_totale = $bdd->prepare('SELECT SUM(taille) AS taille_totale FROM fichier WHERE groupe = ?');
	$req_taille_totale->execute(array($groupe));
	$taille_totale = $req_taille_totale->fetch()['taille_totale'];
	$req_taille_totale->closeCursor();
	
	//Assigne la capacité totale en fonction du type de groupe
	if ($groupe_perso = 2)$taille_maxi_groupe = $taille_maxi_groupe_perso;
	else $taille_maxi_groupe = $taille_maxi_groupe_autre;

	// TEST
	if ($files['file']['error'] > 0) $erreur = "Erreur lors du transfert"; //Test erreur
	if ($files['file']['size'] > $taille_maxi) $erreur = "Le fichier est trop gros"; //Test taille du fichier
	if ($files['file']['size'] + $taille_totale > $taille_maxi_groupe) $erreur = 'Taille totale dépassée'; //Taille capacité mémoire du groupe
	
	
	if (!isset($erreur))
	{
		$nom = md5(uniqid(rand(), true)); //génère un nom 
		$extension = strtolower(  substr(  strrchr($files['file']['name'], '.')  ,1)  ); //récupère l'extension
		if (move_uploaded_file($files['file']['tmp_name'],$dossier.$nom.'.file')) //envoi du fichier
		{
			echo 'Fichier envoyé avec succès';
			$req_enregistrement = $bdd->prepare('INSERT INTO fichier (nom_original, nom_unique,taille,date_post,extension,groupe) VALUES(?, ?, ?,NOW(),?,?)');
			$req_enregistrement->execute(array($nom_original,$nom,$files['file']['size'],$extension,$groupe));
		}
		else
		{
			echo 'Echec de l\'envoi';
		}
	}
	else
	{
		echo 'Echec de l\'envoi : '.$erreur;
	}	
}

function get_fichiers($groupe)
{
	$bdd = connect_db();
	
	$req_file = $bdd->prepare('SELECT ID,nom_original, nom_unique, DATE_FORMAT(date_post,\'%d/%m/%y\') AS date_post,taille,extension,groupe FROM fichier WHERE groupe = ? ORDER BY date_post');
	$req_file->execute(array($groupe));
	$fichiers = array();
	while ($donnees = $req_file->fetch())
	{
		$fichiers[] = $donnees;
	}
	$req_file->closeCursor();
	return $fichiers;
}

function del_file($name)
{
	$bdd = connect_db();
	
	global $dossier;
	unlink($dossier.$name.'.file');
	$req_delete = $bdd->prepare('DELETE FROM fichier WHERE nom_unique = ?');
	$req_delete->execute(array($name));
	$req_delete->closeCursor();
}

function download($file)
{
	$bdd = connect_db();

	$req = $bdd->prepare('SELECT nom_original, taille, extension FROM fichier WHERE nom_unique = ?');
	$req->execute(array($_GET['file']));
	$donnees_file = $req->fetch();
	$req->closeCursor();

	header('Content-Type: application/octet-stream');
	header('Content-Transfer-Encoding: binary');
	header( "Pragma: no-cache" );
	header( "Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0" );
	header( "Expires: 0" );
	header('Content-Disposition: attachment; filename='.$donnees_file['nom_original'].'.'.$donnees_file['extension']);
	header('Content-Length: '.$donnees_file['taille']);

	readfile('fichier/'.$_GET['file'].'.file');
}


