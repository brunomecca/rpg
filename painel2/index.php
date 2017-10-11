
<?php require_once "view/header.php"; ?>

<?php
	session_start();

	
	require_once "../connect.php";

	require_once "model/LoginDAO.php";

	require_once "controller/HomeController.php";
	require_once "controller/AdminController.php";

	
	if(!isset($_SESSION["usuario"]) || !isset($_SESSION["adm"])){
		$controller = new HomeController();

	}
	else if(isset($_SESSION["adm"]) && $_SESSION["adm"] == 1 && $_SESSION["usuario"] != ""){
		$controller = new AdminController();

	}

	$controller->init();
?>		

<?php require_once "view/bottom.php"; ?>
