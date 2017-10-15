<?php
	session_start();
	setlocale( LC_ALL, 'pt_BR.utf-8', 'pt_BR', 'Portuguese_Brazil');
	date_default_timezone_set('America/Sao_Paulo');

	require_once "model/ConfigDao.php";

	if(!isset($_SESSION['usuario']) || $_SESSION['usuario'] == ''){
		header('Location: ../index.php');
	}

	if(ConfigDAO::manutencao()){
		//server está em manutenção
	}
	else if(!ConfigDAO::online()){
		//server não está online
	}

	require_once "view/header.php";
	require_once "view/unique.php";
	require_once "view/bottom.php";
?>