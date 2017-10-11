<?php
	class Comentario{

		public $usuario, $conteudo;

		function __construct($usuario, $conteudo){
			$this->usuario = $usuario;
			$this->conteudo = $conteudo;
		}

		public function postarComentario(){
			return ComentarioDAO::postarComentario($this->usuario, $this->conteudo);
		}

	}
?>	