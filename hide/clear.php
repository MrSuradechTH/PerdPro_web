<?php
	session_start();
	$name_save = "perdpro";
	setcookie("perdpro", null, -1, '/');
	unset($_SESSION[$name_save]);
?>