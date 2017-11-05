<?php
	class PersonagemDAO{

		public static function createPersonagem($idUsuario){
			require "../../connect.php";

			$consulta = mysqli_query($link, "SELECT * FROM game_personagem WHERE usuarioOwner = '$idUsuario'");
			$personagens = array();
			foreach($consulta as $cons){
				$personagem = new Personagem();
				$personagem->nome = $cons["nome"];
				$personagem->classe = PersonagemDAO::getClass($cons["classe"]);
				$personagem->tabelaAtributo = $cons["tabelaAtributo"];
				$personagem->tabelaElemento = $cons["tabelaElemento"];
				$personagem->nivel = $cons["nivel"];
				$personagem->aura = ItemDAO::getItem($cons["aura"]);
				$personagem->primeiraMao = ItemDAO::getItem($cons["primeiraMao"]);
				$personagem->segundaMao = ItemDAO::getItem($cons["segundaMao"]);
				$personagem->armadura = ItemDAO::getItem($cons["armadura"]);
				$personagem->utensilio = ItemDAO::getItem($cons["utensilio"]);
				$personagem->bau = $cons["bau"];
				$personagem->faccao = $cons["faccao"];
				$personagem->vida = $cons["vida"];
				$personagem->vidaMaxima = $cons["vidaMaxima"];
				$personagem->xp = $cons["xp"];
				$personagem->xpMaximo = $cons["xpProximoNv"];
				$personagens[] = $personagem;
			}

			return $personagens;
		}

		public static function getClass($idClass){
			if($idClass == 1){
				return "Herói";
			}
			if($idClass == 2){
				return "Ladino";
			}
		}

	}
?>