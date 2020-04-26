<?php
	
	session_start();

	function logged_in(){
		return isset($_SESSION['staff_id']);
	}
	
	function confirm_logged_in(){
		if (!logged_in()) {

			header("location:stafflogin.php");
		}
	}

?>