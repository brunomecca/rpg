<?php
	class Armadura extends Item{
		public $defesa;

		function __construct($item){
			$this->id = $item['id'];
			$this->nome = $item['nome'];
			$this->raridade = $item['raridade'];
			$this->arte = $item['arte'];
			$this->elemento = $item['elemento'];
			$this->attElemento = $item['attElemento'];
			$this->tipo = $item['tipo'];
			$this->defesa = $item['defesa'];
		}
	}
?>