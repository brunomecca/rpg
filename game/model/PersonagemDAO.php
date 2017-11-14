<?php
	class PersonagemDAO{

		public static function createPersonagem($idUsuario){
			require "../../connect.php";

			$consulta = mysqli_query($link, "SELECT * FROM game_personagem WHERE usuarioOwner = '$idUsuario'");
			$personagens = array();
			foreach($consulta as $cons){
				$personagem = new Personagem();
				$personagem->id = $cons["id"];
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

		public static function getArmas($idPersonagem){
			require "../../connect.php";

			$consulta = mysqli_query($link,"SELECT * FROM game_bau WHERE game_personagem = '$idPersonagem' AND tipoItem = 1");
			$armas = array();
			foreach($consulta as $cons){
				$item = $cons["item"];
				$consulta2 = mysqli_query($link,"SELECT * FROM game_item WHERE id = '$item'");
				foreach($consulta2 as $cons2){
					$tabela = $cons2["tabelaItemReal"];
					$idEmTabelaReal = $cons2["idEmTabelaReal"];
					$consulta3Arma = mysqli_query($link, "SELECT * FROM $tabela WHERE id = '$idEmTabelaReal'");
					foreach($consulta3Arma as $arma){
						$armaReal = new Arma($arma);
						$armas[] = $armaReal;
					}
				}
			}
			return $armas;
		}

		public static function getArmaduras($idPersonagem){
			require "../../connect.php";

			$consulta = mysqli_query($link,"SELECT * FROM game_bau WHERE game_personagem = '$idPersonagem' AND tipoItem = 2");
			$armaduras = array();
			foreach($consulta as $cons){
				$item = $cons["item"];
				$consulta2 = mysqli_query($link,"SELECT * FROM game_item WHERE id = '$item'");
				foreach($consulta2 as $cons2){
					$tabela = $cons2["tabelaItemReal"];
					$idEmTabelaReal = $cons2["idEmTabelaReal"];
					$consulta3Arma = mysqli_query($link, "SELECT * FROM $tabela WHERE id = '$idEmTabelaReal'");
					foreach($consulta3Arma as $armadura){
						$armaduraReal = new Armadura($armadura);
						$armaduras[] = $armaduraReal;
					}
				}
			}
			return $armaduras;
		}

		public static function getUtensilios($idPersonagem){
			require "../../connect.php";

			$consulta = mysqli_query($link,"SELECT * FROM game_bau WHERE game_personagem = '$idPersonagem' AND tipoItem = 3");
			$utensilios = array();
			foreach($consulta as $cons){
				$item = $cons["item"];
				$consulta2 = mysqli_query($link,"SELECT * FROM game_item WHERE id = '$item'");
				foreach($consulta2 as $cons2){
					$tabela = $cons2["tabelaItemReal"];
					$idEmTabelaReal = $cons2["idEmTabelaReal"];
					$consulta3utensilio = mysqli_query($link, "SELECT * FROM $tabela WHERE id = '$idEmTabelaReal'");
					foreach($consulta3utensilio as $utensilio){
						$utensilioReal = new Utensilio($utensilio);
						$utensilios[] = $utensilioReal;
					}
				}
			}
			return $utensilios;
		}

		public static function getAuras($idPersonagem){
			require "../../connect.php";

			$consulta = mysqli_query($link,"SELECT * FROM game_bau WHERE game_personagem = '$idPersonagem' AND tipoItem = 4");
			$auras = array();
			foreach($consulta as $cons){
				$item = $cons["item"];
				$consulta2 = mysqli_query($link,"SELECT * FROM game_item WHERE id = '$item'");
				foreach($consulta2 as $cons2){
					$tabela = $cons2["tabelaItemReal"];
					$idEmTabelaReal = $cons2["idEmTabelaReal"];
					$consulta3aura = mysqli_query($link, "SELECT * FROM $tabela WHERE id = '$idEmTabelaReal'");
					foreach($consulta3aura as $aura){
						$auraReal = new Aura($aura);
						$auras[] = $auraReal;
					}
				}
			}
			return $auras;
		}

	}
?>