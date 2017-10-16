<?php
	//para enviar ao travis, tire o comentario da linha abaixo
	//require_once 'PHPUnit/Autoload.php';
	require_once 'model/MyError.php';
	require_once 'model/MySession.php';

	class Tests extends PHPUnit_Framework_TestCase{
		public function setUp(){

		}

		public function tearDown(){

		}

		public function test_validarLogin(){
			$this->assertEquals(True, MyError::dadosIncorretos("'OR 1=1';"));
			$this->assertEquals(True, MySession::naoLogado());
			MySession::setUser("bruno");
			MySession::setId(1);
			$this->assertEquals(False, MySession::naoLogado());

		}
	}
?>