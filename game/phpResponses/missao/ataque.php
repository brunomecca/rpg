<?php
	require "../../../connect.php";
	require "../../model/Inimigo.php";
	require "../../model/Personagem.php";
	session_start();
	$i = $_POST["atacado"];
	$idPersonagem = $_SESSION["idPersonagem"];

	//variavies de controle
	$sair = '<script>$(function(){ $.ajax({
				type: "POST",
				url: "phpResponses/telaPrincipal.php",
				async: true,
				success: function(response){
					$("#cenarioPrincipal").html(response);
				}
			}); });</script>';
	$recompensa = '<script>$(function(){ $.ajax({
				type: "POST",
				url: "phpResponses/missao/recompensa.php",
				async: true,
				success: function(response){
					alert("Item adicionado!");
				}
			}); });</script>';
	$tirarInimigo = '<script>$(function(){$("#inimigo'.$i.'").html("") });</script>';

	$inimigos = $_SESSION["inimigos"];
	$character = $_SESSION["character"];
	$probabilidadeDe2Ataques = rand(1,100);

	$duploAtaque = False;
	if($probabilidadeDe2Ataques <= 25){
		$duploAtaque = True;
	}

	$j = 0;
	if($duploAtaque){
		$j = rand(0,3);
	}

	$ataque1 = 0;
	$ataque2 = 0;
	if($i != $j){
		$ataque1 = $inimigos[$i]->ataque - $character->defesa;
		$ataque2 = $inimigos[$j]->ataque - $character->defesa;
		if($ataque1 <= 0)
			$ataque1 = 0;
		if($ataque2 <= 0)
			$ataque2 = 0;

	}
	else{
		$ataque1 = $inimigos[$i]->ataque;
	
	}
	$inimigos[$i]->vida = $inimigos[$i]->vida - $character->ataque;
		
	if($inimigos[$i]->vida <= 0){
		$tirarInimigo = '<script>$(function(){$("#inimigo'.$i.'").html("") });</script>';
		echo $tirarInimigo;
		$_SESSION["numberInimigo"]--;
		$xpGanhado = $inimigos[$i]->xp;
		mysqli_query($link,"UPDATE game_personagem SET xp = xp + $xpGanhado WHERE id = '$idPersonagem'");
	}
	else{
		$character->vida = $character->vida - $ataque1;
	}
	
	$character->vida = $character->vida - $ataque2;

	if($character->vida <= 0){
		$character->vida = 0;
		echo "<script>alert('Você morreu!');</script>";
		$_SESSION["inimigos"] = "";
		$_SESSION["character"] = "";
		echo $sair;
	}

	$_SESSION["inimigos"] = $inimigos;

	mysqli_query($link,"UPDATE game_personagem SET vida = $character->vida WHERE id = '$idPersonagem'");

	$widthVida = intval(170 * $character->vida / $character->vidaMaxima);
	
	if($inimigos[$i]->vida <= 0){
		$widthVidaInimigo = 0;
	}
	else
		$widthVidaInimigo = intval(140 * $inimigos[$i]->vida / $inimigos[$i]->vidaMaxima);

	if($_SESSION["numberInimigo"] <= 0){
		echo "<script>alert('GANHOU!');</script>";
		echo $recompensa;
		$_SESSION["recompensa"] = 0;
		echo $sair;
	}

?>

<script>
	
	$(function(){
		$("#vidaBarSection").html("<div style='background-color:#00CC00; width:<?php echo $widthVida;?>px; height:20px; float:left;'></div>");
		$("#textVidaSection").html("<?php echo $character->vida;?>" + "/" + "<?php echo $character->vidaMaxima;?>");

		$("#containerVidaInimigo<?php echo $i;?>").html("<div style='background-color:#00CC00;; width:<?php echo $widthVidaInimigo;?>px; height:20px;'></div>");
		$("#inimigoVidaText<?php echo $i;?>").html("<?php echo $inimigos[$i]->vida . '/' . $inimigos[$i]->vidaMaxima;?>");

		$.each([0,1,2,3], function(i, value){
			$("#atacked"+value).html("");
		});

		<?php
		if($duploAtaque){
		?>
			$("#atacked<?php echo $i;?>").html('<div style="margin-left:75px;width:10px; background-color:red; height:5px;"></div>');
			$("#atacked<?php echo $j;?>").html('<div style="margin-left:75px;width:10px; background-color:red; height:5px;"></div>');
		<?php
		}
		else{
		?>
			$("#atacked<?php echo $i;?>").html('<div style="margin-left:75px;width:10px; background-color:red; height:5px;"></div>');
		<?php
		}
		?>
	});

</script>

