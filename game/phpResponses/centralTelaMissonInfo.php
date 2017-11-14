<?php
	require "../../connect.php";

	$number = $_POST["valor"];

	$cons = mysqli_query($link, "SELECT * FROM game_missao WHERE numeroMissao = '$number'");

	foreach($cons as $m){
		echo $m["descricao"];
		echo "<br>";
		echo '<div class="missionDescription">';
		echo "<strong>Nível recomendado</strong>: " . $m["nvRecomendado"];
		echo "<br>";
		echo "<strong>Quantidade de inimigos</strong>: " . $m["qtdeInimigos"];
		echo "<br>";
		echo "<strong>Recompensa</strong>: " . $m["recompensa"];
		echo "<br>";
		echo "</div>";

		echo "<br>Lembre-se: ao sair da missão sem ir até o fina, você perderá todo o progresso!";
	}
?>

