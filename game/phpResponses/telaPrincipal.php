<?php
		
?>
<script>
	$(function(){

		//pegando id do personagem
		var name = $("#namePersonagem").text();
		$.post("phpResponses/defineIdSession.php", {nome: name})
		.done(function(data){
			//debug aqui
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
	});
</script>

<div class="telaPrincipalScenario">

	<div class="options">
		<div class="op" id="armazem">
			Armazém
		</div>

		<div class="op" id="taverna">
			Taverna
		</div>

		<div class="op" id="santuario">
			Santuário			
		</div>

		<div class="op" id="central">
			Central
		</div>
	</div>
</div>