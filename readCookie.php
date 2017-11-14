<?php 

include('connect.php');

// check for cookie
$cookieName = "enhC221e";
if (isset($_COOKIE[$cookieName])) {
// retrieve old cookie value
	$visID = $_COOKIE[$cookieName];
	$expire = $_COOKIE[$expire];
	$hit = "y";
} 
else {
$hit = "n";
}
?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>essex heritage</title>
</head>

<body>
<?php 
echo "hit: $hit<br>";
echo "visId: $visID<br>";
echo "expire: $expire<br>";
echo "cookie " .  $_COOKIE["enhC221e"]; 
?>
</body>
</html>
