<?php
	//para enviar ao travis, tire o comentario da linha abaixo
	//require_once 'PHPUnit/Autoload.php';
	require_once 'model/MyError.php';
	require_once 'model/MySession.php';
	require_once 'model/PostDAO.php';
	require_once 'model/ComentarioDAO.php';
	require_once 'controller/ContatoController.php';
	require_once 'controller/HomeController.php';

	class Tests extends PHPUnit_Framework_TestCase{
		public function setUp(){

		}

		public function tearDown(){

		}

		public function test_validarLogin(){
			$this->assertEquals(True, MyError::dadosIncorretos("'OR 1=1';"));
			$this->assertEquals(True, MyError::dadosIncorretos("dxz,c,zxc,xzcsdk123'@dks>><"));
			$this->assertEquals(True, MyError::dadosIncorretos(""));
			$this->assertEquals(False, MyError::dadosIncorretos("bruno"));
			$this->assertEquals(False, MyError::validaEmail("ae"));
			$this->assertEquals(True, MyError::validaEmail("brunogmecca@gmail.com"));
			$this->assertEquals(True, MySession::naoLogado());
			$this->assertEquals(False, MySession::getUser());
			$this->assertEquals(null,MySession::setUser("bruno"));
			$this->assertEquals(False, MySession::getId());
			$this->assertEquals(null, MySession::setId(1));

			$this->assertEquals("bruno", MySession::getUser());
			$this->assertEquals(1, MySession::getId());
			$this->assertEquals(False, MySession::naoLogado());
			$this->assertEquals(null, MySession::logout());
			$this->assertEquals(null,MySession::setId(1));
			
		}

		public function test_posts(){
			$this->assertEquals(0, PostDAO::retriveComments(-1));
			$_GET["single"] = null;
			$_GET["pag"] = null;
			$this->assertEquals(1, PostDAO::numberPage());
			$this->assertEquals(-1,PostDAO::postInTheMoment());
			$_GET["single"] = 30;
			$this->assertEquals(30,PostDAO::postInTheMoment());
			$_GET["pag"] = 1;
			$this->assertEquals(1, PostDAO::numberPage());
			
			$this->assertEquals(2, PostDAO::numberPosts());
		}

		public function test_comentario(){
			$this->assertEquals(False,ComentarioDAO::postarComentario(null,null));
		}

		public function test_homeController(){
			$home = new HomeController();
			$this->assertEquals(null, $home->init());
			$this->assertEquals(null, $home->home());
			$this->assertEquals(null, $home->login());
		}

		public function test_contatoController(){
			$home = new ContatoController();
			$_POST["conteudo"] = "2'1'''@";
			$_POST["email"] = 'kmdmkad2f>';
			$_POST["nome"] = "@#<!3,";
			$_POST['acao'] = 'contato';
			$this->assertEquals(null, $home->init());
			$_POST["email"] = "bruno@bruno.com";
			$this->assertEquals(null, $home->home());

		}
	}
?>