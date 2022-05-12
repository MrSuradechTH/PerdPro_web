<?php
// $MAC = exec('getmac');
// $MAC = strtok($MAC, ' ');
// echo "MAC address of Server is: $MAC";
// $IP = $_SERVER['REMOTE_ADDR'];
// echo "Client's IP address is: $IP";
// $hostname = gethostname();
// echo "$hostname";
$user_agent = $_SERVER['HTTP_USER_AGENT'];
// echo '<span class = "text_rainbow">';
echo "$user_agent";
// echo '</span>';
// $user_agent = $_SERVER['HTTP_USER_AGENT'];
// $myString = 'Hello Bob how are you?';
// if (strpos($user_agent, 'Windows')) {
    // echo '<span class = "text_rainbow">Windows</span>';
// }else if (strpos($user_agent, 'Android')) {
	// echo '<span class = "text_rainbow">Android</span>';
// }

$arr = explode('(', $user_agent);
$important = $arr[1];

$MAC = exec('getmac');
echo '<br><br/>';
echo $MAC;
$MAC = strtok($MAC, ' ');
echo '<br><br/>';
echo "MAC address of Server is: $MAC";
echo '<br><br/>';
$IP = $_SERVER['REMOTE_ADDR'];
echo "Client's IP address is: $IP";
echo '<br><br/>';
$hostname = gethostname();
echo "Hostname : $hostname";
echo '<br><br/>';
// echo strchr($user_agent,"KHT");
echo "$user_agent";
echo '</span>';
// echo "$important";
?>