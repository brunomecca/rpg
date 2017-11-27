<?php
	$link = mysqli_connect("mysql.hostinger.com.br","u278340638_ae","naosei123","u278340638_ae");

	
	mysqli_query($link,"SET NAMES 'utf8'");
	mysqli_query($link,'SET character_set_connection=utf8');
	mysqli_query($link,'SET character_set_client=utf8');
	mysqli_query($link,'SET character_set_results=utf8');
?>