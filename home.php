<?php
require_once 'connect_mysql.php';
require_once 'cookie_and_session.php';
?>

<html>
	<head>
		<link rel = "stylesheet" href = "no.css">
		<link rel = "icon" href = "source/logo_perdpro.png">
		<title>PerdPro</title>
	</head>
	<body class = "body_matrix">
		<form method = "post">
		</form>
		<div class = "setting top right input_rainbow">
			<div class = "profile top right">
				<div>
					<img class = "picture input_rainbow right" src = "source/icon_account.png" onclick = "location = 'home'"/>
					<span class = "username input_rainbow right"><?php echo $username; ?></span>
				</div>
			</div>
			<div class = "dropdown right input_rainbow">
				<ul class = "menu top right">
					<li class = "input_rainbow" id = "menu_1">Account
						<ul class = "dropdown">
							<li class = "input_rainbow" id = "_menu_1">Logout</li>
							<li class = "input_rainbow" id = "_menu_2">Home</li>
						</ul>
					</li>
					<li class = "input_rainbow" id = "menu_2">Setting
						<ul>
							<li class = "input_rainbow" id = "_menu_2">Logout</li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
		<?php
			if (isset($_POST['logout'])) {
				setcookie($name_save, "", time() - (60 * 15));
				unset($_SESSION[$name_save]);
				header("Location: login");
				exit();
			}
		?>
	</body>
</html>