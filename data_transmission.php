<?php
	require_once 'connect_mysqli.php';
?>
<html>
	<head>
		<title>PerdPro</title>
	</head>
	<body class = "body_matrix">
			<div>
				<form method = "post">
					<?php
						if (isset($_POST['username']) and isset($_POST['username'])) {
							$username = $_POST['username'];
							$password = $_POST['password'];
							$api_name = $_POST['api_name'];
							$api_value = $_POST['api_value'];
							
							$query = mysqli_query($con, "SELECT api FROM user_info WHERE username = '$username' and password = '$password'");
							$result = mysqli_fetch_array($query);
							$api_str = $result;
							// echo $api_str[0];
							if (strpos($api_str[0], "._.".$api_name."._.") == true and strpos($api_value, "._.") == false) {
								$api_str[0] = preg_replace("/._.".$api_name.".*".PHP_EOL."/", "._.".$api_name."._.".$api_value."._.".PHP_EOL, $api_str[0]);
								// echo $api_str[0];
								// echo 'yes';
							}else {
								if (strpos($api_str[0], "._.".$api_name."._.") == false) {
									echo 'don\'t have this api name';
									echo "<br><br>";
								}
								if (strpos($api_value, "._.") == true) {
									echo 'value detected';
									echo "<br><br>";
								}
								// echo 'no';
							}
							$query = mysqli_query($con, "UPDATE user_info SET api = '$api_str[0]' WHERE username = '$username' and password = '$password'");
							$result = mysqli_affected_rows($con);
							if ($result > 0) {
								echo '<span class = "text_rainbow">Success!!!</span>';
							}else {
								echo '<span class = "text_rainbow">Fail!!!</span>';
							}
						}
					?>
				</form>
			</div>
	</body>
</html>