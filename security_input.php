<?php

session_start();

include('security_staff.php');

?>

<?php 

include('connect.php');

$action = $_REQUEST["action"];

if ($action == 'a') {
	$secID = null;
	$secUser = null;
	$secPass = null;
	$secLevel = null;
	$secFirstName = null;
	$secLastName = null;
	$secEmail = null;
	$secNote = null;
 } else {
		$id = $_REQUEST["id"];
	 	$query = "select * from secTab where secID = $id";
		$result = mysqli_query($conn, $query) 
			or die(mysqli_error($conn));
		$row = mysqli_fetch_array($result); 
		$secUser = $row['secUser'];
		$secPass = $row['secPass'];
		$secLevel = $row['secLevel'];
		$secFirstName = $row['secFirstName'];  
		$secLastName = $row['secLastName'];
		$secEmail = $row['secEmail'];
		$secNote = $row['secNote'];
} // end if

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>update security</title>

 
<script language="JavaScript" type="text/JavaScript">
<!--

function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}

function VerifyForm(form) {

  if (form.secUser.value == "") {
     alert('User Name is required');
     form.secUser.focus();
     return false;
  }
 if (form.secPass.value == "") {
     alert('Password is required');
     form.secPass.focus();
     return false;
  }
}
-->


//-->
</script>
 
<link href="bossStyles.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style1 {color: #FF0000}
-->
</style>
</head>

<body>
<table width="780" border="0" class="blueBorder">
  <tr>
    <td width="308" class="orangeBorder"><div align="center"><img src="nec-logo.png" alt="enhc" width="100" height="87" /></div></td>
    <td width="462" class="head1"><div align="center" class="blueHead">Update Security </div></td>
  </tr>
</table>
<br />
<table width="780" border="2" cellpadding="5" class="blueBorder">
  <tr>
    <td><form id="form1" name="form1" method="get" action="security_action.php" onSubmit="return VerifyForm(this)">
      <table width="644" border="0" cellpadding="5">
        <tr>
          <td width="202" class="blackForm">Enter User ID </td>
          <td width="416"><input name="secUser" type="text" class="blackMain" id="secUser" value="<?php echo $secUser;?>" size="12" maxlength="10" <?php if ($action == 'u') echo 'readonly=readonly' ;?> /></td>
        </tr>
        <tr>
          <td class="blackMain"><span class="blackForm">Enter Password</span><span class="style1">**</span> </td>
          <td><input name="secPass" type="text" class="blackMain" id="secPass" value="<?php echo $secPass;?>" size="12" maxlength="10" /></td>
        </tr>
        <tr>
          <td class="blackMain"><span class="blackForm">First Name</span></td>
          <td><input name="secFirstName" type="text" class="blackMain" id="secFirstName" value="<?php echo $secFirstName;?>" size="15" maxlength="15" /></td>
        </tr>
        <tr>
          <td class="blackMain"><span class="blackForm">Last Name</span></td>
          <td><input name="secLastName" type="text" class="blackMain" id="secLastName" value="<?php echo $secLastName;?>" size="20" maxlength="20" /></td>
        </tr>
        <tr>
          <td class="blackMain"><span class="blackForm">Email</span></td>
          <td><input name="secEmail" type="text" class="blackMain" id="secEmail" value="<?php echo $secEmail;?>" size="60" maxlength="128" /></td>
        </tr>
        <tr>
          <td class="blackForm">Access Level </td>
          <td><p>
            <label>
			<input name="secLevel" type="radio" value="a" checked="checked"
		  <?php 
		  if ($secLevel == 'a') {
		  	echo ' checked="checked" ';
		 	} 
		  if (($_SESSION['user']) != 'a')  {
		  	echo ' disabled ';
		 	} 
		   ?>
		     />              
			<span class="blackForm">Administrator</span></label>
            <br />
            <label>
			<input type="radio" name="secLevel" value="s" 
		  <?php 
		  if ($secLevel == 's') {
		  	echo ' checked="checked " ';
			} 
		  if (($_SESSION['user']) != 'a')  {
		  	echo ' disabled ';
		 	} 
			
			?>
			 />
              <span class="blackForm">Staff</span></label><br />
            

          </p></td>
        </tr>
        <tr>
          <td class="blackForm">Note</td>
          <td><textarea name="secNote" cols="50" rows="3" class="blackMain" id="sec_user_note"><?php echo $secNote;?></textarea></td>
        </tr>
        <tr>
          <td><input name="action" type="hidden" id="action" value="<?php echo $action;?>" />
            <input name="id" type="hidden" id="id" value="<?php echo $id;?>" />
<?php
 if (($_SESSION['user']) != 'a') {
    echo '<input name="secLevel" type="hidden" id="secLevel" value="';
	echo $secLevel;
	echo '" />';
	}
?>            </td>
          <td><input name="Submit" type="submit" class="smallbutton" value="Submit" />
            &nbsp;
            <input name="Submit2" type="button" class="smallbutton" onclick="MM_goToURL('parent','<?php 
if (($_SESSION['user']) == 'a') {
	echo "security_list.php";
} else {
	echo "home.html";
} // end if
?>
');return document.MM_returnValue" value="Back" /></td>
        </tr>
      </table>
    </form></td>
  </tr>
</table>
<p class="blackMain"><span class="smallbutton">**</span> Password must be minimum of 6 characters and contain at least 1 number and 1 upper case character</p>
</body>
</html>
