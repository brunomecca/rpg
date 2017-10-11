<?php
	class PageController{

		public $page = "";

		function __construct($info) {	
			$this->page = $info;		
		}

		function init(){
			date_default_timezone_set('America/Sao_Paulo');
			$dia = date("d");
			$mes = date("m");
			$ano = date("Y");
			$hora = date("h");
			$min = date("i");

			require "view/adminMenu.php";

			if($this->page == "contato")
				$this->contato();
			else if($this->page == "noticia")
				$this->noticia($dia, $mes, $ano);
			else if($this->page == "comentario")
				$this->comentario();
			else if($this->page == "config")
				$this->config();
			else if($this->page == "sair")
				$this->sair();

		}

		function contato(){
			
		}

		function noticia($dia, $mes, $ano){
			require "view/admin/novaNoticia.php";

			if(isset($_POST["acao"]) && $_POST["acao"] == "cadastrar"){
				$titulo = ucfirst(trim($_POST["titulo"]));
				$categoria = ucfirst(trim($_POST["categoria"]));
				$data = ucfirst(trim($_POST["data"]));
				$conteudo = trim($_POST["conteudo"]);
				$visitas = 0;

				$pasta = "imagens-posts";
				$permite = array("image/jpg","image/jpeg","image/pjpeg");

				$imagem = $_FILES["imagem"];
				$destino = $imagem["tmp_name"];
				// gera nome aleatorio - $nome = substr(str_shuffle("AaBbCcDdEeFfGgHhIiJjKkLlMmNnPpQqRrSsTtUuVvYyXxWwZz23456789"),0,20);
				$nomeImg = PostDAO::pegarIdNovoPost(); //desse jeito img vai ter o nome do id do post
				$nomeImg = $nomeImg . ".jpg";
				$tipo = $imagem["type"];
				
				if(empty($titulo) || empty($categoria) || empty($data)){
					echo '<script>alert("Preencha todos os campos");</script>';
				}
				else{
					if(!empty($nomeImg) && in_array($tipo, $permite)){
					$this->upload($destino, $nomeImg, 600, $pasta);

					$result = PostDAO::newPost($titulo, $categoria, $data, $conteudo, $visitas, $nomeImg);
					
					if($result)
						echo '<script>alert("Enviado com sucesso!");</script>';
					else
						echo '<script>alert("Alguma coisa deu errado!");</script>';
					}
				}
			}
		}

		function comentario(){
			
		}

		function config(){
			
		}

		function sair(){
			echo "<script>alert('Informações incorretas!');</script>";
			echo "porra";
			unset($_SESSION["usuario"]);
			unset($_SESSION["login"]);
			unset($_SESSION["adm"]);
			session_destroy();
			header("Location: index.php");
		}

		function upload($destino, $nome, $largura, $pasta){
			$img = imagecreatefromjpeg($destino);
			$x = imagesx($img);
			$y = imagesy($img);
			$altura = ($largura * $y) / $x;
			
			$novaImagem = imagecreatetruecolor($largura, $altura);
			imagecopyresampled($novaImagem, $img, 0, 0, 0, 0, $largura, $altura, $x, $y);
			imagejpeg($novaImagem, $pasta."/".$nome);
			
			imagedestroy($img);
			imagedestroy($novaImagem);
		}

	}

?>