<?php
session_start();

include('security_staff.php');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>security update rr</title>
<link href="bossStyles.css" rel="stylesheet" type="text/css" />
<script type="text/JavaScript">
<!--
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_validateForm() { //v4.0
  var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
  for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=MM_findObj(args[i]);
    if (val) { nm=val.name; if ((val=val.value)!="") {
      if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
        if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
      } else if (test!='R') { num = parseFloat(val);
        if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
        if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
          min=test.substring(8,p); max=test.substring(p+1);
          if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
    } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
  } if (errors) alert('The following error(s) occurred:\n'+errors);
  document.MM_returnValue = (errors == '');
}

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
      <td width="333" class="orangeBorder"><div align="center"><img src="nec-logo.png" alt="enhc" width="100" height="87" /></div></td>
      <td width="381" class="head1"><div align="center" class="blueHead">Update Security </div></td>
    </tr>
  </table>
<br />
<?php 

function verify_pw($chk_pw) {

	$is_valid = "n";

	if (strlen($chk_pw) < 6) {
		return $is_valid;
	} // end if

	if (eregi("[0-9]",$chk_pw)) {
	} else {
	return $is_valid;
	} // end if

	if (eregi("[A-Z]",$chk_pw)) {
		} else {
		return $is_valid;
	} // end if

	$is_valid = "y";
	return $is_valid;

} // end function
	
include('connect.php');


$action = $_REQUEST["action"];
$id = $_REQUEST["id"];
	
$secUser = $_REQUEST["secUser"];
$secPass = $_REQUEST["secPass"];
$secLevel = $_REQUEST["secLevel"];
$secFirstName = $_REQUEST["secFirstName"];
$secLastName = $_REQUEST["secLastName"];
$secEmail = $_REQUEST["secEmail"];
$secNote = $_REQUEST["secNote"];

if ($action == 'a') {
	if (verify_pw($secPass) != "y") {
		print "<h3>Password is invalid</h3>";
		print "<h3>Try Again</h2>";
	} else {
	$query = "select count(*) from secTab where secUser = '$secUser'";
	$result = mysqli_query($conn,$query) or die(mysqli_error($conn));
	$row = mysqli_fetch_array($result); 
	$cnt = $row['0'];
	if ($cnt != 0) {
		print "<h3>ID Already Assigned</h3>";
		print "<h3>Try Again</h2>";
		} else {
	$query = "insert into secTab values (
	null,
	'$secUser',
	'$secPass',
	'$secLevel',
	'$secFirstName',
	'$secLastName',
	'$secEmail',
	'$secNote'
	 )";
	mysqli_query($conn, $query) or
		die(mysqli_error($conn));
	print "<h3>Add Successful</h3>";
	}} 
} // end a 
 else {
if ($action == 'u') {
	if (verify_pw($secPass) != "y") {
		print "<h3>Password is invalid</h3>";
		print "<h3>Try Again</h2>";
	} else {
	$query = "update secTab
		set secPass = '$secPass',
			secLevel = '$secLevel',
			secNote = '$secNote',
			secFirstName = '$secFirstName',
			secLastName = '$secLastName',
			secEmail = '$secEmail'
		where secID = '$id'";
	mysqli_query($conn,$query) or
		die(mysqli_error($conn));
	print "<h3>Update Successful</h3>";
}} // end u
 else {
if ($action == 'd') {
// check to see if rec on 
		$query = "delete from secTab
		where secID = '$id'";
		$result = mysqli_query($conn,$query)
			 or die("query failed:" . mysqli_error());
	print "<h3>Delete Successful</h3>";
} // end d 
 else {
	print "<h3>Unknown Action</h3>";
}}} // end exception
?>

<br />
<input name="Button" type="button" class="smallbutton" onclick="MM_goToURL('parent','security_list.php');return document.MM_returnValue" value="Back" />
<br />
</body>
</html>
