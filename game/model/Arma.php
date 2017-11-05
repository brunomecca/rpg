<?php
	class Arma extends Item{
		public $ataque;

		function __construct($item){
			$this->id = $item['id'];
			$this->nome = $item['nome'];
			$this->raridade = $item['raridade'];
			$this->arte = $item['arte'];
			$this->elemento = $item['elemento'];
			$this->attElemento = $item['attElemento'];
			$this->tipo = $item['tipo'];
			$this->ataque = $item['ataque'];
		}

	}
?>