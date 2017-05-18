<?php

include(dirname(__FILE__).'/../modeles/compte_utilisateur.php');
if (isset($_POST['password']) && !empty($_POST['password']))
{
	$mdp = get_password();
	if ($_POST['password'] == $mdp['mdp'])
	{
		$_SESSION['pseudo'] = $_POST['login'];
		header('Location: index.php?page=groupe&groupe='.$mdp['classe']);
		exit(); 
	}
	else
	{
		$wrong_password = 1;
	}
}

include(dirname(__FILE__).'/../vues/connexion.php');

?>