<?php

session_start();

include('security_staff.php');

$location ="security_input.php?action=u&id=" . $_SESSION['XsecIDX']; 

header("location:" . $location);

?> 