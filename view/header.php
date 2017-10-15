<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Mundo Aventurado - Web Browser RPG Game</title>
	<link href='http://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'/>
	<link href="css/styles.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="js/script.js"></script>

</head>
<body>
	<!-- div do segundo bg <div class="wrapper"> -->
	<div id = "logo"><a href="index.php"><img src="images/mundoaventurado.png" alt="banner" /></a></div>
	<br><div class="page">

	<div class="menuPrincipal"><a href="index.php">Início</a> - <a href="#">Mundo</a> - <a href="#">Rank</a> - <a href="#">Sobre</a> - <a href="?page=contato">Contato</a></div>
	<div class="left-column">
		<div class="dark-panel">
			<div class="dark-panel-top"></div>
			<div class="dark-panel-center" id="parteDoLogin">
				<?php
					if(MySession::naoLogado()){
						?>
						<ul>
							<li>
								<h1>Entrar</h1>
							</li>
							<li>
								<p>Não perca tempo! <a href="?page=registro">Registre-se.</a></p>
							</li>

							<form action="" method="post" enctype="multipart/form-data">
								<li class="username">
									<input name="usuario" type="text" class="login-input" placeholder="Usuário" id="usuario"/>
								</li>
								<li class="password">
									<input name="senha" type="password" class="login-input" placeholder="Senha" id="senha"/>
								</li>
								<input type="hidden" name="acao" value="logar">
								<input type="submit" value="Entrar">
								<!--<input type="submit" value="Entrar"> --> 
							</form>

						</ul>
				<?php
					}
					else{

						$img = findImg($_SESSION["id"]);
						echo '<div class="parteDoLogin">
									<div class="imgLogin"><a href="?page=editperfil"><img src="game/profilePics/'. $img .'"></a></div>
									<div class="nomeLogin">'. $_SESSION["usuario"] .'</div>
									<div class="editPerfil"><a href="?page=editperfil">editar perfil</a></div>
									<div class="jogar"><a href="game/index.php" target="_blank">Jogar</a></div>
							</div>';
							echo '<div class="logout"><a href="?page=sair">Sair</a></div>';
					}
					
					//foi decidido implementar uma função para achar a foto do perfil
					function findImg($id){
						require "connect.php";
						$consulta = mysqli_query($link,"SELECT foto FROM game_usuarios WHERE id = '$id'");
						foreach($consulta as $cons){
							return $cons["foto"];
						} 
					}
				?>

				
			</div>
			<div class="dark-panel-bottom"></div>
		</div>

		<div class="dark-panel">
			<div class="dark-panel-top"></div>
			<div class="dark-panel-center">
				<ul>
					<div style="text-align:center; font-size:35px; color:#FF3333;margin-left:15px;">VS</div>
				</ul>

				<div class="pontuacao">
					<div class="milestones">
						Milestones
						<img src="images/milestone.png">
						Pontuação
						
					</div>
					
					<div class="goldthorns">
						Goldthorns
						<img src="images/goldthorn.png">
						Pontuação
					</div>
				</div>



			</div>
						<div class="dark-panel-bottom"></div>
		</div>

		<div class="light-panel">
			<div class="light-panel-top"></div>
			<div class="light-panel-center">
				<h1>Guia do jogo</h1>
				<ul>
					<li><a href="#">Como o jogo funciona?</a></li>
					<li><a href="#">Personagens</a></li>
					<li><a href="#">Itens</a></li>
					<li><a href="#">Missões</a></li>
					<li><a href="#">Facções</a></li>
					<li class="no-border"><a href="#">+ Proin tempor magna vel sap</a></li>
				</ul>
			</div>
			<div class="light-panel-bottom"></div>
		</div>
	</div>

