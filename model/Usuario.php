<?php
	class Usuario{

		public $nome, $foto, $id;

		function __construct($nome, $foto) {	
			$this->nome = $nome;
			$this->foto = "game/profilePics/" . $foto;	
			$this->id = UserDAO::getUserId();	
		}

	}
?>