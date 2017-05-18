<?php

function send_request($auteur, $destinataire, $groupe, $is_inv)
{
	$bdd = connect_db();
	
	$req_request = $bdd->prepare('INSERT INTO requete (auteur, destinataire, groupe, is_inv, date_post) VALUES (?,?,?,?,NOW())');
	$req_request->execute(array($auteur,$destinataire,$groupe,$is_inv));
	$req_request->closeCursor();
}

function del_request ($id)
{
	$bdd = connect_db();
	
	$del = $bdd->prepare('DELETE * FROM requete WHERE ID=?');
	$del->execute(array($id));
}


	
	