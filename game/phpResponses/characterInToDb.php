<?php
	session_start();
	$id = $_SESSION["id"];

	$nome = $_POST["nome"];
	$classe = $_POST["classe"];
	$fac = $_POST["fac"];

	if(!dadosIncorretos($nome)){
		if(empty($classe)){
			echo "Selecione uma classe!";
		}
		else if(empty($fac)){
			echo "Selecione uma facção!";
		}
		else{
			require "../../connect.php";
			if($fac == 2)
				$fac = 0;
			if($classe == 1){
				//heroi
				$forca = 12;
				$iniciativa = 4;
				$vigor = 10;
				$vitalidade = 8;
			}
			else if($classe = 2){
				//ladino
				$forca = 4;
				$iniciativa = 12;
				$vigor = 8;
				$vitalidade = 10;
			}
			$vidaMaxima = $vitalidade *10;
			$cons = mysqli_query($link,"INSERT INTO game_personagem (nome, classe, tabelaAtributo, tabelaElemento, bau, usuarioOwner, nivel, aura, primeiraMao, segundaMao, armadura, utensilio, faccao, vida, xp, vidaMaxima, xpProximoNv) VALUES ('$nome','$classe',0,0,0,'$id',1,0,0,0,0,0,'$fac','$vidaMaxima',0,'$vidaMaxima',120)");
			$consIdPersonagem = mysqli_query($link,"SELECT id FROM game_personagem WHERE nome = '$nome'");
			$idPersonagem = "";
			foreach($consIdPersonagem as $c){
				$idPersonagem = $c["id"];
			}
			$consAtt = mysqli_query($link,"INSERT INTO game_tabelaatributo (game_personagem, forca, iniciativa, vigor, vitalidade, pontosDeRank) VALUES ('$idPersonagem','$forca','$iniciativa','$vigor','$vitalidade',0)");
			$consElement = mysqli_query($link,"INSERT INTO game_tabelaelemento (game_personagem) VALUES ('$idPersonagem')");
			
			$consAttId = mysqli_query($link, "SELECT id FROM game_tabelaatributo WHERE game_personagem = '$idPersonagem'");
			$attIdToUpdate = "";
			foreach($consAttId as $c){
				$attIdToUpdate = $c["id"];
			}
			$consUpdateIdAtt = mysqli_query($link, "UPDATE game_personagem SET tabelaAtributo = '$attIdToUpdate' WHERE id = '$idPersonagem'");
			
			$consElementId = mysqli_query($link, "SELECT id FROM game_tabelaelemento WHERE game_personagem = '$idPersonagem' ");
			foreach($consElementId as $c){
				$attIdToUpdate = $c["id"];
			}
			$consUpdateIdAtt = mysqli_query($link, "UPDATE game_personagem SET tabelaElemento = '$attIdToUpdate' WHERE id = '$idPersonagem'");
			
			$consInsertItem = mysqli_query($link,"INSERT INTO game_bau (game_personagem, item, tipoItem) VALUES ('$idPersonagem', 3, 1)");
			$consInsertItem = mysqli_query($link,"INSERT INTO game_bau (game_personagem, item, tipoItem) VALUES ('$idPersonagem', 4, 2)");
			echo "Criado com sucesso!";
			
			mysqli_query($link,"UPDATE game_personagem SET ataque = $forca * 2 WHERE id = '$idPersonagem'");
			mysqli_query($link,"UPDATE game_personagem SET iniciativa = $iniciativa * 0.5 WHERE id = '$idPersonagem'");
			mysqli_query($link,"UPDATE game_personagem SET ataqueFull = ataque WHERE id = '$idPersonagem'");
			mysqli_query($link,"UPDATE game_personagem SET iniciativaFull = iniciativa WHERE id = '$idPersonagem'");
		}
	}
	else{
		echo "Nome incorreto, muito grande (até 10 caracteres) ou em uso!";
	}

	function dadosIncorretos($content){
		if(preg_match('/[\'^£&*()}{#><>,|=_+¬-]/', $content)){
			return true;
		}
		if(strlen($content) == 0){
			return true;
		}
		if(strlen($content) > 10){
			return true;
		}
		require "../../connect.php";
		$cons = mysqli_query($link,"SELECT nome FROM game_personagem WHERE nome = '$content'");
		//se achou uma tupla, então retorna true
		foreach($cons as $c){
			return true;
		}
		return false;
	}

?>
