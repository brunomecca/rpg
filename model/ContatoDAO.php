<?php
	class ContatoDAO{
		public static function cadastrar($nome, $email, $conteudo){
			require "connect.php";

			if(isset($_SESSION['usuario'])){
				$usuario = $_SESSION['id'];
			}
			else{
				$usuario = 0;
			}

			$consulta = mysqli_query($link,"INSERT INTO main_contato (nome, email, mensagem, usuario) VALUES ('$nome','$email','$conteudo','$usuario')");

			return $consulta;
		}
	}
?>