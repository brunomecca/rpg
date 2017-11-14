<?php
	$classe = "";
	$fac = "";

	function getInfo($class){

		if($class == 1)
			$ae = "<div class='classePersonagem'>
						Herói
					</div>
					<div class='infoClassPersonagem'>
						Classe focada em ter número alto em vida e utilização de armaduras pesadas.
						<br>O dano de seu personagem é contado somente com a espada de primeira mão.
					</div><br>
					<div class='tableAtt'>
						<table>
							<tr><td>Força</td><td>12</td></tr>
							<tr><td>Iniciativa</td><td>4</td></tr>
							<tr><td>Vigor</td><td>10</td></tr>
							<tr><td>Vitalidade</td><td>8</td></tr>
						</table>
					</div>
					";
		else
			$ae = "<div class='classePersonagem'>
						Ladino
					</div>
					<div class='infoClassPersonagem'>
						Classe focada em usar duas espadas com alta chance de dano duplo, porém com pouca quantidade de vida.
						<br>O dano de seu personagem depende da sua iniciativa, já que, para cada vez que ele ataca, os pontos de iniciativa são contados como dano bônus.
					</div><br>
					<div class='tableAtt'>
						<table>
							<tr><td>Força</td><td>4</td></tr>
							<tr><td>Iniciativa</td><td>12</td></tr>
							<tr><td>Vigor</td><td>8</td></tr>
							<tr><td>Vitalidade</td><td>10</td></tr>
						</table>
					</div>
					";
		return retirarQuebraDeLinhas($ae);
	}
	function retirarQuebraDeLinhas($info){
		$a = trim(preg_replace('/\s+/', ' ', $info));
		return $a;
	}
?>

<script>
	$(function(){
		$("#selectClass1").click(function(){
			$("#selectClass1").css({"border-color":"orange"});
			$("#selectClass2").css({"border-color":"grey"});
			<?php
				$info = getInfo(1);
			?>
			$("#classe").val("1");	
			$("#informacoes").html("<?php echo $info;?>");
		});

		$("#selectClass2").click(function(){

			$("#selectClass2").css({"border-color":"orange"});
			$("#selectClass1").css({"border-color":"grey"});
			$("#classe").val("2");
			<?php
				$info = getInfo(2);
			?>	
			$("#informacoes").html("<?php echo $info;?>");
		});

		$("#selectFac1").click(function(){
			$("#faccao").val("1");	
			$("#selectFac1").css({"border-color":"orange"});
			$("#selectFac2").css({"border-color":"grey"});
		});

		$("#selectFac2").click(function(){
			$("#faccao").val("2");
			$("#selectFac2").css({"border-color":"orange"});
			$("#selectFac1").css({"border-color":"grey"});
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
		
		$("#criar").click(function(){
			var name = $("#nome").val();
			var classeVal = $("#classe").val();
			var faccaoVal = $("#faccao").val();
			$.post("phpResponses/characterInToDb.php", {nome: name, classe: classeVal, fac: faccaoVal})
				.done(function(data) {
					alert(data);
					if(data.match("sucesso")){
						$.ajax({
							type: 'POST',
							url: "phpResponses/selectCharacter.php",
							async: true,
							success: function(response){
								$("#cenarioPrincipal").html(response);
							}
						});
					}
				});
		});
	});
</script>
<div class="createCharacter">Nome:
	<form action="" method="post" enctype="multipart/form-data">
		<input type="text"  id="nome" name="nome" required="true">
		<input type="hidden" name="acao" value="" id="classe">
		<input type="hidden" name="acao" value="" id="faccao">
	</form>
</div>

<div class="introSceneCreateCharacter">
	<div class="characterImgSelection" id="selectClass1">
		<img src="images/classes/superhero.png">
	</div>

	<div class="characterImgSelection" id="selectClass2">
		<img src="images/classes/thief.png">
	</div>
</div>

<div class="factions">
	<div class="facSelection" id="selectFac1">
		<img src="images/milestone.png">
	</div>
	<div class="facSelection" id="selectFac2">
		<img src="images/goldthorn.png">
	</div>
</div>

<div class="btns">
	<div class="btnGo">
		<button id="voltar" class="btnVoltar">VOLTAR</button>
	</div>

	<div class="btnGo">
		<button id="criar" class="btnCreate">CRIAR</button>
	</div>
</div>