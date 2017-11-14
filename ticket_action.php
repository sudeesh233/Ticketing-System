<img href="home.html" src="https://16ady216etox4c1ny031s78y-wpengine.netdna-ssl.com/wp-content/uploads/2017/04/New-England-College.png" alt="Mountain View" style="width:500px;height:200px;">
<?php
session_start();
echo $_SESSION['secUser'];
include('security_staff.php');

?>
<html>
<head>
<link href="bossStyles.css" rel="stylesheet" type="text/css">
<title>Update Ticket</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
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
<body class="formText">

<p>&nbsp;</p>
<?php 


// include the connection streamm
include 'connect.php';

// here are the two hiddent fields
// they tell the script is this is an add, update or delete
// and for an update and delete, they pass the id
$action = $_REQUEST["action"];
$id = $_REQUEST["id"];
$title = $_REQUEST["title"];
$firstname = $_REQUEST["firstname"];
$lastname = $_REQUEST["lastname"];
$studentid = $_REQUEST["studentid"];;
$categoryID = $_REQUEST["categoryID"];;
$comment = $_REQUEST["comment"];
//$date = $_REQUEST["date"];
$status = $_REQUEST["status"];
$dt= date('Y-m-d H:i:s');
$_SESSION['XsecIDX'] = $secID;

// here I test the parm
// the action I take depends on if the parm is a(dd) or u(pdate)
if ($action == 'a') {
$query = "insert into ticket_tab values (
	null, 
	'$title',
	'$firstname', 
	'$lastname', 
	'$studentid',
	'$categoryID',
	'$comment', 
	'$dt', 
	'$status'
)";

mysqli_query($conn, $query) or
	die(mysqli_error());

print "<h3> A ticket has been created for $firstname <br>";
$query1 = "insert into ticket_log values (
	null,
	'$id', 
	'$title',
	'$firstname', 
	'$lastname', 
	'$studentid',
	'$categoryID',
	'$comment', 
	'$dt', 
	'$status',
	'$secUser'
)";
mysqli_query($conn, $query1) or
	die(mysqli_error());
}
if ($action == 'u') {
	$query = "update ticket_tab
		set title = '$title',
		firstname = '$firstname',
		lastname = '$lastname', 
		studentid = '$studentid',
		categoryID = '$categoryID',
		comment = '$comment', 
		status = '$status' 
		where ticketID = '$id'";
	mysqli_query($conn, $query) or
		die(mysqli_error());
	print "<h3>Update Successful for $firstname</h3>";
$query1 = "insert into ticket_log values (
	null,
	'$id', 
	'$title',
	'$firstname', 
	'$lastname', 
	'$studentid',
	'$categoryID',
	'$comment', 
	'$dt', 
	'$status',
	'$secUser'
)";
mysqli_query($conn, $query1) or
	die(mysqli_error());
} 
if ($action == 'd') {

// this is a delete
// so perform a delete query
		$query = "delete from ticket_tab
		where custNo = '$id'";
		mysqli_query($conn, $query)
			 or die("query failed:" . mysqli_error());
	print "<h3>Delete Successful</h3>";
} 
if ($action == 'w'){
	$query = "update ticket_tab
		set status = '$status' 
		where ticketID = '$id'";
	mysqli_query($conn, $query) or
		die(mysqli_error());
	print "<h3>Update Successful for $firstname and the ticket is $status </h3>";
	
}
/*if ($action == 'C'){
	$newbalance =  $balance + $amount;
	$query = "update custBank
		set balance = '$newbalance' 
		where custNo = '$id'";
	mysqli_query($conn, $query) or
		die(mysqli_error());
	print "<h3>Deposit of $amount successful</h3>";
	
}*/

?>

<p><a class="smallbutton" href="ticket_list.php">Return</a></p>
<p>&nbsp; </p>
</body>
</html>
