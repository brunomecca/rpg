<?php
	session_start();
	require "../../connect.php";
	$idPersonagem = $_SESSION["idPersonagem"];
	mysqli_query($link,"UPDATE game_personagem SET vida = vidaMaxima WHERE id = '$idPersonagem'");
?>

<script>
	$(function(){
		$.ajax({
			type: 'POST',
			url: "phpResponses/telaPrincipal.php",
			async: true,
			success: function(response){
				$("#cenarioPrincipal").html(response);
			}
		});
		var textLife = parseInt($("#textVidaSection").text().split("/")[1]);
		$("#vidaBarSection").html("<div style='background-color:#00CC00; width:170px; height:20px; float:left;'></div>");
		$("#textVidaSection").html(textLife + "/" + textLife);

	});
		
</script>