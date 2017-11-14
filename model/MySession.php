<?php
	class MySession{
		public static function logout(){
			unset($_SESSION["usuario"]);
			unset($_SESSION["id"]);
			
			
		}

		public static function naoLogado(){
			return !isset($_SESSION["usuario"]);
		}

		public static function getUser(){
			if(isset($_SESSION["usuario"]))
				return $_SESSION["usuario"];
			else
				return false;
		}

		public static function getId(){
			if(isset($_SESSION["id"]))
				return $_SESSION["id"];
			else
				return false;
		}

		public static function setUser($usuario){
			$_SESSION["usuario"] = $usuario;
		}
		public static function setId($id){
			$_SESSION["id"] = $id;
		}
	}
?>