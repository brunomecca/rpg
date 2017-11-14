<?php
	session_start();
	$name = trim($_POST["nome"]);
	require "../../connect.php";

	$cons = mysqli_query($link,"SELECT id FROM game_personagem WHERE nome = '$name'");

	foreach($cons as $c){
		$_SESSION["idPersonagem"] = $c["id"];
	}
?>