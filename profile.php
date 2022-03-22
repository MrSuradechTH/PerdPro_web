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
	<center>
		<div>
			<br></br>
			<div>
				<form method = "post" enctype = "multipart/form-data">
					<div>
						<?php
							$query = mysqli_query($con, "SELECT gmail,image FROM user_info WHERE username = '$username' and password = '$password'");
							$result = mysqli_fetch_array($query);
							$gmail = $result[0];
							$path_old = $result[1];
						?>
						<img class = "image_rainbow pointer" id = "image" src = "<?php echo $path_old; ?>" width = "200" height = "200" onclick = "document.getElementById('file').click()"/>
						<input class = "hide" type = "file" id = "file" name = "file" accept="image/jpg,image/png,image/jpeg,image/gif" onchange = "document.getElementById('image').src = window.URL.createObjectURL(this.files[0])"/>
						<br></br>
						<?php
							if (isset($_POST['save'])) {
								$time = date("d/m/Y H:i:s",strtotime('+7 hours, +543 year'));
								$username_new = $_POST['username_input'];
								$password_new = $_POST['password_input'];
								if (!empty($_FILES["file"]["name"])) {
									if ($file_name = $_FILES["file"]["size"] > 1048576 * 5) {
										echo '<span class = "text_rainbow">Image file size is too Large!!!</span>';
									}else {
										$file_name = $_FILES["file"]["name"];
										$file_type = pathinfo($file_name,PATHINFO_EXTENSION);
										$file_tmp = $_FILES["file"]["tmp_name"];
										
										if ($username == $username_new and $password == $password_new) {
											unlink($path_old);
											$path_new = "photo/profile/" . $username . "." . $file_type;
											move_uploaded_file($file_tmp, $path_new);
											$query = mysqli_query($con, "UPDATE user_info SET image = '$path_new',time = '$time' WHERE gmail = '$gmail'");
											$result = mysqli_affected_rows($con);
											if ($result > 0) {
												header("Location: home");
												exit();
											}else {
												echo '<span class = "text_rainbow">Image Update Fail!!!</span>';
											}
										}else {
											if ($username_new == "" or $password_new == "") {
												echo '<span class = "text_rainbow">Has Null Input!!!</span>';
											}else {
												$query = mysqli_query($con, "UPDATE user_info SET username = '$username_new',password = '$password_new' WHERE gmail = '$gmail'");
												$result = mysqli_affected_rows($con);
												if ($result > 0) {
													$name_save = "perdpro";
													$username = $username_new;
													$password = $password_new;
													
													$array = array($username,$password);
													$array_str = implode(" ",$array);
													if(isset($_COOKIE[$name_save])) {
														setcookie($name_save, $array_str, time() + (60 * 15));
													}
													$_SESSION[$name_save] = $array_str;
														
													unlink($path_old);
													$path_new = "photo/profile/" . $username . "." . $file_type;
													move_uploaded_file($file_tmp, $path_new);
													$query = mysqli_query($con, "UPDATE user_info SET image = '$path_new',time = '$time' WHERE gmail = '$gmail'");
													$result = mysqli_affected_rows($con);
													if ($result > 0) {
														header("Location: home");
														exit();
													}else {
														echo '<span class = "text_rainbow">Image Update Fail!!!</span>';
													}
												}else {
													echo '<span class = "text_rainbow">Update Fail!!!</span>';
												}
											}
										}
									}
								}else {
									if ($username == $username_new and $password == $password_new) {
										header("Location: home");
										exit();
									}else {
										
										if ($username_new == "" or $password_new == "") {
											echo '<span class = "text_rainbow">Has Null Input!!!</span>';
										}else {
											$query = mysqli_query($con, "UPDATE user_info SET username = '$username_new',password = '$password_new' WHERE gmail = '$gmail'");
											$result = mysqli_affected_rows($con);
											if ($result > 0) {
												$name_save = "perdpro";
												$username = $username_new;
												$password = $password_new;
												
												$array = array($username,$password);
												$array_str = implode(" ",$array);
												if(isset($_COOKIE[$name_save])) {
													setcookie($name_save, $array_str, time() + (60 * 15));
												}
												$_SESSION[$name_save] = $array_str;
												header("Location: home");
												exit();
											}else {
												echo '<span class = "text_rainbow">Update Fail!!!</span>';
											}
										}
									}
								}
							}else if (isset($_POST['cancel'])) {
								header("Location: home");
								exit();
							}
						?>
						<br></br>
						<label class = "text_rainbow">Username : </label>
						<input class = "input_rainbow" type = "text" name = "username_input" value = "<?php echo $username; ?>" maxlength = "12" size = "25" autofocus"></input>
						<br></br>
						<label class = "text_rainbow padding">&nbsp;Password : </label>
						<input class = "input_rainbow" type = "password" id = "password_input" name = "password_input" value = '<?php echo $password; ?>' maxlength = "25" size = "25"></input>
						<script>
						document.getElementById("password_input").onmouseover = function() {
							show();
						};
						document.getElementById("password_input").onmouseout = function() {
							hide();
						};

						function show() {
						  document.getElementById("password_input").type = "text";
						}

						function hide() {
						  document.getElementById("password_input").type = "password";
						}
						</script>
						<br></br>
						<label class = "text_rainbow padding">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Gmail : </label>
						<span class = "span input_rainbow no-drop" align = "left"><?php echo $gmail; ?></span>
					</div>
					<br></br>
					<div>
						<input class = "input_rainbow pointer" type = "submit" name = "save"  value = "Save"> </input>
						<input class = "input_rainbow pointer" type = "submit" name = "cancel" value = "Cancel"></input>
					</div>
				</form>
			</div>
		</div>
	</body>
</html>