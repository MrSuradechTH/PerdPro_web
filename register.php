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
				<form method = "post" enctype = "multipart/form-data">
					<div>
						<img class = "image_rainbow pointer" id = "image" src = "photo/profile/no_image_profile.png" width = "200" height = "200" onclick = "document.getElementById('file').click()"/>
						<input class = "hide" type = "file" id = "file" name = "file" accept="image/jpg,image/png,image/jpeg,image/gif" onchange = "document.getElementById('image').src = window.URL.createObjectURL(this.files[0])"/>
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
						
						if (isset($_POST['register'])) {
							$username = $_POST['username_input'];
							$password = $_POST['password_input'];
							$gmail = $_POST['gmail_input'];
							$time = date("d/m/Y H:i:s",strtotime('+7 hours, +543 year'));
							$api = "0._.".PHP_EOL;
							if (!empty($_FILES["file"]["name"])) {
								if ($file_name = $_FILES["file"]["size"] > 1048576 * 5) {
									echo '<span class = "text_rainbow">Image file size is too Large!!!</span>';
								}else {
									$file_name = $_FILES["file"]["name"];
									$file_type = pathinfo($file_name,PATHINFO_EXTENSION);
									$file_tmp = $_FILES["file"]["tmp_name"];
									$path_new = "photo/profile/" . $username . "." . $file_type;
									if ($username == "" || $password == "" || $gmail == "") {
											echo '<span class = "text_rainbow">Has Null Input!!!</span>';
									}else {
										$result = mysqli_query($con,"INSERT INTO user_info(username,password,gmail,api) VALUES ('$username','$password','$gmail','$api')");
										if ($result) {
											move_uploaded_file($file_tmp, $path_new);
											$query = mysqli_query($con, "UPDATE user_info SET image = '$path_new',time = '$time' WHERE gmail = '$gmail'");
											header("Location: login");
											exit();
										}else {
											echo '<span class = "text_rainbow">Register Fail!!!</span>';
										}	
									}
								}
							}else {
								if ($username == "" || $password == "" || $gmail == "") {
									echo '<span class = "text_rainbow">Has Null Input!!!</span>';
								}else {
									$result = mysqli_query($con,"INSERT INTO user_info(username,password,gmail,api) VALUES ('$username','$password','$gmail','$api')");
									if ($result) {
										$path_new = "photo/profile/" . $username . ".png";
										copy("photo/profile/no_image_profile.png", $path_new);
										$query = mysqli_query($con, "UPDATE user_info SET image = '$path_new',time = '$time' WHERE gmail = '$gmail'");
										header("Location: login");
										exit();
									}else {
										echo '<span class = "text_rainbow">Register Fail!!!</span>';
									}
								}
							}
						}else if (isset($_POST['login'])) {
							header("Location: login");
							exit();
						}
					?>
					<br></br>
					<div>
						<label class = "text_rainbow">Username : </label>
						<input class = "input_rainbow" type = "text" id = "username_input" name = "username_input" placeholder = "Username" maxlength = "12" size = "25" autofocus onClick = "this.placeholder = ''"></input>
						<br></br>
						<label class = "text_rainbow">&nbsp;Password : </label>
						<input class = "input_rainbow" type = "password" id = "password_input" name = "password_input" placeholder = "Password" maxlength = "25" size = "25" onClick = "this.placeholder = ''"></input>
						<br></br>
						<label class = "text_rainbow">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Gmail : </label>
						<input class = "input_rainbow" type = "email" id = "gmail_input" name = "gmail_input" placeholder = "Gmail" maxlength = "25" size = "25" onClick = "this.placeholder = ''"></input>
					</div>
					<br></br>
					<div>
						<input class = "input_rainbow pointer" type = "submit" name = "login"  value = "Login" onclick = "reset()"</input>
						<input class = "input_rainbow pointer" type = "submit" name = "register" value = "Register"></input>
					</div>
				</form>
				<script>
					function reset() {
					  document.getElementById("username_input").value = "";
					  document.getElementById("password_input").value = "";
					  document.getElementById("gmail_input").value = "";
					  document.getElementById("username_input").placeholder = "Username";
					  document.getElementById("password_input").placeholder = "Password";
					  document.getElementById("gmail_input").placeholder = "Gmail";
					}
				</script>
				<div>
					<span class = "text_rainbow">Create By MrSuradechTH</span>
					<br></br>
					<span class = "text_rainbow">Start project on 14/04/2021</span>
				</div>
			</div>
		</center>
	</body>
</html>