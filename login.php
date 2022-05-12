<?php
	session_start();
	require_once 'connect_mysqli.php';
?>

<html>
	<head>
		<link rel = "stylesheet" href = "styles.css?v = <?php echo time(); ?>"/>
		<link rel = "icon" href = "source/logo_perdpro.png">
		<title>PerdPro</title>
	</head>
	<body class = "body_matrix">
		<center>
			<div>
				<div>
					<img class = "image_rainbow pointer" src = "source/logo_perdpro.png" width = "200px" height = "200px"/>
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
								setcookie($name_save, null, -1, '/');
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
					if (isset($_POST['login'])) {
						$username = $_POST['username_input'];
						$password = $_POST['password_input'];
						if ($username == "" && $password == "") {
							echo '<span class = "text_rainbow">Has Null Input!!!</span>';
						}else {
							$query = mysqli_query($con, "SELECT * FROM user_info WHERE  username = '$username' and password = '$password'");
							$num_row = mysqli_num_rows($query);
							if ($num_row > 0) {
								$array = array($username,$password);
								$array_str = implode(" ",$array);
								if (!empty($_POST['remember'])) {
									setcookie($name_save, $array_str, time() + (60 * 15));
								}else {
									setcookie($name_save, null, -1, '/');
								}
								$_SESSION[$name_save] = $array_str;
								header("Location: home");
								exit();
							}else {
								echo '<span class = "text_rainbow">Login Fail!!!</span>';
							}
						}
					}else if (isset($_POST['register'])) {
						header("Location: register");
						exit();
					}
				?>
				<br></br>
				<div>
					<form method = "post">
						<div>
							<label class = "text_rainbow">Username : </label>
							<input class = "input_rainbow" type = "text" id = "username_input" name = "username_input" placeholder = "Username" maxlength = "12" size = "25" autofocus onClick = "this.placeholder = ''"></input>
							<br></br>
							<label class = "text_rainbow">&nbsp;Password : </label>
							<input class = "input_rainbow" type = "password" id = "password_input" name = "password_input" placeholder = "Password" maxlength = "25" size = "25" onClick = "this.placeholder = ''"></input>
						</div>
						<div>
							<input class = "input_check_box pointer" type = "checkbox" id = "remember" name = "remember"/>
							<label class = "text_rainbow pointer" for = "remember">remember</label><br>
						</div>
						<div>
							<input class = "input_rainbow pointer" type = "submit" name = "login"  value = "Login"></input>
							<input class = "input_rainbow pointer" type = "submit" name = "register" value = "Register" onclick = "reset()"></input>
						</div>
					</form>
					<script>
						function reset() {
						  document.getElementById("username_input").value = "";
						  document.getElementById("password_input").value = "";
						  document.getElementById("username_input").placeholder = "Username";
						  document.getElementById("password_input").placeholder = "Password";
						}
					</script>
				</div>
				<div>
					<span class = "text_rainbow">Create By MrSuradechTH</span>
					<br></br>
					<span class = "text_rainbow">Start project on 14/04/2021</span>
				</div>
			</div>
		</center>
	</body>
</html>

    
