<html>
<body>
<?php

if (empty($_SESSION['user'])) {
	header("location: sorry2.html");
	exit();
} // emd if

if (($_SESSION['user']) != 'a') {
	header("location: sorry2.html");
	exit();
} // emd if
?>

</body>
</html>