<?php
	class HomeController{
		public function init() {
	        $this->home(); 
	    }

		public function home(){
			$posts = PostDAO::retrievePosts();
			require "view/home.php";
			$this->login();
		}

		public function login(){
			if(isset($_POST['acao']) && $_POST['acao'] == 'logar'){
				$controller = new LoginController();
				$controller->init();
			}
		}
	}
?>