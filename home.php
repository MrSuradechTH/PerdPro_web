<?php
	require_once 'time_stamp.php';
?>

<html>
	<head>
		<link rel = "stylesheet" href = "styles.css?v = <?php echo time(); ?>"/>
		<link rel = "icon" href = "source/logo_perdpro.png">
		<title>PerdPro</title>
	</head>
	<body class = "body_matrix">
		<form method = "post">
			<div class = "setting top right">
				<div class = "profile input_rainbow top right pointer">
					<?php
						$query = mysqli_query($con, "SELECT image FROM user_info WHERE username = '$username' and password = '$password'");
						$result = mysqli_fetch_array($query);
						$image = $result[0];
					?>
					<img class = "picture input_rainbow right" src = "<?php echo $image; ?>" onclick = "location = 'home'"><a href = ""></a></img>
					<span class = "username text_rainbow right"><a href = ""><?php echo $username; ?></a></span>
					<ul class = "input_rainbow top right" id = "menu">
						<li class = "text_rainbow" id = "menu_1"><a href = "">Account</a>
							<ul class = "input_rainbow" id = "+menu">
								<li class = "text_rainbow" id = "_menu_1"><a href = "profile">ViewProfile</a></li>
							</ul>
						</li>
						<li class = "text_rainbow" id = "menu_2"><a href = "">Setting</a>
							<ul class = "input_rainbow" id = "+menu">
								<li class = "text_rainbow" id = "_menu_1"><a href = "">Contact</a></li>
								<li class = "text_rainbow" id = "_menu_2" ><a href = "logout">Logout</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</form>
	</body>
</html>