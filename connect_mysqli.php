<?php
	// error_reporting(0); //hide error
	$con = mysqli_connect("localhost","root","","user_data");
	if (mysqli_connect_errno())
	{
		// echo '<span class = "rainbow-text">',"failed to connect to MySQL : ",mysqli_connect_error(),'</span>';
	}
	else
	{
		// echo '<span class = "rainbow-text">connected to MySQL</span>';
	}
?>