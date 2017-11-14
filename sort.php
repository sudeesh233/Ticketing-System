<?php
include 'connect.php';
$query = "select * from ticket_tab, categoryTab where categoryID = category_ID";

if ($_GET['sort'] == 'categoryName')
{
    $sql .= " ORDER BY Category";
}
elseif ($_GET['sort'] == 'status')
{
    $sql .= " ORDER BY Status";
}
elseif ($_GET['sort'] == 'ticketID')
{
    $sql .= " ORDER BY Ticket Number";
}
elseif($_GET['sort'] == 'date')
{
    $sql .= " ORDER BY DateAdded";
}

?>