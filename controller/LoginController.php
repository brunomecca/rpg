<?php
	class LoginController{
		public function init() {
			$this->login();
		}

		public function login(){
			$login = $_POST['usuario'];
			$senha = $_POST['senha'];

			if(MyError::dadosIncorretos($login) || MyError::dadosIncorretos($senha)){
				echo "<script>alert('Dados incorretos!');</script>";
				return;
			}

			else if(UserDAO::login($login, $senha)){
				MySession::setUser($login);
				MySession::setId(UserDAO::getUserId());
				echo "<script>login();</script>";
			}
			else{
				echo "<script>alert('Informações incorretas!');</script>";
			}

		}
	}
?>
