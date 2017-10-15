<?php
	class ContatoController{
		public function init() {
	        $this->home(); 
	    }

		public function home(){
			require "view/contato.php";

			HomeController::login(); //essa linha é para ser possível o login na página de contato

            if(isset($_POST['acao']) && $_POST['acao'] == 'contato'){
            	if(MyError::dadosIncorretos($_POST["conteudo"]) ||
            		MyError::dadosIncorretos($_POST["email"]) ||
            		MyError::dadosIncorretos($_POST["nome"])){
					
					echo "<script>alert('Informações incorretas!');</script>";
					return;
				}

				if(!MyError::validaEmail($_POST['email'])){
					echo "<script>alert('E-mail não é válido!');</script>";
					return;
				}

				if(ContatoDAO::cadastrar($_POST['nome'], $_POST['email'], $_POST['conteudo'])){
					echo "<script>alert('Enviado com sucesso!')</script>";
            	}
            	else{
            		echo "<script>alert('Algo deu errado!')</script>";
            	}

			}
		}
	}
?>