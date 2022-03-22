<?php
	require_once 'cookie_and_session.php';
	$time = date("d/m/Y H:i:s",strtotime('+7 hours, +543 year, -1 second'));
	$query = mysqli_query($con, "UPDATE user_info SET time = '$time' WHERE username = '$username' and password = '$password'");
	//return username password time
?>