<?php
	class MyError{
		public static function dadosIncorretos($content){
			if(preg_match('/[\'^£&*()}{#><>,|=_+¬-]/', $content)){
				return true;
			}
			if(strlen($content) == 0){
				return true;
			}
			return false;
		}

		public static function validaEmail($email){
			$conta = '/^[a-zA-Z0-9\._-]+?@';
			$domino = '[a-zA-Z0-9_-]+?\.';	
			$gTLD = '[a-zA-Z]{2,6}'; //.com; .coop; .gov; .museum; etc.	
			$ccTLD = '((\.[a-zA-Z]{2,4}){0,1})$/'; //.br; .us; .scot; etc.
			$pattern = $conta.$domino.$gTLD.$ccTLD;
			
			if (preg_match($pattern, $email))
				return true;	
			else
				return false;

	    }
	}	
?>