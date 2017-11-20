<?php
	session_start();
	require "../../connect.php";

	require "../model/Personagem.php";
	require "../model/PersonagemDAO.php";
	require "../model/ItemDAO.php";



	$usuario = $_SESSION["usuario"];
	$id = $_SESSION["id"];
	$personagens = PersonagemDAO::createPersonagem($id);
	$qtdePersonagens = count($personagens); 

	$qtdePersonagensNaoCriados = 5 - $qtdePersonagens;

?>

<script>
	$(function(){
		//não da pra utilizar um .each aqui. se quiser, então deve-se utilizar uma outra chamada ajax
		$("#selectDiv1").mouseenter(function(){
			<?php 
				$info = "";
				if($qtdePersonagens > 0){
					$info = defineInfo(0,$personagens);
				}
				
			?>
			$("#informacoes").html("<?php echo $info;?>");
		});
		$("#selectDiv2").mouseenter(function(){
			<?php 
				$info = "";
				if($qtdePersonagens > 1){
					$info = defineInfo(1,$personagens);
				}
				
			?>
			$("#informacoes").html("<?php echo $info; ?>");
		});
		$("#selectDiv3").mouseenter(function(){
			<?php 
				$info = "";
				if($qtdePersonagens > 2){
					$info = defineInfo(2,$personagens);
				}
				
			?>
			$("#informacoes").html("<?php echo $info; ?>");
		});
		$("#selectDiv4").mouseenter(function(){
			<?php 
				$info = "";
				if($qtdePersonagens > 3){
					$info = defineInfo(3,$personagens);
				}
				
			?>
			$("#informacoes").html("<?php echo $info; ?>");
		});
		$("#selectDiv5").mouseenter(function(){
			<?php 
				$info = "";
				if($qtdePersonagens > 4){
					$info = defineInfo(4,$personagens);
				}

			?>
			$("#informacoes").html("<?php echo $info; ?>");
		});


		$.each([1,2,3,4,5], function(index, value){
			if($("#selectDiv"+value).text().match("CRIAR")){
				$("#selectDiv"+value).click(function(){
					$.ajax({
						type: 'POST',
						url: "phpResponses/createCharacter.php",
						async: true,
						success: function(response){
							$("#title").html("NOVO PERSONAGEM");
							$("#selectIntroScene").html(response);
						}
					});
				});
			}
			else{
				$("#selectDiv"+value).click(function(){
					$.ajax({
						type: 'POST',
						url: "phpResponses/telaPrincipal.php",
						async: true,
						success: function(response){
							$("#cenarioPrincipal").html(response);
						}
					});
				});
			}
		});

	});
</script>

<div class="selectOuterScene">
	<div class="titleScene" id="title">
		SELECIONE O PERSONAGEM
	</div>
	<div class="selectIntroScene" id="selectIntroScene">

		<?php
			$selectDivNumber = 1;
			for($i = 0 ; $i < $qtdePersonagens ; $i++){
				$selectDiv = "selectDiv" . ($selectDivNumber++);

		?>

				<div class="selectDivs" id="<?php echo $selectDiv;?>">
					<?php echo $personagens[$i]->nome;?>
					<div class="characterImg">
					<?php 
						//faccao
						if($personagens[$i]->faccao == 1){
							$faccao = '<img src="images/milestone.png">';
						}
						else if($personagens[$i]->faccao == 0){
							$faccao =  '<img src="images/goldthorn.png">';
						}	
						//classe personagem
						if($personagens[$i]->classe == "Herói"){
							echo 'Herói<br>';
							echo '<img src="images/classes/superhero.png"><br>';
							echo 'Nível: ' .  $personagens[$i]->nivel . "<br><br><br>";
						}
						else if($personagens[$i]->classe == "Ladino"){
							echo 'Ladino<br>';
							echo '<img src="images/classes/thief.png"><br>';
							echo 'Nível: ' .  $personagens[$i]->nivel . "<br><br><br>";
						}
						echo $faccao;
					?>
					</div>
					

				</div>

		<?php
			}
		?>

		<?php
			for($i = 0 ; $i < $qtdePersonagensNaoCriados ; $i++){
				$selectDiv = "selectDiv" . ($selectDivNumber++);
		?>

				<div class="selectDivs" id="<?php echo $selectDiv;?>">
					CRIAR PERSONAGEM
				</div>

		<?php
			}
		?>

	</div>
</div>

<?php 
	function defineInfo($i,$personagens){
		$widthVida = round(170 * intval($personagens[$i]->vida) / intval($personagens[$i]->vidaMaxima));
		$retorno = "
			<div class='containerInfo'>
				<div class='namePersonagem' id='namePersonagem'>
					" . $personagens[$i]->nome . "
				</div>

				<div class='classePersonagem'>
					". $personagens[$i]->classe . "
				</div>

				<div class='vidaPersonagem'>
					Vida
					<div class='vidaBar' id = 'vidaBarSection'>

						<div style='background-color:#00CC00; width:".$widthVida."px; height:20px; float:left;'>
						</div>
					</div>
					<div style='font-size:13px;' id='textVidaSection'>
					" . $personagens[$i]->vida . "/". $personagens[$i]->vidaMaxima."
					</div>
				</div>

				<div class='equipamentosPersonagem'>
					<div class='primeiraMao' id = 'primeiraMaoSection'>
						<div class='primeiraMaoImg'>
							<img src='images/items/arma/" . $personagens[$i]->primeiraMao->arte ."'>
						</div>
						<div class='primeiraMaoText'>
							" . $personagens[$i]->primeiraMao->nome ."
						</div>		
					</div>

					<div class='segundaMao' id='segundaMaoSection'>
						<div class='segundaMaoImg'>
							<img src='images/items/arma/" . $personagens[$i]->segundaMao->arte ."'>
						</div>
						<div class='segundaMaoText'>
							" . $personagens[$i]->segundaMao->nome ."
						</div>		
					</div>

					<div class='equipamentoSection' id='armaduraSection'>
						<div class='equipamentoSectionImg'>
							<img src='images/items/armadura/" . $personagens[$i]->armadura->arte ."'>
						</div>
						<div class='equipamentoSectionText'>
							" . $personagens[$i]->armadura->nome ."
						</div>	
					</div>

					<div class='equipamentoSection' id='utensilioSection'>
						<div class='equipamentoSectionImg' >
							<img src='images/items/utensilio/" . $personagens[$i]->utensilio->arte ."'>
						</div>
						<div class='equipamentoSectionText'>
							" . $personagens[$i]->utensilio->nome ."
						</div>	
					</div>

					<div class='equipamentoSection' id='auraSection'>
						<div class='equipamentoSectionImg'>
							<img src='images/items/aura/" . $personagens[$i]->aura->arte ."'>
						</div>
						<div class='equipamentoSectionText'>
							" . $personagens[$i]->aura->nome ."
						</div>	
					</div>
				</div>

				<div class='atributosPersonagem'>
					<div id='ataque'><strong>Ataque</strong>: " . $personagens[$i]->ataque . "</div>
					<div id='iniciativaChar'><strong>Iniciativa</strong>: " . $personagens[$i]->iniciativa ."</div>
					<div id='defesa'><strong>Defesa</strong>: " . $personagens[$i]->defesa . "</div>
				</div>

			</div>";
		return retirarQuebraDeLinhas($retorno);
	}

	function retirarQuebraDeLinhas($info){
		$a = trim(preg_replace('/\s+/', ' ', $info));
		return $a;
	}

	function checkIf0($obj, $itemNumber){
		if($obj == 0){
			return " ";
		}
			
		
		return $obj;
	}
?>

