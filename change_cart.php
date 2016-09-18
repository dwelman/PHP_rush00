<?php
	session_start();
	if ($_POST["mode"] === "MODIFY")
		$_SESSION["cart"][$_POST["index"]]["quantity"] = $_POST["quantity"];
	else
		unset($_SESSION["cart"][$_POST["index"]]);
	echo "OK\n";
	header("Location:show_cart.php");
?>