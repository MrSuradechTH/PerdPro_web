<?php
session_start();
require_once 'connect_mysql.php';
?>
<html>
	<head>
		<link rel = "stylesheet" href = "styles.css">
		<link rel = "icon" href = "source/logo_perdpro.png">
		<title>PerdPro</title>
	</head>
	<body class = "body_matrix">
		<center>
			<div>
				<div>
					<img class = "image_rainbow" src = "source/logo_perdpro.png" width = "200" height = "200" onclick = "location = 'home'"/>
				</div>
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
								header("Location: home");
								exit();
							}else {
								setcookie($name_save, $array_str, time() - (60 * 15));
								unset($_SESSION[$name_save]);
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
								header("Location: home");
								exit();
							}else {
								unset($_SESSION[$name_save]);
							}
						}
					}
					if (isset($_POST['register'])) {
						$username = $_POST['username_input'];
						$password = $_POST['password_input'];
						$gmail = $_POST['gmail_input'];
						if ($username != "" && $password != "" && $gmail != "") {
							$result = mysqli_query($con,"INSERT INTO user_info(username,password,gmail) VALUES('$username','$password','$gmail')");
							$response = array();

							if ($result) {
								header("Location: login");
								exit();
							}else {
								echo '<span class = "text_rainbow">Register Fail!!!</span>';
							}
						}else {
							echo '<span class = "text_rainbow">Has Null Input!!!</span>';
						}
					}else if (isset($_POST['login'])) {
						header("Location: login");
						exit();
					}
				?>
				<script>
					function myFunction() {
					  document.getElementById("input_username").value = "";
					  document.getElementById("input_password").value = "";
					  document.getElementById("input_gmail").value = "";
					  document.getElementById("input_username").placeholder = "Username";
					  document.getElementById("input_password").placeholder = "Password";
					  document.getElementById("input_gmail").placeholder = "Gmail";
					}
				</script>
				<br></br>
				<form method = "post">
					<div>
						<label class = "text_rainbow">Username : </label>
						<input class = "input_rainbow" type = "text" id = "input_username" name = "username_input" placeholder = "Username" maxlength = "25" size = "25" autofocus onClick = "this.placeholder = ''"></input>
						<br></br>
						<label class = "text_rainbow">&nbsp;Password : </label>
						<input class = "input_rainbow" type = "password" id = "input_password" name = "password_input" placeholder = "Password" maxlength = "25" size = "25" onClick = "this.placeholder = ''"></input>
						<br></br>
						<label class = "text_rainbow">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Gmail : </label>
						<input class = "input_rainbow" type = "email" id = "input_gmail" name = "gmail_input" placeholder = "Gmail" maxlength = "25" size = "25" onClick = "this.placeholder = ''"></input>
					</div>
					<br></br>
					<div>
						<input class = "input_rainbow" type = "submit" name = "login"  value = "Login" onclick = "myFunction()"</input>
						<input class = "input_rainbow" type = "submit" name = "register" value = "Register"></input>
					</div>
				</form>
				<div>
					<span class = "text_rainbow">Create By MrSuradechTH</span>
					<br></br>
					<span class = "text_rainbow">Start project at 14/04/2021</span>
				</div>
			</div>
		</center>
	</body>
</html>