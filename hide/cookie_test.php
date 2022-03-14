<?php
$cookie_name = "test";
$array = array("hi",1248);
$str_array = implode(" ",$array);
setcookie($cookie_name, $str_array, time() + (60));
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