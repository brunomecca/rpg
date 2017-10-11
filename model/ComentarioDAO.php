<?php
	class ComentarioDAO{
		public static function postarComentario($usuario, $conteudo){
			require "connect.php";

			$idPost = PostDAO::postInTheMoment();

			if($idPost == -1)
				return False;

			$usuarioNome = $usuario->nome;
			$data = strftime('%d de %B de %Y', strtotime('today'));
			$foto = $usuario->foto;
			$usuarioId = $usuario->id;
			$consulta = mysqli_query($link, "INSERT INTO main_comentarios (id_post, usuario, comentario, data, status) VALUES ('$idPost', '$usuarioId', '$conteudo', '$data', 'nao')");
			
			//return boolean
			return $consulta;
		}
	}
?>