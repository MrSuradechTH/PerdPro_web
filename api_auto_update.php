<?php
	require_once 'time_stamp.php';
?>

<html>
	<head>
		<link rel = "icon" href = "source/logo_perdpro.png">
		<title>PerdPro</title>
	</head>
	<body>
		<form method = "post">
			<?php
				$query = mysqli_query($con, "SELECT api FROM user_info WHERE username = '$username' and password = '$password'");
				$result = mysqli_fetch_array($query);
				$api_str = $result;
				// echo $api_str[0];
				$api_array_fist = explode("._.".PHP_EOL,$api_str[0]);
				// echo $api_array_fist[0];
				if ($api_array_fist[0] != 0) {
					echo '<div class = "api input_rainbow pointer">';
					// echo $api_array_fist[2];
					// $api_array_second = array(array());
					for ($x = 0;$x <= $api_array_fist[0];$x++) {
						if ($x != 0) {
							$api_array_second[$x] = explode("._.",$api_array_fist[$x]);
							// echo $api_array_second[$x][0];
							$api_num[$x] = $api_array_second[$x][0];
							$api_name[$x] = $api_array_second[$x][1];
							$api_value[$x] = $api_array_second[$x][2];
							echo '<div class = "api_box">';
								echo '<div class = "api_list_name input_rainbow">';
									echo '<span class = "api_text_name text_rainbow_none_animetion">' . $api_name[$x] . '</span>';
								echo '</div>';
								echo '<div class = "api_list_value input_rainbow">';
									echo '<span class = "api_text_value text_rainbow_none_animetion">' . $api_value[$x] . '</span>';
								echo '</div>';
							echo '</div>';
						}
					}
					echo '</div>';
				}
				//ทำปุ่ม config ไปอีกหน้า เพิ่มปุ่มขึ้นลง ซ้ายขวา ด้านข้าง api ด้วย echo
			?>
		</form>
	</body>
</html>