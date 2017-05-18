<?php

session_start(); //-> Ouverture de session
include(dirname(__FILE__).'/modeles/functions.php'); //-> inclusion de certaines fonction afin de simplifier la communication avec la base de donnees

if (isset($_SESSION['pseudo'])) //->test
{
	update_last_connection($_SESSION['pseudo']); //->mise à jour de 'last_connection'
	if (!empty($_GET['page']) && is_file('controleurs/'.$_GET['page'].'.php')) //->test
	{
		include 'controleurs/'.$_GET['page'].'.php'; //inclusion du controleur
	}
	else
	{
		header('Location: index.php?page=groupe'); //->redirection
	}
}
else
{
	if ($_GET['page'] == 'connexion') //->test
	{
		include 'controleurs/'.$_GET['page'].'.php'; //->inclusion du controleur
	}
	else
	{
		header('Location: index.php?page=connexion'); //redirection
	}		
}
