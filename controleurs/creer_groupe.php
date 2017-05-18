<?php

include(dirname(__FILE__).'/../modeles/groupe.php');

if (isset($_POST['nom_du_group']))
{
	creer_groupe ($_POST['nom_du_group'],$_SESSION['pseudo'],$_POST['description_du_group']);
}

include(dirname(__FILE__).'/../vues/creer_groupe.php');

?>