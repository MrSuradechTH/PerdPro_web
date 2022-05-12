<?php
	require_once 'time_stamp.php';
?>

<html>
	<head>
		<link rel = "stylesheet" href = "styles.css?v = <?php echo time(); ?>"/>
		<link rel = "stylesheet" href = "styles_home.css?v = <?php echo time(); ?>"/>
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
								<li class = "text_rainbow" id = "_menu_1"><a href = "profile">Profile</a></li>
							</ul>
						</li>
						<li class = "text_rainbow" id = "menu_2"><a href = "">Setting</a>
							<ul class = "input_rainbow" id = "+menu">
								<li class = "text_rainbow" id = "_menu_1"><a href = "contact">Contact</a></li>
								<li class = "text_rainbow" id = "_menu_2" ><a href = "logout">Logout</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
			<script>
				function loadDoc() {
					var xhttp = new XMLHttpRequest();
					xhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
							document.getElementById("api").innerHTML =
							this.responseText;
						}
					};
					xhttp.open("POST", "http://127.0.0.1/api_auto_update.php", true);
					xhttp.send();
				}
				loadDoc();
				var auto_refresh = setInterval(
				function ()
				{
					loadDoc();
				}, 10); // refresh every 10000 milliseconds
			</script>
			<?php
				$query = mysqli_query($con, "SELECT api FROM user_info WHERE username = '$username' and password = '$password'");
				$result = mysqli_fetch_array($query);
				$api_str = $result;
				// echo $api_str[0];
				$api_array_fist = explode("._.".PHP_EOL,$api_str[0]);
				// echo $api_array_fist[0];
				if ($api_array_fist[0] != 0) {
					echo '<div id = "api">';
					echo '</div>';
				}
				
				//ทำปุ่ม config ไปอีกหน้า เพิ่มปุ่มขึ้นลง ซ้ายขวา ด้านข้าง api ด้วย echo
			?>
		</form>
	</body>
</html>