<!DOCTYPE html>
<html>
<body>


<form method = "post">
<input type = "submit" action = "this" name = "save"  value = "Save"> </input>
</form>
<?php
$t=time();
//echo($t . "<br>");
if (isset($_POST['save'])) {
$time = date("d/m/Y H:i:s",strtotime('+7 hours, +543 year'));
echo $time;
}
?>
</body>
</html>
