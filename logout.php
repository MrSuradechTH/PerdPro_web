<?php
	session_start();
	$name_save = "perdpro";
	setcookie("perdpro", null, -1, '/');
	unset($_SESSION[$name_save]);
?>
<html>
	<head>
		<link rel = "stylesheet" href = "styles.css?v = <?php echo time(); ?>"/>
		<link rel = "icon" href = "source/logo_perdpro.png">
		<title>PerdPro</title>
	</head>
	<body class = "body_matrix">
		<center>
			<br></br>
			<br></br>
			<br></br>
			<br></br>
			<br></br>
			<span class = "logout text_rainbow">Good Bye</span>
		</center>
	</body>
	<meta http-equiv="refresh" content="3;url=login"/>
</html>