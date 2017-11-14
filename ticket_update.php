<img href="home.html" src="https://16ady216etox4c1ny031s78y-wpengine.netdna-ssl.com/wp-content/uploads/2017/04/New-England-College.png" alt="Mountain View" style="width:500px;height:200px;">
<!DOCTYPE html>
<?php
session_start();

include('security_staff.php');

?>
<html>
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
</style>
<link href="bossStyles.css" rel="stylesheet" type="text/css">
<?php 


// include the connection streamm
include 'connect.php';

$action = $_REQUEST["action"];
if ($action == 'a') {
  $title = null;
	$firstname = null;
	$lastname = null;
	$studentid = null;
	$categoryID = null;
	$comment = null;
	$date = null;
	$status = null;
 } else {
	$id = $_REQUEST["id"];
	 	$query = "select * from ticket_tab where ticketID = $id";
		$result = mysqli_query($conn, $query)
			or die(mysqli_error());
		$row = mysqli_fetch_assoc($result);
    $title = $row['title'];    
		$firstname = $row['firstname'];  
		$lastname = $row['lastname'];  
		$studentid = $row['studentid'];
		$categoryID = $row['categoryID'];
		$comment = $row['comment'];  
		$status = $row['status'];
} // end if

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Student Entry 3</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="JavaScript" type="text/JavaScript">
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
//-->
</script>
</head>

<body class="blackHead">
<h1>Please Enter Ticket Information</h1>
<form action="ticket_action.php" method="get" name="form1" class="formText" onSubmit="MM_validateForm('fname','','R','lname','','R','address','','R','city','','R','state','','R','zip','','RisNum','email','','RisEmail','phone','','RisNum');return document.MM_returnValue">
  <table width="59%" border="0" cellspacing="0" cellpadding="5">
  <tr> 
      <td width="28%"><font size="4">Ticket Title</font></td>
      <td width="72%"><input name="title" type="text" id="title" value="<?php echo $title;?>" size="20" maxlength="20"></td>
    </tr>
    <tr> 
      <td width="28%"><font size="4">First Name</font></td>
      <td width="72%"><input name="firstname" type="text" id="firstname" value="<?php echo $firstname;?>" size="20" maxlength="20"></td>
    </tr>
    <tr> 
      <td><font size="4">Last Name</font></td>
      <td><input name="lastname" type="text" id="lastname" value="<?php echo $lastname;?>" size="25" maxlength="25"></td>
    </tr>
    <tr> 
      <td><font size="4">Student ID</font></td>
      <td><input name="studentid" type="text" id="studentid" value="<?php echo $studentid;?>" size="8" maxlength="8"></td>
    </tr>
    
      <tr> 
      <td><font size="4">Category</font></td>
      <td><label>
        <select name="categoryID" id="select">
    

<?php 
  
$query = "SELECT * FROM categoryTab order by categoryName";
  $result = mysqli_query($conn, $query) or die(mysqli_error());
  while ($row = mysqli_fetch_array($result)) {
    $category_ID = $row['category_ID'];
    $categoryName = $row['categoryName'];
    if ($category_ID == $categoryID) {
      $selected = " Selected ";
    } else {
      $selected = NULL;
    }
    $option = '<option value="' . $category_ID . '"' .  $selected . '>' . $categoryName . '</option>';
    echo $option . "\n";
  } // end while
?>
                 
        </select>
      </label></td>
    </tr>
    
    <tr> 
      <td><font size="4">Change status</font></td>
      <td><p>
        <label>
      <input name="status" type="radio" value="Open" <?php if ($status == "Open") {echo ' checked=checked ';} ?> >          
         Open</label>
        <br>
        <label>
          <input type="radio" name="status" value="Pending" <?php if ($status == "Pending") {echo ' checked=checked ';} ?>>
           Pending</label>
        <br>
        <label>
          <input type="radio" name="status" value="Resolved" <?php if ($status == "Resolved") {echo ' checked=checked ';} ?>>
          Resolved</label>
        <br>
        <br>
      </p></td>
    </tr> 
    <tr> 
      <td><font size="4">Comment and Notes</font></td>
      <td><textarea name="comment" id="comment" cols="45" rows="5"><?php echo $comment;?></textarea></td>
    </tr>
    <tr> 
      <td>
      <!-- this bit of code passes the action and the id to the update program -->
      <!-- I use php to assign the proper values to each parm -->
     
      &nbsp;<input name="action" type="hidden" class="smallbutton" id="action" value="<?php echo $action;?>" />
      <input name="id" type="hidden" id="id" value="<?php echo $id;?>" /></td>
      <td><input type="submit" name="Submit" value="Submit">        </td>
    </tr>
  </table>
</form>
<p><a class="smallbutton" href="ticket_list.php">Return </a></p>
</body>
</html>
