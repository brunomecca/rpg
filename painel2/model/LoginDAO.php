<?php
	class LoginDAO{
		public static function login($user, $pass) {
	        require "../connect.php";

	        //verificando por caracteres especiais
	        if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $user)){
				return false;
			}
			if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $pass)){
				return false;
			}

			//consulta
	        $cons = mysqli_query($link,"SELECT * FROM admin_usuarios WHERE nome = '$user' AND senha = '$pass'");
	    	
	    	$rowCount = mysqli_num_rows($cons);
	    	if($rowCount == 1){
	    		return true;
	    	}

	    	return false;
	    }
	}

?>