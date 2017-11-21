<?php
	require "../../../connect.php";
	require "../../model/Inimigo.php";
	require "../../model/Personagem.php";
	session_start();
	$idPersonagem = $_SESSION["idPersonagem"];
	
	
	$tipoItem = rand(1,4);
	$itensSorteado = ""; 
	$cons = mysqli_query($link,"SELECT * FROM game_item WHERE tipoItem = '$tipoItem' ORDER BY rand()");	
	foreach($cons as $c){
		$id = $c["id"];		
		$itensSorteado = $id;
	}

	$cons2 = mysqli_query($link,"SELECT item FROM game_bau WHERE game_personagem = '$idPersonagem'");
	foreach($cons2 as $c2){
		$itens[] = $c2["item"];
	}

	foreach($itens as $item){
		if($item == $itensSorteado){
			
			return;
		}
	}
	mysqli_query($link, "INSERT INTO game_bau (game_personagem, item, tipoItem) VALUES ('$idPersonagem','$itensSorteado','$tipoItem')");
	

?>