<?php
	class RegistroController{
		public function init() {
	        $this->home(); 
	    }

	    public function home(){
			require "view/registro.php";

			if(isset($_POST['acao']) && $_POST['acao'] == 'registro'){
				$ok = True;
				if(!isset($_POST['termos'])){
					echo "<script>alert('Você deve aceitar os termos!');</script>";
					$ok = False;
				}

				if($ok){
					$newsletter = "nao";
					if(isset($_POST['newsletter'])){
						$newsletter = $_POST['newsletter'];
					}
					
					$nome = $_POST['nome'];
					$usuario = $_POST['usuario'];
					$email = $_POST['email'];
					$confirmEmail = $_POST['confirmEmail'];
					$senha = $_POST['senha'];
					$confirmSenha = $_POST['confirmSenha'];

					$ok = $this->verificarDados($nome,$usuario,$email,$confirmEmail,$senha,$confirmSenha, $newsletter);

					if($ok){
						if(!$this->size($nome)){
							echo "<script>alert('Seu nome deve conter de 4 a 12 caracteres!');</script>";
							return;
						}
						if(!$this->size($usuario)){
							echo "<script>alert('Seu usuário deve conter de 4 a 12 caracteres!');</script>";
							return;
						}
						if(!$this->size($email)){
							echo "<script>alert('Seu email deve conter de 4 a 12 caracteres!');</script>";
							return;
						}
						if(!$this->size($senha)){
							echo "<script>alert('Sua senha deve conter de 4 a 12 caracteres!');</script>";
							return;
						}
						if(!MyError::validaEmail($email)){
							echo "<script>alert('Seu email não é válido!');</script>";
							return;
						}

						$ok = $this->formularios($ok,$usuario,$email,$confirmEmail,$senha,$confirmSenha);
						if($ok){
							$termos = "sim";
							if(UserDAO::cadastrarUsuario($nome, $usuario, $email, $senha, $newsletter, $termos)){
								echo "<script>alert('Cadastro efetuado com sucesso! Bem vindo ao Mundo Aventurado!');</script>";
							}
							else
								echo "<script>alert('Ocorreu um erro!');</script>";
						}
					}
				}
				
			}
	    }

	    private function size($info){
	    	if(strpos($info,"@")){
	    		if(strlen($info) < 4 || strlen($info) > 30)
	    			return false;
	    	}
	    	else{
	    		if(strlen($info) < 4 || strlen($info) > 12 ){
	    			return false;
	    		}
	    	}
	    	return true;
	    }

	    private function formularios($ok, $usuario, $email, $confirmEmail, $senha, $confirmSenha){
	    	if(UserDAO::usuarioIgual($usuario)){
				echo "<script>alert('Esse usuário já foi cadastrado por outra pessoa!');</script>";
				$ok = False;
				return $ok;
			}
			if(UserDAO::emailIgual($email)){
				echo "<script>alert('Esse e-mail já está sendo utilizado!')</script>";
				$ok = False;
				return $ok;
			}
			if(strcmp($email, $confirmEmail)){
				echo "<script>alert('Os e-mails digitados não são iguais!')</script>";
				$ok = False;
				return $ok;
			}
			if(strcmp($senha, $confirmSenha)){
				echo "<script>alert('As senhas digitadas não são iguais!')</script>";
				$ok = False;
				return $ok;
			}
			return $ok;
	    }

	    private function verificarDados($nome,$usuario,$email,$confirmEmail,$senha,$confirmSenha,$newsletter){
	    	if(MyError::dadosIncorretos($nome)){
	    		return false;
	    	}
	    	if(MyError::dadosIncorretos($usuario)){
	    		return false;
	    	}
	    	if(MyError::dadosIncorretos($email)){
	    		return false;
	    	}
	    	if(MyError::dadosIncorretos($confirmEmail)){
	    		return false;
	    	}
	    	if(MyError::dadosIncorretos($senha)){
	    		return false;
	    	}
	    	if(MyError::dadosIncorretos($confirmSenha)){
	    		return false;
	    	}
	    	if(MyError::dadosIncorretos($newsletter)){
	    		return false;
	    	}
	    	return true;
	    }
	}
?>
