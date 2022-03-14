<?php
	session_start();
	$name_save = "perdpro";
	if(isset($_COOKIE[$name_save]) or isset($_SESSION[$name_save])) {
		if(isset($_COOKIE[$name_save])) {
			$array_str = $_COOKIE[$name_save];
			$array = explode(" ",$array_str);
			
			$username = $array[0];
			$password = $array[1];
			
			$query = mysqli_query($con, "SELECT * FROM user_info WHERE  username = '$username' and password = '$password'");
			$num_row = mysqli_num_rows($query);
			if ($num_row > 0) {
				setcookie($name_save, $array_str, time() + (60 * 15));
				$_SESSION[$name_save] = $array_str;
			}else {
				setcookie($name_save, $array_str, time() - (60 * 15));
				unset($_SESSION[$name_save]);
				header("Location: login");
				exit();
			}
		}else {
			$array_str = $_SESSION[$name_save];
			$array = explode(" ",$array_str);
			
			$username = $array[0];
			$password = $array[1];
			
			$query = mysqli_query($con, "SELECT * FROM user_info WHERE  username = '$username' and password = '$password'");
			$num_row = mysqli_num_rows($query);
			if ($num_row > 0) {
				$_SESSION[$name_save] = $array_str;
			}else {
				unset($_SESSION[$name_save]);
				header("Location: login");
				exit();
			}
		}
	}else {
		header("Location: login");
		exit();
	}
?>