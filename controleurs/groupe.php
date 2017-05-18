<?php

include(dirname(__FILE__).'/../modeles/chat.php');

if (isset($_POST['champ_de_text']) && !empty($_POST['champ_de_text']))
{
	post_message($_POST['champ_de_text'],$_SESSION['pseudo'],$_GET['groupe']);
}

$message = get_chat_message ($_GET['groupe']);

include(dirname(__FILE__).'/../vues/groupe.php');

?>