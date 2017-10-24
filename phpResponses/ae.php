<?php
	require "../model/MySession.php";
	session_start();
	if(isset($_SESSION["usuario"]) && isset($_SESSION["id"])){
		
		$img = findImg(MySession::getId());
		echo '<div class="parteDoLogin">
					<div class="imgLogin"><a href="?page=editperfil"><img src="game/profilePics/'. $img .'"></a></div>
					<div class="nomeLogin">'. $_SESSION["usuario"] .'</div>
					<div class="editPerfil"><a href="?page=editperfil">editar perfil</a></div>
					<div class="jogar"><a href="game/index.php" target="_blank">Jogar</a></div>
			</div>';
		echo '<div class="logout"><a href="?page=sair">Sair</a></div>';
	}
	else{
		echo "error";
	}

	function findImg($id){
		require "../connect.php";
		
		$consulta = mysqli_query($link,"SELECT foto FROM game_usuarios WHERE id = '$id'");
		foreach($consulta as $cons){
			return $cons["foto"];
			
		} 
		return false;
	}

	
?>