<img href="home.html" src="https://16ady216etox4c1ny031s78y-wpengine.netdna-ssl.com/wp-content/uploads/2017/04/New-England-College.png" alt="Mountain View" style="width:500px;height:200px;">
<?php
session_start();

include('security_admin.php');

?>
<html>
<head>
<title> Ticket Change Log</title>
<link href="bossStyles.css" rel="stylesheet" type="text/css">     
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style>
body {

    background: url("https://i.pinimg.com/originals/85/a8/f9/85a8f9cc7588af34301ff192c611cb67.jpg")no-repeat;
}
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
    text-align:center;
    padding: 18px;
}
             
                a:link {
    text-decoration: none;
}

a:visited {
    text-decoration: none;
}

a:hover {
    text-decoration: none;
}

a:active {
    text-decoration: none;
}
               }
   
</style>
<style>
.button {
    background-color: #008CBA;
    border: none;
    color: white;
    padding: 20px 40px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 18px;
    margin: 6px 3px;
    cursor: pointer;
}
</style>
</head>

<body class="formText">

<h2 class="blackTop"> Ticket Change Log</h2>
<p><br>
  

 <br>
  <br>
<?php
//$sort = $_GET['s'];
include 'connect.php';
// set scroll amount, get form values

$scroll_amt = 10;
$pcode = $_REQUEST["pcode"];
$pstart = $_REQUEST["pstart"];
$pmax = $_REQUEST["pmax"];

// first time thru, get count, reset max
if ($pcode == null) {
	$query = "select count(*) from ticket_log";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	$row = mysqli_fetch_array($result); 
	$pmax = $row['0'];
	$pstart = 0;
} // end if
$query = "select * from ticket_log, categoryTab where categoryID = category_ID order by logID limit $pstart, $scroll_amt";
$result = mysqli_query($conn, $query);
$num = mysqli_num_rows($result); 

// Then simply sort according to that variable



print "<table>";
print "<tr><th><b>Log ID</b></th>";
print "<th><b>Ticket ID</b></th>";
print "<th><b>Title </b></th>";
print "<th><b>First Name</b></th>";
print "<th><b>Last Name</b></th>";
print "<th><b>Student ID</b></th>";

print "<th><b>Category</b></th>";
print "<th><b>Question</b></th>";
print "<th><b>Date</b></th>";
print "<th><b>Status</b></th>";
print "<th><b>User ID</th></b></tr>";

while($row = mysqli_fetch_assoc($result)) {
	$logID=$row['logID'];
	$ticketID = $row['ticketID'];
	$title = $row['title'];
	$firstname = $row['firstname'];
	$lastname = $row['lastname'];
	$studentid = $row['studentid'];
	$categoryName = $row['categoryName'];
	$comment = $row['comment'];
	$changedate = $row['changedate'];
	$status = $row['status'];
	$secUser = $row['secUser'];

	print "<tr>";
	print "<td>$logID</td>";
	print "<td>$ticketID</td>";
	print "<td>$title</td>";
	print "<td>$firstname</td>";
	print "<td>$lastname</td>";
	print "<td>$studentid</td>";
	print "<td>$categoryName</td>";
	print "<td>$comment</td>";
    print "<td>$changedate</td>";
    print "<td>$status</td>";
     print "<td>$secUser</td>";
    
//	print "<td><a href=ticket_action5.php?action=d&id=";
//	print $ticketID;
//	print "> Delete </a></td>";	
	print "</tr>";
}
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
echo '<td align="left" class="scroll"><a href="log_list.php?pcode=b&pstart=' . $back . '&pmax=' . $pmax . '">&nbsp;&nbsp;&laquo;&laquo;Back</a></td>';
} // end it

// format forward button using forward amount as start
// only display if there are recs to display
if (($pstart + $scroll_amt) < $pmax) {
echo '<td align="right" class="scroll"><a href="log_list.php?pcode=f&pstart=' . $forward . '&pmax=' . $pmax . '">Next&raquo;&raquo;&nbsp;&nbsp;</a></td>';
} // end it

?>



</table>

</p>

<br>



<br>
<br>


</body>
<a class="button" href="home.php">Return </a>
</html>