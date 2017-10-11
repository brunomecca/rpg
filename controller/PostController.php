<?php
	class PostController{
		public function init(){
			$id = $_GET['single'];
			$this->singlePost($id);

		}

		public function singlePost($id){
			$post = PostDAO::singlePost($id);
			$comentarios = PostDAO::retriveComments($id);
			
			$usuario = UserDAO::getCurrentUser();

			if(get_class($usuario) != "Usuario"){
				MySession::logout();
			}


			require "view/single.php";

			//fazer o envio para bd
			if(isset($_POST["acao"]) && $_POST["acao"] == "comentar"){

				if(MyError::dadosIncorretos($_POST["conteudo"])){
					//dados incorretos
				}

				$comentario = new Comentario($usuario, $_POST["conteudo"]);
				if($comentario->postarComentario())
					echo "<script>alert('Enviado!')</script>";
				else
					echo "<script>alert('Algo deu errado!')</script>";
			}

		}

		//nao funciona por causa do header definido em index.php
		//é necessário informar um header diferente
		private function captcha(){
			$imagem = imagecreate(170,80); // define a largura e a altura da imagem
	        $fonte = "fonts/arial.ttf"; //voce deve ter essa ou outra fonte de sua preferencia em sua pasta
	        $preto  = imagecolorallocate($imagem,0,0,0); // define a cor preta
	        $branco = imagecolorallocate($imagem,255,255,255); // define a cor branca
	        
	        // define a palavra conforme a quantidade de letras definidas no parametro $quantidade_letras
	        $palavra = substr(str_shuffle("AaBbCcDdEeFfGgHhIiJjKkLlMmNnPpQqRrSsTtUuVvYyXxWwZz23456789"),0,(5)); 
	        $_SESSION["palavra"] = $palavra; // atribui para a sessao a palavra gerada
	        for($i = 1; $i <= 5; $i++){ 
	            imagettftext($imagem,10,rand(-25,25),(10*$i),(10 + 10),$branco,$fonte,substr($palavra,($i-1),1)); // atribui as letras a imagem
	        }
	        imagejpeg($imagem); // gera a imagem
	        imagedestroy($imagem); // limpa a imagem da memoria

		}
	}
?>