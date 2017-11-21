<?php
	session_start();
	$_SESSION["inimigos"] = "";
	$_SESSION["character"] = "";
?>
<script>
	$(function(){

		//pegando id do personagem
		var name = $("#namePersonagem").text();
		$.post("phpResponses/defineIdSession.php", {nome: name})
		.done(function(data){
			//debug aqui
			//pode deixar sem nada aqui
		});

		//link do armazem
		$("#armazem").click(function(){
			$.ajax({
				type: 'POST',
				url: "phpResponses/armazemTela.php",
				async: true,
				success: function(response){
					$("#cenarioPrincipal").html(response);
				}
			});
		});

		//link da central
		$("#central").click(function(){
			$.ajax({
				type: 'POST',
				url: "phpResponses/centralTela.php",
				async: true,
				success: function(response){
					$("#cenarioPrincipal").html(response);
				}
			});
		});

		//link do santuario
		$("#santuario").click(function(){
			$.ajax({
				type: 'POST',
				url: "phpResponses/santuarioTela.php",
				async: true,
				success: function(response){
					$("#cenarioPrincipal").html(response);
				}
			});
		});

		//link da taverna
		$("#taverna").click(function(){
			$.ajax({
				type: 'POST',
				url: "phpResponses/tavernaTela.php",
				async: true,
				success: function(response){
					$("#cenarioPrincipal").html(response);
				}
			});
		});

		$("#voltar").click(function(){
			$.ajax({
				type: 'POST',
				url: "phpResponses/selectCharacter.php",
				async: true,
				success: function(response){
					$("#cenarioPrincipal").html(response);
				}
			});
		});

	});
</script>

<div class="telaPrincipalScenario">

	<div class="options">
		<div class="op" id="armazem">
		
		</div>

		<div class="op" id="taverna">
		
		</div>

		<div class="op" id="santuario">
		
		</div>

		<div class="op" id="central">
		
		</div>
	</div>

</div>