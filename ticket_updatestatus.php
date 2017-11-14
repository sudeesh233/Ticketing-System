
<?php 


// include the connection streamm
include 'connect.php';

$action = $_REQUEST["action"];
if ($action == 'a') {
	$status = null;
 } else {
	$id = $_REQUEST["id"];
	 	$query = "select * from ticket_tab where ticketID = $id";
		$result = mysqli_query($conn, $query)
			or die(mysqli_error());
		$row = mysqli_fetch_assoc($result);
		$status = $row['status'];
		
} // end if

?>
<html>

<body class="blackForm">
<h1>Ticket Status </h1>
<h2><?php echo $status; ?></h2>
<form action="ticket_action.php" method="get" name="form1" >

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
        
      </p></td>
    </tr>	
    <tr> 
      <td><input name="action" type="hidden" id="action" value="<?php echo $action;?>" />
        <input name="id" type="hidden" id="id" value="<?php echo $id;?>" /></td>
      <td><input type="submit" name="Submit" value="Submit"></td>
    </tr>
    </form>
</body>
</html>