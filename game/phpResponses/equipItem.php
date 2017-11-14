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

	$item = ItemDAO::getItem($id);

	$local = "";
	
	if($item->tipo == 1){
		if($segundaMao == 2){
			$local = '"#segundaMaoSection"';
			$info = "<div class='segundaMaoImg'>
					<img src='images/items/arma/" . $item->arte ."'>
				</div>
				<div class='segundaMaoText'>
					" . $item->nome ."
				</div>";
		}
		else{
			$local = '"#primeiraMaoSection"';
			$info = "<div class='primeiraMaoImg'>
					<img src='images/items/arma/" . $item->arte ."'>
				</div>
				<div class='primeiraMaoText'>
					" . $item->nome ."
				</div>";
		}
		
		$consulta = mysqli_query($link,"UPDATE game_personagem SET primeiraMao = '$id' WHERE id = '$idPersonagem'");
	}
	else if($item->tipo == 2){
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
	
?>

<script>
	$(function(){
		$(<?php echo $local;?>).html("<?php echo $info;?>");
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



