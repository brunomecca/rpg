
<?php 
	session_start();
	setlocale( LC_ALL, 'pt_BR.utf-8', 'pt_BR', 'Portuguese_Brazil');
	date_default_timezone_set('America/Sao_Paulo');

	
	
	require_once "model/PostDAO.php";
	require_once "model/UserDAO.php";
	require_once "model/Usuario.php";
	require_once "model/MyError.php";
	require_once "model/MySession.php";
	require_once "model/Comentario.php";
	require_once "model/ComentarioDAO.php";
	require_once "model/ContatoDAO.php";

	require_once "controller/PostController.php";
	require_once "controller/HomeController.php";
	require_once "controller/ContatoController.php";
	require_once "controller/RegistroController.php";
	require_once "controller/LoginController.php";

	require_once "view/header.php";
	
	if(!isset($_GET['page']) || $_GET['page'] == ''){
		$controller = new HomeController();
	}
	if(isset($_GET['single']) && $_GET['single'] != ''){
		$controller = new PostController();
	}
	else if(isset($_GET['page']) && $_GET['page'] == 'contato'){
		$controller = new ContatoController();
	}
	else if(isset($_GET['page']) && $_GET['page'] == 'registro'){
		$controller = new RegistroController();
	}

	$controller->init();

	require_once "view/bottom.php";

?>
