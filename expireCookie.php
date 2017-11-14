<?php
session_start();

include('security_staff.php');

$cookieName = "enhC221e";
if (isset($_COOKIE[$cookieName])) {
	$set = "y";
	setcookie($cookieName, "", time()-3600);
}	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>expire a cookie</title>
</head>

<body>
Expire a cookie
<br />

<?php 
if ($set == "y") {
	echo "expiring <br>";
	} else {
	echo "not found <br>";
	}
?>

<br />
<br />
<a href="index.html">return
</a>
</body>
</html>
