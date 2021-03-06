<?php
	session_start();
	setlocale( LC_ALL, 'pt_BR.utf-8', 'pt_BR', 'Portuguese_Brazil');
	date_default_timezone_set('America/Sao_Paulo');

	require_once "model/ConfigDAO.php";

	if(!isset($_SESSION['usuario']) || $_SESSION['usuario'] == ''){
		header('Location: ../index.php');
	}

	if(ConfigDAO::manutencao()){
		header('Location: ../index.php');
	}

	if(!ConfigDAO::online()){
		header('Location: ../index.php');
	}

	require_once "view/header.php";
	require_once "view/unique.php";
	require_once "view/bottom.php";
?>