<?php
	session_start();
	require "../../connect.php";
	require "../model/Personagem.php";
	require "../model/PersonagemDAO.php";

	$usuario = $_SESSION["usuario"];
	$id = $_SESSION["id"];
	$personagens = PersonagemDAO::createPersonagem($id);
	$qtdePersonagens = count($personagens); 

	$qtdePersonagensNaoCriados = 5 - $qtdePersonagens;

?>

<script>
	//para atualizar as info do lado no site >>>
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
						else{
							$faccao =  '<img src="images/goldthorn.png">';
						}	
						//classe personagem
						if($personagens[$i]->classe == 1){
							echo 'Herói<br>';
							echo '<img src="images/classes/superhero.png"><br>';
							echo 'Nível: ' .  $personagens[$i]->nivel . "<br><br><br>";
						}
						else{
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
	// TODO
	function defineInfo($i,$personagens){
		$widthVida = round(170 * intval($personagens[$i]->vida) / intval($personagens[$i]->vidaMaxima));
		$retorno = "
			<div class='containerInfo'>
				<div class='namePersonagem'>
					" . $personagens[$i]->nome . "
				</div>

				<div class='classePersonagem'>
					". $personagens[$i]->classe . "
				</div>

				<div class='vidaPersonagem'>
					Vida
					<div class='vidaBar'>

						<div style='background-color:#00CC00; width:".$widthVida."px; height:20px; float:left;'>
						</div>
					</div>
					<div style='font-size:13px;'>
					" . $personagens[$i]->vida . "/". $personagens[$i]->vidaMaxima."
					</div>
				</div>

				<div class='equipamentosPersonagem'>
					<div class='primeiraMao'>
						<div class='primeiraMaoImg'>
							<img src='images/item1.png'>
						</div>
						<div class='primeiraMaoText'>
							Text Primeira Mao
						</div>		
					</div>

					<div class='segundaMao'>
						<div class='segundaMaoImg'>
							<img src='images/item1.png'>
						</div>
						<div class='segundaMaoText'>
							Text Segunda Mao
						</div>		
					</div>

					<div class='equipamentoSection'>
						<div class='equipamentoSectionImg'>
							
						</div>
						<div class='equipamentoSectionText'>
							armadura
						</div>	
					</div>

					<div class='equipamentoSection'>
						<div class='equipamentoSectionImg'>
							
						</div>
						<div class='equipamentoSectionText'>
							anel
						</div>	
					</div>

					<div class='equipamentoSection'>
						<div class='equipamentoSectionImg'>
							
						</div>
						<div class='equipamentoSectionText'>
							aura
						</div>	
					</div>
				</div>

				<div class='atributosPersonagem'>
					atributosPersonagem
				</div>

			</div>";
		return retirarQuebraDeLinhas($retorno);
	}

	function retirarQuebraDeLinhas($info){
		$a = trim(preg_replace('/\s+/', ' ', $info));
		return $a;
	}
?>

