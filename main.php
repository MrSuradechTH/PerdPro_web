<?php
session_start();
require_once 'connect_mysql.php';
?>
<html>
	<head>
		<link rel = "stylesheet"  href = "styles.css">
		<link rel = "icon" href = "source/logo_perdpro.png">
		<title>PerdPro</title>
		<?php
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
						$url = '3;url=home';
					}else {
						setcookie($name_save, $array_str, time() - (60 * 15));
						unset($_SESSION[$name_save]);
						$url = '3;url=login';
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
						$url = '3;url=home';
					}else {
						unset($_SESSION[$name_save]);
						$url = '3;url=login';
					}
				}
			}else {
				$url = '3;url=login';
			}
		?>
		<meta http-equiv="refresh" content="<?php echo $url; ?>"/>
	</head>
	<body class = "body_matrix">
		<center>
			<div>
				<br></br>
				<br></br>
				<br></br>
				<img class = "image_rainbow" src = "source/logo_perdpro.png" width = "200" height = "200" onclick = "location = 'login'"/>
			</div>
		</center>
	</body>
</html>