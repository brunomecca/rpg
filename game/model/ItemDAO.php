<?php
	require "../model/Item.php";
	require "../model/Arma.php";
	require "../model/Armadura.php";
	require "../model/Aura.php";
	require "../model/Utensilio.php";
	class ItemDAO{

		public static function itemDoPersonagem($idItem, $idPersonagem){
			require "../../connect.php";

			$consulta = mysqli_query($link, "SELECT * FROM game_bau WHERE item = '$idItem' AND game_personagem = '$idPersonagem'");
			foreach($consulta as $c){
				return true;
			}
			return false;
		}

		public static function getAuraName($id){
			require "../../connect.php";
			if($id == 0){
				return "Sem aura";
			}
			$consulta = mysqli_query($link, "SELECT nome FROM game_aura WHERE id = '$id'");
			foreach($consulta as $c){
				return $c["nome"];
			}
		}
		public static function getItem($id){
			if($id == 0)
				return new Item();
			require "../../connect.php";

			$consulta = mysqli_query($link, "SELECT * FROM game_item WHERE id = '$id'");

			foreach($consulta as $cons){
				$tabelaItem = $cons['tabelaItemReal'];
				$idItem = $cons['idEmTabelaReal'];
				$consultaItem = mysqli_query($link, "SELECT * FROM $tabelaItem WHERE id = '$idItem'");				
				//pega um id de item, acha na tabela real do item e constrói o item para retornar
				foreach($consultaItem as $item){
					if($item['tipo'] == 1){ //arma
						$realItem = new Arma($item);
						return $realItem;
					}
					else if($item['tipo'] == 2){ //armadura
						$realItem = new Armadura($item);
						return $realItem;
					}
					else if($item['tipo'] == 3){ //utensílio
						$realItem = new Utensilio($item);
						return $realItem;
					}
					else if($item['tipo'] == 4){ //aura
						$realItem = new Aura($item);
						return $realItem;
					}
				}
			}

		}
	}

?>