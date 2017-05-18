<?php

include(dirname(__FILE__).'/../modeles/info.php');

if (isset($_POST['nouveau']) || isset($_POST['modifier']))
{
	$date_debut = $_POST['debut_date_evenement'].' '.$_POST['debut_heure_evenement'].':00';
	$date_fin = $_POST['fin_date_evenement'].' '.$_POST['fin_heure_evenement'].':00';
}
	
if (isset($_POST['modifier']))
{
	modify_info($_POST['ID'],$_POST['nom_evenement'],$date_debut,$date_fin,$_POST['lieu_evenement'],$_POST['description_evenement']);
}

if (isset($_POST['nouveau']))
{
	add_info ($_POST['nom_evenement'],$date_debut,$date_fin,$_POST['lieu_evenement'],$_POST['description_evenement']);
}
	
if (isset($_POST['supprimer']))
{
	del_info($_POST['ID']);
}

if (isset($_GET['ID']))
{
	$info_value = get_info_info($_GET['ID']);
	print_r ($info_value);
	$date_debut = explode (' ',$info_value['date_debut']);
	$date_fin = explode (' ',$info_value['date_fin']);
}

$info = get_info();


include(dirname(__FILE__).'/../vues/agenda.php');