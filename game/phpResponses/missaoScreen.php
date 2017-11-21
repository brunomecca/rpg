<?php
	require "../model/Missao.php";
	require "../../connect.php";
	$mission = $_POST["valor"];

	$selectMissao = mysqli_query($link,"SELECT * FROM game_missao WHERE numeroMissao = '$mission'");

	$local = "";

	foreach($selectMissao as $m){
		$local = $m["doc"];
	}
	$local = "phpResponses/missao/" . $local;
?>

<script>
	$(function(){

		$.ajax({
			type: 'POST',
			url: "<?php echo $local;?>",
			async: true,
			success: function(response){
				$("#cenarioPrincipal").html(response);
			}
		});
	});
</script>
