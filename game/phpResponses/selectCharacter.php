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
					$info = defineInfo(0);
				}
			?>
			$("#informacoes").html("<?php echo $info; ?>");
		});
		$("#selectDiv2").mouseenter(function(){
			<?php 
				$info = "";
				if($qtdePersonagens > 1){
					$info = defineInfo(1);
				}
			?>
			$("#informacoes").html("<?php echo $info; ?>");
		});
		$("#selectDiv3").mouseenter(function(){
			<?php 
				$info = "";
				if($qtdePersonagens > 2){
					$info = defineInfo(2);
				}
			?>
			$("#informacoes").html("<?php echo $info; ?>");
		});
		$("#selectDiv4").mouseenter(function(){
			<?php 
				$info = "";
				if($qtdePersonagens > 3){
					$info = defineInfo(3);
				}
			?>
			$("#informacoes").html("<?php echo $info; ?>");
		});
		$("#selectDiv5").mouseenter(function(){
			<?php 
				$info = "";
				if($qtdePersonagens > 4){
					$info = defineInfo(4);
				}
			?>
			$("#informacoes").html("<?php echo $info; ?>");
		});
	});
</script>

<div class="selectOuterScene">
	<div class="titleScene">
		SELECIONE O PERSONAGEM
	</div>
	<div class="selectIntroScene">

		<?php
			$selectDivNumber = 1;
			for($i = 0 ; $i < $qtdePersonagens ; $i++){
				$selectDiv = "selectDiv" . ($selectDivNumber++);

		?>

				<div class="selectDivs" id="<?php echo $selectDiv;?>">
					<?php echo $personagens[$i]->nome; ?>
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
	function defineInfo($posicaoArray){
		return $posicaoArray;
	}
?>