<?php
	session_start();
	$att = $_POST["campo"];

	require "../../connect.php";

	
	$id = $_SESSION["idPersonagem"];
	$cons = mysqli_query($link,"SELECT * FROM game_personagem WHERE id = '$id'");

	$pntsDisponiveis = 0;
	foreach($cons as $c){
		$pntsDisponiveis = $c["pntsDisponiveis"];
	}
	if($pntsDisponiveis <= 0){
		return;
	}

	if($att == 1){
		$col = "forca";
	}
	else if($att == 2){
		$col = "iniciativa";
	}
	else if($att == 3){
		$col = "vigor";
	}
	else{
		$col = "vitalidade";
	}

	$cons = mysqli_query($link, "UPDATE game_tabelaatributo SET $col = $col + 1 WHERE game_personagem = '$id'");
	$cons = mysqli_query($link, "UPDATE game_personagem SET pntsDisponiveis = pntsDisponiveis - 1 WHERE id = '$id'");
	$cons = mysqli_query($link, "SELECT pntsDisponiveis FROM game_personagem WHERE id = '$id'");

	foreach($cons as $c){
		echo "Pontos disponíveis: " . $c["pntsDisponiveis"];
	}

	$cons = mysqli_query($link,"SELECT forca, vigor, iniciativa FROM game_tabelaatributo WHERE game_personagem = '$id'");
	foreach($cons as $c){
		$forca = $c["forca"];
		$vigor = $c["vigor"];
		$iniciativa = intval($c["iniciativa"] * 0.7);
	}

	if($att == 1){
		mysqli_query($link, "UPDATE game_personagem SET ataque = $forca * 2 WHERE id = '$id'");
		mysqli_query($link, "UPDATE game_personagem SET ataqueFull = ataqueSomado + ataque WHERE id = '$id'");
	}
	else if($att == 2){
		mysqli_query($link,"UPDATE game_personagem SET iniciativa = $iniciativa WHERE id = '$id'");
		mysqli_query($link, "UPDATE game_personagem SET iniciativaFull = iniciativaSomado + iniciativa WHERE id = '$id'");
	}
	else if($att == 3){
		mysqli_query($link, "UPDATE game_personagem SET vidaMaxima = $vigor * 10 WHERE id = '$id'");
	}

	//alterar vidamaxima, ataquesomado e iniciativasomado

	$cons = mysqli_query($link,"SELECT vida,vidaMaxima, ataqueFull, iniciativaFull FROM game_personagem WHERE id = '$id'");
	foreach($cons as $c){
		$vida = $c["vida"];
		$vidaMaxima = $c["vidaMaxima"];
		$ataqueFull = $c["ataqueFull"];
		$iniciativaFull = $c["iniciativaFull"];
	}

	$widthVida = round(170 * intval($vida) / intval($vidaMaxima));
	$divVidaMaxima = "<div style='background-color:#00CC00; width:".$widthVida."px; height:20px; float:left;'></div>";
	$textVidaMaxima = $vida . "/" . $vidaMaxima;
?>

<script>

	$(function(){
		$("#vidaBarSection").html("<?php echo $divVidaMaxima;?>");
		$("#textVidaSection").html("<?php echo $textVidaMaxima;?>");
		$("#ataque").html("<strong>Ataque</strong>: " + "<?php echo $ataqueFull;?>");
		$("#iniciativaChar").html("<strong>Iniciativa:</strong>: " + "<?php echo $iniciativaFull;?>");
	});

</script>