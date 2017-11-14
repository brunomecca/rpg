<?php
	require "../../connect.php";
	require "../model/Missao.php";

	$cons = mysqli_query($link,"SELECT * FROM game_missao");
	$missoes = array();;
	foreach($cons as $m){
		$missao = new Missao();
		$missao->titulo = $m["titulo"];
		$missao->descricao = $m["descricao"];
		$missao->recompensa = $m["recompensa"];
		$missao->nvRecomendado = $m["nvRecomendado"];
		$missao->qtdeInimigos = $m["qtdeInimigos"];
		$missoes[] = $missao; 
	}

	$numberOfMissions = count($missoes);
?>

<script>
	$(function(){
		var arr = [
			<?php
			for($i = 1 ; $i <= $numberOfMissions; $i++){
				echo '"#missao'.$i .'"' .",";
			}
			?>
		];

		$.each(arr, function(i,value){
			$(value).click(function(){
				$.post("phpResponses/centralTelaMissonInfo.php", {valor: i})
				.done(function(data) {
					$("#descricaoMissao").html(data);
					$("#waitForBtnJogar").html("<div class='btnGo'><button id='jogar' class='btnCreate'>JOGAR</button></div>");
					$("#jogar").click(function(){
						$.post("phpResponses/missaoScreen.php", {valor: i}).done(function(data) {
							$("#cenarioPrincipal").html(data);
						});
					});
				});
			});
		});

		$("#voltar").click(function(){
			$.ajax({
				type: 'POST',
				url: "phpResponses/telaPrincipal.php",
				async: true,
				success: function(response){
					$("#cenarioPrincipal").html(response);
				}
			});
		});
		
	});
</script>

<div class="centralScene">
	<div class="centralThings">
		<div class="missoes">
			<div class="titleMissoes">
				<strong>Missões disponíveis</strong>
			</div>
			<div class="disponiveis">
				<?php
				$i = 0;
				foreach($missoes as $missao){
					$i++;
				?>
					<br>
					<div class="nameMissao" id="missao<?php echo $i;?>">
						<?php
						echo $missao->titulo;
						?>
					</div>
				<?php
				}
				?>
			</div>
		</div>

		<div class="direitaCentral">
			<div class="instrucoes" id="descricaoMissao">

			</div>

			<div class="btnGo">
				<button id="voltar" class="btnVoltar">VOLTAR</button>
			</div>
			<div id="waitForBtnJogar">
			</div>
		</div>

	</div>
</div>