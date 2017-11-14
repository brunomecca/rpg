<?php
	class Aura extends Item{
		public $inspirador, $attInspirador;

		function __construct($item){
			$this->id = $item['id'];
			$this->nome = $item['nome'];
			$this->raridade = $item['raridade'];
			$this->arte = $item['arte'];
			$this->elemento = $item['elemento'];
			$this->attElemento = $item['attElemento'];
			$this->tipo = $item['tipo'];
			$this->inspirador = $item['inspirador'];
			$this->attInspirador = $item['attInspirador'];
		}
	}
?>