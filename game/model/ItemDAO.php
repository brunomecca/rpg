<?php

	class ItemDAO{
		public static function getItem($id){
			require "../../connect.php";

			$consulta = mysqli_query($link, "SELECT * FROM game_item WHERE id = '$id'");

			foreach($consulta as $cons){
				$tabelaItem = $cons['tabelaItemReal'];
				$idItem = $cons['idEmTabelaReal'];
				$consulta2 = mysqli_query($link, "SELECT * FROM '$tabelaItem' WHERE id = '$idItem'");				
				//pega um id de item, acha na tabela real do item e constrói o item para retornar
				foreach($consulta2 as $item){
					
				}
			}

		}
	}

?>