<?php
	class PersonagemDAO{

		public static function createPersonagem($idUsuario){
			require "../../connect.php";

			$consulta = mysqli_query($link, "SELECT * FROM game_personagem WHERE usuarioOwner = '$idUsuario'");
			$personagens = array();
			foreach($consulta as $cons){
				$personagem = new Personagem();
				$personagem->nome = $cons["nome"];
				$personagem->classe = $cons["classe"];
				$personagem->tabelaAtributo = $cons["tabelaAtributo"];
				$personagem->tabelaElemento = $cons["tabelaElemento"];
				$personagem->nivel = $cons["nivel"];
				$personagem->aura = $cons["aura"];
				$personagem->primeiraMao = $cons["primeiraMao"];
				$personagem->segundaMao = $cons["segundaMao"];
				$personagem->armadura = $cons["armadura"];
				$personagem->anel = $cons["anel"];
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

	}
?>