<?php

	class PostDAO{

		public static $maximoPosts = 3;

		public static function retrievePosts(){
			require "connect.php";
			
			$pg = PostDAO::numberPage();

			$maximo = 3; //$maximoPosts

			$inicio = ($pg * $maximo) - $maximo;

			$consulta = mysqli_query($link,"SELECT * FROM main_postagens ORDER BY id DESC LIMIT $inicio, $maximo");
			return $consulta;
		}

		public static function retriveComments($postId){
			require "connect.php";

			if($postId != -1){
				$consulta = mysqli_query($link, "SELECT * FROM main_comentarios WHERE id_post = '$postId' AND status = 'sim'");
				return $consulta;
			}
			else{
				return 0;
			}
		}

		public static function postInTheMoment(){
			if(isset($_GET["single"])){
				$postId = (int)$_GET["single"];
			}else{
				$postId = -1;
			}
			return $postId;
		}

		public static function numberPage(){
			if(isset($_GET["pag"])){
				$pg = (int)$_GET["pag"];
			}else{
				$pg = 1;
			}

			return $pg;
		}

		public static function singlePost($id){
			require "connect.php";

			$consulta = mysqli_query($link, "SELECT * FROM main_postagens WHERE id = '$id'");

			return $consulta;
		}

		public static function numberPosts(){
			require "connect.php";
			$consulta = mysqli_query($link,"SELECT id FROM main_postagens");
			$number = mysqli_num_rows($consulta);
			return $number;
		}

	}

?>