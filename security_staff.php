<html>
<body>
<?php

if (empty($_SESSION['user'])) {
	header("location: sorry.html");
	exit();
} // emd if

if (($_SESSION['user']) != 'a')  {
	if (($_SESSION['user']) != 's')  {
		header("location: sorry.html");
		exit();
	}
} // emd if
$secUser= $_SESSION['secUser'];

?>
<a style="float: right;" href="security_list.php" class="smallbutton">Admin Center</a>
<a align="right" style="float: right;" href="logout.php" class="smallbutton button3" >Log-out</a>

</body>
</html>