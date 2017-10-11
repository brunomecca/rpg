
<?php require_once "view/header.php"; ?>

<?php
	session_start();
	header('Content-Type: text/html; charset=utf-8');
	
	require_once "../connect.php";
	require_once "date.php";

	require_once "controller/PageController.php";

	require_once "model/PostDAO.php";

	if(!isset($_SESSION["usuario"]) || !isset($_SESSION["adm"])){
		header("Location: index.php");
	}

	if(isset($_GET["pg"])){

		if($_GET["pg"] == "config")
			$controller = new PageController("config");
		else if($_GET["pg"] == "noticia")
			$controller = new PageController("noticia");
		else if($_GET["pg"] == "contato")
			$controller = new PageController("contato");
		else if($_GET["pg"] == "comentario")
			$controller = new PageController("comentario");
		else if($_GET["pg"] == "sair")
			$controller = new PageController("sair");
	}
	else{
		header("Location: index.php");
	}
	$controller->init();
?>		

<?php require_once "view/bottom.php"; ?>
