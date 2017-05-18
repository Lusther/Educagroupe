<?php

include(dirname(__FILE__).'/../modeles/fichier.php'); //Inclusion des modèles

$dossier = 'fichier/';

//--------------------------------------TEST DES SORTIES HTML---------------------------------------------
if (isset($_FILES['file']) || isset($_POST['valider']))
{
	upload($_FILES, $_POST['nom_fichier'],$_POST['groupe']);
}

if (isset($_POST['supprimer']))
{
	foreach ($_POST as $key => $element)
	{
		$pos = strpos($key,'fichiers_choisis_');
		if (!($pos === false))
		{
			del_file($element);
		}
	}
}
//---------------------------------------------------------------------------------------------------------

$liste_fichiers = get_fichiers('ts5'); //Récupération des données nécessaire à la vue

include(dirname(__FILE__).'/../vues/fichier.php'); //Inclusion de la vue
