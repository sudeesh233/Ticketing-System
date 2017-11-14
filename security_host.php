<?php

if (empty($_SESSION['user'])) {
	header("location: sorry.html");
	exit();
} // emd if

if (($_SESSION['user']) != 'a')  {
	if (($_SESSION['user']) != 's')  {
		if (($_SESSION['user']) != 'h')  {
			header("location: sorry.html");
			exit();
		} // end h
	} // end s
} // end a

?>