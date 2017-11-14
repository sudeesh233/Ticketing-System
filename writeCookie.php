<?php
session_start();

include('security_staff.php');

$cookieName = "enhC221e";
$expire=time()+60*60*24*365*2;
if (isset($_COOKIE[$cookieName])) {
	$set = "n";
	} else {
	$set = "y";
	setcookie($cookieName, "rick m", $expire, "/");
}	
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>write a cookie</title>
</head>

<body>
Write/Retrieve a cookie
<br />

<?php 
if ($set == "n") {
	echo "previously set <br>";
	} else {
	echo "setting <br>";
	}
echo "$_COOKIE[$cookieName]<br />";
echo print_r($_COOKIE);
echo "<br>";
echo @$REMOTE_ADDR; 

?>

<br />
<br />
<a href="index.html">return
</a>
</body>
</html>
