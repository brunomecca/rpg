<?php
	class MyError{
		public static function dadosIncorretos($content){
			if(preg_match('/[\'^£$%&*()}{#~?><>,|=_+¬-]/', $content)){
				return true;
			}
			return false;
		}
	}	
?>