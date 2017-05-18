<?php

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
?>