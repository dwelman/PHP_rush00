<?php
	session_start();
	$_SESSION["active_cat"] = $_POST["id"];
	header("Location:load_prod.php?success=0");
	return ;
?>