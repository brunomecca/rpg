<?php
	class ConfigDAO{
		public static function manutencao(){
			require "../connect.php";

			$consulta = mysqli_query($link, "SELECT * FROM configs");

			foreach($consulta as $cons){
				if($cons['manutencao'] == 1){
					return true;
				}
				return false;
			}

			return true;
		}

		public static function online(){
			require "../connect.php";

			$consulta = mysqli_query($link, "SELECT * FROM configs");

			foreach($consulta as $cons){
				if($cons['online'] == 1){
					return true;
				}
				return false;
			}
			return false;
		}
	}
?>