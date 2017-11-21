<?php

?>
<script>
	$(function(){

		$("#btnDescansar").click(function(){
			$.ajax({
				type: 'POST',
				url: "phpResponses/recuperarVida.php",
				async: true,
				success: function(response){
					$("#cenarioPrincipal").html(response);
				}
			});
		});
	});
</script>
<div class="tavernaTelaScene">
	<div class="btnDescansar" id="btnDescansar">
		<div class="btnDescansarBot">
			Recuperar vida
		</div>
		
	</div>
</div>