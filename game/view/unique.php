<script>
	
	$(function(){
		$("#firstAppearence").hide().fadeIn(3000);
		$("#DivbtnSelectCharacter").hide().fadeIn(6000);
		$("#btnSelectCharacter").click(function(){		
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


<div class="wholething">

	<div class="things">
		<div class="cenarioPrincipal" id="cenarioPrincipal">
			<div class="introScene">
				<div id="firstAppearence"><img src="images/mundoaventurado.png">
				</div>

				<div class="selectCharacter" id="DivbtnSelectCharacter">
					<div class="sessionSelectCharacter"><a href="#" id="btnSelectCharacter">Selecionar Personagem</a></div>
				</div>
			</div>
		</div>

		<div class="informacoes" id="informacoes">

		</div>
	</div>
</div>
