<?php
	session_start();
	$_SESSION["logged_on_user"] = "";
	$_SESSION["is_admin"] = false;
	$_SESSION["cart"] = "";
	header("Location:index.php?logout=1");
?>