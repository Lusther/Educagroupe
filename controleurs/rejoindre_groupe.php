<?php

include(dirname(__FILE__).'/../modeles/groupe.php');
include(dirname(__FILE__).'/../modeles/requete.php');

if (isset($_POST['valider']))
{
	foreach ($_POST as $key => $element)
	{
		$pos = strpos($key,'groupes_choisis');
		if (!($pos === false))
		{
			$admin = get_admin_name($element);
			send_request($_SESSION['pseudo'],$admin,$element,0);
		}
	}
}

$liste_groupe = get_groupe();

include(dirname(__FILE__).'/../vues/rejoindre_groupe.php');