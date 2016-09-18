<?php
	session_start();
	$_SESSION["cart"] = array();
	header("Location:show_cart.php");
?>