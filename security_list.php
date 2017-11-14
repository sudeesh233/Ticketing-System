<?php

session_start();

include('security_admin.php');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style>
.button {
    background-color: #008CBA;
    border: none;
    color: white;
    padding: 30px 62px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 24px;
    margin: 8px 4px;
    cursor: pointer;
}
.smallbutton {
    background-color: #008CBA;
    border: none;
    color: white;
    padding: 20px 42px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 18px;
    margin: 6px 3px;
    cursor: pointer;
}
.button3 {background-color: #f44336;} /* Red */ 

</style>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>list security itc</title>
<link href="bossStyles.css" rel="stylesheet" type="text/css" />
<script type="text/JavaScript">
<!--
function MM_callJS(jsStr) { //v2.0
  return eval(jsStr);
}
function decision(message, url){
	if(confirm(message)) location.href = url;
}
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
//-->
</script>
</head>

<body>
<table width="780" border="0" cellpadding="8" class="blueBorder">
  <tr>
    <td width="333" class="orangeBorder"><div align="center"><img src="nec-logo.png" alt="enhc" width="100" height="87" /></div></td>
    <td width="381"><div align="center" class="blueHead">Update Security </div></td>
  </tr>
</table>
<br />
<table width="780" border="0" class="blueBorder">
<?php

// connect
include('connect.php');

// set scroll amount, get form values
$scroll_amt = 12;
$pcode = $_REQUEST["pcode"];
$pstart = $_REQUEST["pstart"];
$pmax = $_REQUEST["pmax"];

// first time thru, get count, reset max
if ($pcode == null) {
	$query = "select count(*) from secTab";
	$result = mysqli_query($conn,$query) or die(mysqli_error($conn));
	$row = mysqli_fetch_array($result); 
	$pmax = $row['0'];
	$pstart = 0;
} // end if

// perform search based on limits
$query = "select * from secTab limit $pstart, $scroll_amt";
$result = mysqli_query($conn,$query) or die(mysqli_error($conn));

// format table and bg color
echo '<tr class="blackHead"><td align="center">Rec ID</td>
<td>User Id</td><td align="center">User Level</td>
<td colspan="2" align="center">Action</td></tr>';
$bg = '#cccccc';
// loop for print
while ($row = mysqli_fetch_array($result)) {
	$bg = ($bg=='#cccccc' ? '#ffffff' : '#cccccc');
	$secID = $row['secID'];
	$secUser = $row['secUser'];
	$secLevel = $row['secLevel'];
	echo '<tr class="blackMain" bgcolor="', $bg, '">';
	echo "<td align='center'>$secID</td>";
	echo "<td>$secUser</td>";
	echo "<td align='center'>$secLevel</td>";
	echo "<td><a href='security_input.php?id=";
	echo $secID;
	echo "&action=u'>Change</a></td>";

	echo '<td><a href="#" onclick="MM_callJS(decision(';
	echo "'Delete ";
	echo $secID . " - " . $secUser;
	echo "?','security_action.php?id=";
	echo $secID;
	echo "&action=d'))";
	echo '">Delete</a></td></tr>';	

//	echo "<td><a href='security_action.php?id=";
//	echo $sec_id;
//	echo "&action=d'>Delete</a></td>";
//	echo "</tr>";
}

// setup for forward/back
echo '</table><table width="780" border="1" class="blueBorder"><tr>';

// set next forward page amt - reset if past max
if (($pstart + $scroll_amt) < $pmax) {
	$forward = $pstart + $scroll_amt;
} else {
	$forward = $pstart;
} // end if

// set next backward page amt - reset if less 0
$back = $pstart - $scroll_amt;
if ($back < 0) {
	$back = 0;
} // end if

// format back button using back amount as start
// only display if there are recs to display
if ($pstart != 0) {
echo '<td align="left" class="scroll"><a href="security_list.php?pcode=b&pstart=' . $back . '&pmax=' . $pmax . '">&nbsp;&nbsp;&laquo;&laquo;Back</a></td>';
} // end it

// format forward button using forward amount as start
// only display if there are recs to display
if (($pstart + $scroll_amt) < $pmax) {
echo '<td align="right" class="scroll"><a href="security_list.php?pcode=f&pstart=' . $forward . '&pmax=' . $pmax . '">Next&raquo;&raquo;&nbsp;&nbsp;</a></td>';
} // end it

?>


  
</table>

<form id="form1" name="form1" method="get" action="security_input.php">
  <table width="780" border="0" cellpadding="8">
    <tr>
      <td width="73">&nbsp;
      <input name="action" type="hidden" id="action" value="a" />
      </td>
      <td width="94">&nbsp;</td>
      <td width="599">&nbsp;</td>
    </tr>
  </table>
  <table width="780" border="0">
    <tr>
      <td width="116"><input name="Submit2" type="submit" class="smallbutton" value="Add Record" /></td>
      <td width="654"><input name="Submit3" type="button" class="smallbutton" onclick="MM_goToURL('parent','home.php');return document.MM_returnValue" value="Back" /></td>
    </tr>
  </table>
  <br />
  </form>
  <a href="log_list.php" align="right" class="smallbutton">Ticket Change Log</a>
</body>
</html>
