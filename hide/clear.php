<?php
	session_start();
	$name_save = "perdpro";
	setcookie($name_save, "", time() - (60 * 15));
	unset($_SESSION[$name_save]);
	header("Location: login");
	exit();
?>