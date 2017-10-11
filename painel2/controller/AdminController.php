<?php
	class AdminController{

		public function init() {

			$this->admin();
	    }

	    public function admin(){
	    	require_once "date.php";
	    	require "view/adminMenu.php";

	    	
	    }

	}

?>