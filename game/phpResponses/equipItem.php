<?php
	session_start();
	$valor = $_POST["valor"];
	$segundaMao = $_POST["local"];

	require "../model/ItemDAO.php";
	require "../../connect.php";

	$id = filter_var($valor, FILTER_SANITIZE_NUMBER_INT); 
	$idPersonagem = $_SESSION['idPersonagem'];

	if(!ItemDAO::itemDoPersonagem($id,$idPersonagem)){
		echo "<script>alert('Esse item não é seu! Po');</script>";
		return;
	}

	$ataque = 0;
	$defesa = 0;
	$iniciativa = 0;

	$cons = mysqli_query($link,"SELECT ataque,defesa,iniciativa FROM game_personagem WHERE id = '$idPersonagem'");
	foreach($cons as $c){
		$ataque = $c["ataque"];
		$defesa = $c["defesa"];
		$iniciativa = $c["iniciativa"];
	}

	$item = ItemDAO::getItem($id);

	$local = "";
	
	if($item->tipo == 1){
		$ataqueArma = $item->ataque;

		if($segundaMao == 2){
			$local = '"#segundaMaoSection"';
			$info = "<div class='segundaMaoImg'>
					<img src='images/items/arma/" . $item->arte ."'>
				</div>
				<div class='segundaMaoText'>
					" . $item->nome ."
				</div>";
				$consulta = mysqli_query($link,"UPDATE game_personagem SET segundaMao = '$id' WHERE id = '$idPersonagem'");
		}
		else{
			$local = '"#primeiraMaoSection"';
			$info = "<div class='primeiraMaoImg'>
					<img src='images/items/arma/" . $item->arte ."'>
				</div>
				<div class='primeiraMaoText'>
					" . $item->nome ."
				</div>";
			$consulta = mysqli_query($link,"UPDATE game_personagem SET primeiraMao = '$id' WHERE id = '$idPersonagem'");
		}
		

	}
	else if($item->tipo == 2){
		$defesaArmadura = $item->defesa;
		$local = '"#armaduraSection"';
		$info = "<div class='equipamentoSectionImg'>
						<img src='images/items/armadura/" . $item->arte ."'>
					</div>
					<div class='equipamentoSectionText'>
						" . $item->nome ."
					</div>";
		$consulta = mysqli_query($link,"UPDATE game_personagem SET armadura = '$id' WHERE id = '$idPersonagem'");
	}
	else if($item->tipo == 3){
		$local = '"#utensilioSection"';
		$info = "<div class='equipamentoSectionImg'>
						<img src='images/items/utensilio/" . $item->arte ."'>
					</div>
					<div class='equipamentoSectionText'>
						" . $item->nome ."
					</div>";
		$consulta = mysqli_query($link,"UPDATE game_personagem SET utensilio = '$id' WHERE id = '$idPersonagem'");
	}
	else if($item->tipo == 4){

		$local = '"#auraSection"';
		$info = "<div class='equipamentoSectionImg'>
						<img src='images/items/aura/" . $item->arte ."'>
					</div>
					<div class='equipamentoSectionText'>
						" . $item->nome ."
					</div>";
		$consulta = mysqli_query($link,"UPDATE game_personagem SET aura = '$id' WHERE id = '$idPersonagem'");
	}

	$local = retirarQuebraDeLinhas($local);
	$info = retirarQuebraDeLinhas($info);
	$script = retirarQuebraDeLinhas('$('.$local.').html('.$info.');');

	function retirarQuebraDeLinhas($info){
		$a = trim(preg_replace('/\s+/', ' ', $info));
		return $a;
	}

	$consulta = mysqli_query($link,"SELECT armadura,aura,utensilio FROM game_personagem WHERE id = '$idPersonagem'");
	foreach($consulta as $c){
		$armadura = ItemDAO::getItem($c["armadura"]);
		$aura = ItemDAO::getItem($c["aura"]);
		$utensilio = ItemDAO::getItem($c["utensilio"]);
	}
	$defesaSomado = 0;
	if(get_class($armadura) != "Item"){
		$defesaSomado = $armadura->defesa;
	}

	if(get_class($utensilio) != "Item"){
		if($utensilio->aura != 0){
			$auraUtensilio = ItemDAO::getItem($utensilio->aura);
			if($auraUtensilio->inspirador == "defesa"){
				$defesaSomado = $defesaSomado + ($defesaSomado * $auraUtensilio->attInspirador);
			}
		}
	}

	if(get_class($aura) != "Item"){
		if($aura->inspirador == "defesa"){
			$defesaSomado = $defesaSomado + ($defesaSomado * $aura->attInspirador);
		}
	}
	mysqli_query($link,"UPDATE game_personagem SET defesaSomado = $defesaSomado WHERE id = '$idPersonagem'");
	mysqli_query($link,"UPDATE game_personagem SET defesaFull = defesaSomado + defesa WHERE id = '$idPersonagem'");
	$consulta = mysqli_query($link,"SELECT defesaFull FROM game_personagem WHERE id = '$idPersonagem'");
	
	foreach($consulta as $c){
		$defesa = $c["defesaFull"];
	}

	$consulta = mysqli_query($link,"SELECT primeiraMao,segundaMao,aura,utensilio FROM game_personagem WHERE id = '$idPersonagem'");
	foreach($consulta as $c){
		$primeiraMao = ItemDAO::getItem($c["primeiraMao"]);
		$segundaMao = ItemDAO::getItem($c["segundaMao"]);
		$aura = ItemDAO::getItem($c["aura"]);
		$utensilio = ItemDAO::getItem($c["utensilio"]);
	}
	$ataqueSomado = 0;
	if(get_class($primeiraMao) != "Item"){
		$ataqueSomado = $ataqueSomado + $primeiraMao->ataque;
	}
	if(get_class($segundaMao) != "Item"){
		$ataqueSomado = $ataqueSomado + $segundaMao->ataque;
	}

	if(get_class($utensilio) != "Item"){
		if($utensilio->aura != 0){
			$auraUtensilio = ItemDAO::getItem($utensilio->aura);
			if($auraUtensilio->insipirador == "ataque"){
				$ataqueSomado = $ataqueSomado + ($ataqueSomado * $auraUtensilio->attInspirador);
			}
			if($auraUtensilio->insipirador == "iniciativa"){
				$iniciativa = $iniciativa + ($iniciativa * $auraUtensilio->attInspirador);
			}
		}
	}

	if(get_class($aura) != "Item"){
		if($aura->inspirador == "ataque"){
			$ataqueSomado = $ataqueSomado + ($ataqueSomado * $aura->attInspirador);
		}
		if($aura->inspirador == "iniciativa"){
			$iniciativa = $iniciativa + ($iniciativa * $aura->attInspirador);
		}
	}

	mysqli_query($link,"UPDATE game_personagem SET ataqueSomado = $ataqueSomado WHERE id = '$idPersonagem'");
	mysqli_query($link,"UPDATE game_personagem SET ataqueFull = ataqueSomado + ataque WHERE id = '$idPersonagem'");
	$consulta = mysqli_query($link,"SELECT ataqueFull FROM game_personagem WHERE id = '$idPersonagem'");
	
	foreach($consulta as $c){
		$ataque = $c["ataqueFull"];
	}

	mysqli_query($link, "UPDATE game_personagem SET iniciativaSomado = $iniciativa WHERE id = '$idPersonagem'");
	mysqli_query($link, "UPDATE game_personagem SET iniciativaFull = iniciativa + iniciativaSomado WHERE id = '$idPersonagem'");
	$consulta = mysqli_query($link,"SELECT iniciativaFull FROM game_personagem WHERE id = '$idPersonagem'");

	foreach($consulta as $c){
		$iniciativaFull = $c["iniciativaFull"];
	}
?>

<script>
	$(function(){
		$(<?php echo $local;?>).html("<?php echo $info;?>");
		$("#ataque").html("<strong>Força</strong>:" + "<?php echo $ataque;?>");
		$("#defesa").html("<strong>Defesa</strong>:" + "<?php echo $defesa;?>");
		$("#iniciativaChar").html("<strong>Iniciativa</strong>:" + "<?php echo $iniciativa;?>");
		$.ajax({
				type: 'POST',
				url: "phpResponses/armazemTela.php",
				async: true,
				success: function(response){
					$("#cenarioPrincipal").html(response);
				}
			});
	});
</script>



