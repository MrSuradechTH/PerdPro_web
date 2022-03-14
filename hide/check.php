<?php
	session_start();
	$name_save = "perdpro";
	if(isset($_COOKIE[$name_save])) {
		echo 'cookie';
	}
	
	if(isset($_SESSION[$name_save])) {
		echo 'session';
	}
?>