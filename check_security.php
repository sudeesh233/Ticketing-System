<?php
session_start();
?>
<html>
<head>
<title>check security</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="bossStyles.css" rel="stylesheet" type="text/css">
<script type="text/JavaScript">
<!--
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
//-->
</script>
</head>

<body>
<table width="780" border="0" class="blueBorder">
  <tr>
    <td width="333" class="orangeBorder"><div align="center"><img src="nec-logo.png" alt="enhc" width="300" height="150"></div></td>
    <td width="381" class="head1"><div align="center" class="blueHead">Security </div></td>
  </tr>
</table>
<p>&nbsp; </p>

  
<?php

include('connectYes.php');

$secUser = $_REQUEST["secUser"];
$secPassIn = $_REQUEST["secPass"];

$query = "select * from secTab where secUser = '$secUser'";
$result = mysql_query($query) or die(mysql_error());
$num = mysql_num_rows($result);

If ($num == 0) {
	print "<h3>User not found</h3>";
	print '<a href="login.html">Try Again</a><br><br>';
}
else
{
	$row = mysql_fetch_array($result);
	$secID = $row['secID'];
	$secLevel = $row['secLevel'];
	$secPass = $row['secPass'];

	if ($secPassIn != $secPass) {
			print "<h3>Password not matched</h3>";
			print '<a href="login.html">Try Again</a><br><br>';
}
	else 
{
		$_SESSION['user'] = $secLevel;
		$_SESSION['XsecIDX'] = $secID;
//		echo $secID . " " . $_SESSION['secID'];
		echo '<script type="text/javascript">';
		echo 'window.location = "index.html"';
		echo '</script>';
		
}};
// end if
	
?>
<input name="Submit3" type="button" class="orangeButton" onClick="MM_goToURL('parent','index.html');return document.MM_returnValue" value="Back" />
</body>
</html>
