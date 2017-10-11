<?php
	class PostDAO{
		public static function pegarIdNovoPost() {
			require "../connect.php";
			$cons = mysqli_query($link,"SELECT MAX(id) FROM main_postagens");
			$row = mysqli_fetch_array($cons);
			
			foreach($row as $a)
				return $a + 1;	

		}

		public static function newPost($titulo, $categoria, $data, $conteudo, $visitas, $nomeImg){
			require "../connect.php";
			$cons = mysqli_query($link, "INSERT INTO main_postagens (titulo, categoria, data, conteudo, views, foto) VALUES ('$titulo', '$categoria', '$data', '$conteudo', '$visitas', '$nomeImg')");
			if($cons == True)
				return True;
			else
				return False;
		}

	}
?>