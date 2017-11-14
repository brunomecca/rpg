<?php

	function getElemento($id){
		if($id == 0)
			return "Neutro";
		if($id == 1)
			return "Água";
		if($id == 2)
			return "Fogo";
		if($id == 3)
			return "Terra";
		if($id == 4)
			return "Raio";
		if($id == 5)
			return "Luz";
		if($id == 6)
			return "Trevas";
		if($id == 7)
			return "Natureza";
		if($id == 8)
			return "Veneno";

	}

	function getAura($id){
		return ItemDAO::getAuraName($id);
	}
	$valor = $_POST["valor"];

	$id = filter_var($valor, FILTER_SANITIZE_NUMBER_INT); 

	require "../model/ItemDAO.php";
	$info = "";
	$item = ItemDAO::getItem($id);


	echo '<div class="btnEquiparItemArmazem">';
	echo '<button class="btnEquip" id="item'. $id . 'btn">';
	echo 'Equipar';
	echo '</button>';
	if($item->tipo == 1){
		echo '<button class="btnEquip" id="item'. $id . 'btn2">';
		echo 'Equipar Segunda Mão';
		echo '</button>';
	}
	echo '</div>';
	echo '<div class="infosAboutItemArmazem">';
				
	if($item->tipo == 1){
			echo "Arma";
			$info = '<div class="descriptionInfosAboutItemArmazem">
			 <strong>Ataque</strong>: ' . $item->ataque. '
			 </div>';
	}
	else if($item->tipo == 2){
			echo "Armadura";
			$info = '<div class="descriptionInfosAboutItemArmazem">
			<strong>Defesa</strong>: ' .$item->defesa . '
			</div>';
	}
	else if($item->tipo == 3){
			echo "Utensílio";
			$info = '<div class="descriptionInfosAboutItemArmazem">
			<strong>Aura</strong>: ' .getAura($item->aura) . '
			</div>';
	}
	else if($item->tipo == 4){
			echo "Aura";
			$info = '<div class="descriptionInfosAboutItemArmazem">
			<strong>Inspirador</strong>: ' .$item->inspirador .'<br>
			<strong>Att Inspirador:</strong>: '. $item->attInspirador .'
			</div>';
	}

			echo '<div class="nameInfosAboutItemArmazem">';
			echo '<strong>Nome</strong>: ' . $item->nome;
			echo '</div>';
			echo $info;
			echo '<div class="raridadeInfosAboutItemArmazem">';
			echo '<strong>Raridade</strong>: ' .$item->raridade;
			echo '</div>';
			echo '<div class="elementoInfosAboutItemArmazem">';
			echo '<strong>Elemento</strong>: ' . getElemento($item->elemento);
			echo '</div>';
			echo '<div class="adicaoElementoInfosAboutItemArmazem">';
			echo "<strong>Adição ao elemento</strong>: " . $item->attElemento;
			echo '</div>';
		echo '</div>';
?>
