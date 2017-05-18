<?php

function get_chat_message($groupe)
{
	$bdd = connect_db();
	
	$req_chat = $bdd->prepare('SELECT auteur, message, DATE_FORMAT(date_post,\'%H:%i\') AS heure_post FROM chat WHERE groupe = ? AND date_post >= DATE_ADD(NOW(),INTERVAL -7 DAY) ORDER BY date_post');
    $req_chat->execute(array($_GET['groupe']));
	
	$message_chat = array();
	
	while ($donnees = $req_chat->fetch())
	{
		$message_chat[] = $donnees;
	}
	$req_chat->closeCursor();
	
	return $message_chat;
}

function post_message ($message, $auteur, $groupe)
{
	$bdd = connect_db();

	$req = $bdd->prepare('INSERT INTO chat (auteur, message,groupe,date_post) VALUES(?, ?, ?,NOW())');

	$req->execute(array($auteur,$message,$groupe));
	$req->closeCursor;
}

?>