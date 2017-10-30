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
				$personagem->espada = $cons["espada"];
				$personagem->escudo = $cons["escudo"];
				$personagem->armadura = $cons["armadura"];
				$personagem->anel = $cons["anel"];
				$personagens[] = $personagem;
			}

			return $personagens;
		}

	}
?>