<?php
	session_start();
	require "../../../connect.php";
	require "../../model/Inimigo.php";
	require "../../model/Personagem.php";
	//essa missão tem número 0
	$missaoNumber = 1;

	$cons = mysqli_query($link,"SELECT * FROM game_missaoinimigo WHERE missao = '$missaoNumber'");
	$inimigos = array();
	foreach($cons as $c){
		$idInimigo = $c["inimigo"];
		$cons2 = mysqli_query($link,"SELECT * FROM game_inimigo WHERE id = '$idInimigo'");
		foreach($cons2 as $c2){
			$inimigo = new Inimigo();
			$inimigo->nome = $c2["nome"];
			$inimigo->arte = $c2["arte"];
			$inimigo->ataque = $c2["ataque"];
			$inimigo->vida = $c2["vida"];
			$inimigo->vidaMaxima = $c2["vidaMaxima"];
			$inimigo->xp = $c2["xp"];
			$inimigos[] = $inimigo;
		}
		
	}
	$idPersonagem = $_SESSION["idPersonagem"];
	$cons = mysqli_query($link, "SELECT * FROM game_personagem WHERE id = '$idPersonagem'");

	$character = new Personagem();
	foreach($cons as $c){
		$character->ataque = $c["ataqueFull"];
		$character->defesa = $c["defesaFull"];
		$character->iniciativa = $c["iniciativaFull"];
		$character->vida = $c["vida"];
		$character->vidaMaxima = $c["vidaMaxima"];
	}

	$_SESSION["numberInimigo"] = 4;

	if(empty($_SESSION["inimigos"])){
		$_SESSION["inimigos"] = $inimigos;
	}
	else{
		echo "<script>alert('ae');</script>";
	}
	
	$_SESSION["character"] = $character;
?>

<script>
	$(function(){
		$.each([0,1,2,3], function(index, value){
			$("#inimigo"+value).click(function(){
				$.post("phpResponses/missao/ataque.php", {atacado: value})
					.done(function(data) {
						 $("#dadosRecebidos").html(data);
				});
			});
		});
		

	});
</script>

<div class="esqueletoMissao">
	<div class="inimigos">
		<?php
		for($i = 0 ; $i < 4 ; $i++){
		?>
			<div class="inimigoScene" id="inimigo<?php echo $i;?>">
				<div style="height:50px;">
					<?php echo $inimigos[$i]->nome; ?>
				</div>
				<img src="images/missao/inimigos/<?php echo $inimigos[$i]->arte;?>">
				
				<div style="width:150px;" id="containerVidaInimigo<?php echo $i;?>">
					<?php
					$vidaWidth = intval(140 * $inimigos[$i]->vida / $inimigos[$i]->vidaMaxima);
					?>
					<div style='background-color:#00CC00;; width:<?php echo $vidaWidth;?>px; height:20px;'>
						
					</div>
				</div>
				<br>
				<div class="inimigoVidaText" id="inimigoVidaText<?php echo $i;?>">
					<?php echo $inimigos[$i]->vida . "/" . $inimigos[$i]->vidaMaxima;?>
				</div>
				<div id="atacked<?php echo $i;?>">
					
				</div>
			</div>
		<?php
		}
		?>

	</div>

	<div id = "dadosRecebidos">

	</div>
</div>