<?php
	class ContatoController{
		public function init() {
	        $this->home(); 
	    }

		public function home(){
			require "view/contato.php";

            if(isset($_POST['acao']) && $_POST['acao'] == 'contato'){
            	if(MyError::dadosIncorretos($_POST["conteudo"]) ||
            		MyError::dadosIncorretos($_POST["email"]) ||
            		MyError::dadosIncorretos($_POST["nome"])){
					
					echo "<script>alert('Informações incorretas!');</script>";
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