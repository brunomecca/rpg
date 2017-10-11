<?php
	class HomeController{
		public function init() {
	        $this->login(); 
	    }

	    public function login(){
	    	require "view/login.php";
			
			if(isset($_POST["logar"])){
				$username = $_POST["username"];
				$pass = $_POST["pass"];

				if(LoginDAO::login($username, $pass)){
					$_SESSION["usuario"] = $username;
					$_SESSION["adm"] = 1;
					header("Location: index.php");
				}
				else{
					echo "<script>alert('Informações incorretas!');</script>";
				}

			}

	    }

	}

?>