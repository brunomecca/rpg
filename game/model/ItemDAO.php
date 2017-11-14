<?php

	class ItemDAO{
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