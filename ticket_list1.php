<html>
<head>
<title>List of Tickets</title>
<link href="bossStyles.css" rel="stylesheet" type="text/css">     
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style>
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
</head>

<body class="formText">

<h2 class="blackTop"> List of Tickets</h2>
<p><br>
  <table>
<a class="blackHead" href="ticket_update.php?action=a">Add a new Ticket</a>
 <br><br>
 <a class="blackHead" href="ticket_list.php">Return to normal view</a>
  <br>
  <br>
  </table>
<?php
$sort = $_GET['s'];

include 'connect.php';
if (s== date ){
$query = "select * from ticket_tab, categoryTab where categoryID = category_ID order by status, $sort DESC";
$result = mysqli_query($conn, $query);
$num = mysqli_num_rows($result); 
}
if (s== OPT ){
$query = "select * from ticket_tab, categoryTab where categoryID = category_ID and (meta_key = 'categoryName' AND meta_value = '$sort') ";
$result = mysqli_query($conn, $query);
$num = mysqli_num_rows($result); 
}
else {
	$query = "select * from ticket_tab, categoryTab where categoryID = category_ID order by $sort, status";
	$result = mysqli_query($conn, $query);
    $num = mysqli_num_rows($result); 
}
// Then simply sort according to that variable



//print '<tr>';
//print '<td><a href="ticket_list.php?s=ticketID">Ticket Number</a><td>';
//print '<td><a href="ticket_list.php?s=categoryName">Category</a><td>';
//print '<td><a href="ticket_list.php?s=date">Date</a><td>';
//print '<td><a href="ticket_list.php?s=status">Status</a><td>';
//print '</tr>';
print "<table>";
print "<tr><th><b>Ticket ID</b></th>";
print "<th><b>First Name</b></th>";
print "<th><b>Last Name</b></th>";
print "<th><b>Student ID</b></th>";
print "<th><b>Category</b></th>";
print "<th><b>Question</b></th>";
print "<th><b>Date</b></th>";
print "<th><b>Status</th></b></tr>";

while($row = mysqli_fetch_assoc($result)) {
	$ticketID = $row['ticketID'];
	$firstname = $row['firstname'];
	$lastname = $row['lastname'];
	$studentid = $row['studentid'];
	$categoryName = $row['categoryName'];
	$comment = $row['comment'];
	$date = $row['date'];
	$status = $row['status'];

	print "<tr>";
	print "<td>$ticketID</td>";
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
print "</table>";
?>
</p>

<br>



<br>
<br>
<a class="blackHead" href="ticket_list.php">Return </a>

</body>
</html>