<?php
$cookie_name = "perdpro";
?>
<html>
<body>

<?php

if(!isset($_COOKIE[$cookie_name])) {
    echo "Cookie named '" . $cookie_name . "' is not set!";
} else {
    echo "Cookie '" . $cookie_name . "' is set!<br>";
	$str_array = $_COOKIE[$cookie_name];
	$array_str = explode(" ",$str_array);
	echo "Value is: " . $array_str[0] . "and" . $array_str[1];
}
?>

</body>
</html>