<?php
	class UserDAO{

		public static function getCurrentUser(){
			require "connect.php";
			if(MySession::naoLogado())
				return new MyError();
			
			$usuario = $_SESSION["usuario"];

			$consulta = mysqli_query($link,"SELECT * FROM game_usuarios WHERE usuario = '$usuario'");

			foreach($consulta as $result){
				$user = new Usuario($result["usuario"],$result["foto"]);
				return $user;
			}

			return new MyError();

		}

		public static function getUserId(){
			require "connect.php";

			$usuarioName = MySession::getUser();

			$consulta = mysqli_query($link,"SELECT * FROM game_usuarios WHERE usuario = '$usuarioName'");

			foreach($consulta as $user){
				return $user["id"];
			}

			return new MyError();
		}

		public static function getUser($id){
			require "connect.php";

			$consulta = mysqli_query($link,"SELECT * FROM game_usuarios WHERE id = '$id'");
			
			foreach($consulta as $result){
				$user = new Usuario($result["usuario"],$result["foto"]);
				return $user;
			}
		}

		public static function usuarioIgual($usuario){
			require "connect.php";

			$consulta = mysqli_query($link, "SELECT usuario FROM game_usuarios WHERE usuario = '$usuario'");

			foreach($consulta as $cons){
				if(!strcmp($cons['usuario'], $usuario))
					return true;
			}
			return false;

		}

		public static function emailIgual($email){
			require "connect.php";

			$consulta = mysqli_query($link, "SELECT email FROM game_usuarios WHERE email = '$email'");

			foreach($consulta as $cons){
				if(!strcmp($cons['email'], $email))
					return true;
			}
			return false;

		}

		public static function cadastrarUsuario($nome, $usuario, $email, $senha, $newsletter, $termos){
			require "connect.php";
			$foto = "pic1.jpg";
			$consulta = mysqli_query($link, "INSERT INTO game_usuarios (usuario, foto, email, newsletter, termos, senha, nome) VALUES ('$usuario','$foto','$email','$newsletter','$termos','$senha','$nome')");
			return $consulta;
		}

		public static function login($login, $senha){
			require "connect.php";

			$consulta = mysqli_query($link, "SELECT * FROM game_usuarios WHERE usuario = '$login'");

			foreach($consulta as $cons){
				if($cons['senha'] == $senha){
					return true;
				}
			}
			return false;
		}
	}
?>