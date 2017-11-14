<img href="home.html" src="https://16ady216etox4c1ny031s78y-wpengine.netdna-ssl.com/wp-content/uploads/2017/04/New-England-College.png" alt="Mountain View" style="width:500px;height:200px;">
<?php
session_start();

include('security_staff.php');

?>
<html>
<head>
<title>List of Tickets</title>
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


<p><br>
 

 <br>
  <br>
<?php
//$sort = $_GET['s'];
include 'connect.php';
// set scroll amount, get form values
$keyword = $_REQUEST["keyword"];
$scroll_amt = 10;
$pcode = $_REQUEST["pcode"];
$pstart = $_REQUEST["pstart"];
$pmax = $_REQUEST["pmax"];
	print "<h1>Search results for ' $keyword '</h1>";
// first time thru, get count, reset max
if ($pcode == null) {
	$query = "select count(*) from ticket_tab";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	$row = mysqli_fetch_array($result); 
	$pmax = $row['0'];
	$pstart = 0;
} // end if
$query="SELECT a.*, b.* FROM 
    ticket_tab a, categoryTab b
WHERE (
	a.categoryID = b.category_ID AND
    ( a.title LIKE '%$keyword%'
    OR a.firstname LIKE '%$keyword%'
    OR a.lastname LIKE '%$keyword%'
    OR a.comment LIKE '%$keyword%'
     OR a.status LIKE '%$keyword%')
     )"; 
/*$query = "select * from ticket_tab, categoryTab where categoryID = category_ID order by status, categoryName, date limit $pstart, $scroll_amt";*/
$result = mysqli_query($conn, $query);
$num = mysqli_num_rows($result); 

// Then simply sort according to that variable

/*
print "<table>";
print "<tr>";
print "<th><b>Order By: </b></th>";
print "<th><a href=ticket_list1.php?s=ticketID>Ticket Number</a><th>";
print "<th><a href=ticket_list1.php?s=categoryName>Category</a><th>";
print "<th><a href=ticket_list1.php?s=date>Date</a><th>";
print "<th><a href=ticket_list1.php?s=status>Status</a><th>";
print "<th><a href=ticket_list1.php?s=OPT>OPT</a><th>";

print "</tr>";
print "</table>"; */
print "<table>";
print "<tr><th><b>Ticket ID</b></th>";
print "<th><b>Title </b></th>";
print "<th><b>First Name</b></th>";
print "<th><b>Last Name</b></th>";
print "<th><b>Student ID</b></th>";
print "<th><b>Category </b></th>";

print "<th><b>Question</b></th>";
print "<th><b>Date</b></th>";
print "<th><b>Status</th></b></tr>";

while($row = mysqli_fetch_assoc($result)) {
	$ticketID = $row['ticketID'];
	$title = $row['title'];
	$firstname = $row['firstname'];
	$lastname = $row['lastname'];
	$studentid = $row['studentid'];
	$categoryName = $row['categoryName'];
	$comment = $row['comment'];
	$date = $row['date'];
	$status = $row['status'];

	print "<tr>";
	print "<td>$ticketID</td>";
	print "<td>$title</td>";
	print "<td>$firstname</td>";
	print "<td>$lastname</td>";
	print "<td>$studentid</td>";
	print "<td>$categoryName</td>";
	print "<td>$comment</td>";
    print "<td>$date</td>";
    print "<td><a  href=ticket_updatestatus.php?action=w&id=";
	print $ticketID;

	print ">$status</a></td>";



	print "<td><a  href=ticket_update.php?action=u&id=";
	print $ticketID;

	print ">Change Ticket</a></td>";
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
echo '<td align="left" class="scroll"><a href="ticket_list.php?pcode=b&pstart=' . $back . '&pmax=' . $pmax . '">&nbsp;&nbsp;&laquo;&laquo;Back</a></td>';
} // end it

// format forward button using forward amount as start
// only display if there are recs to display
if (($pstart + $scroll_amt) < $pmax) {
echo '<td align="right" class="scroll"><a href="ticket_list.php?pcode=f&pstart=' . $forward . '&pmax=' . $pmax . '">Next&raquo;&raquo;&nbsp;&nbsp;</a></td>';
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