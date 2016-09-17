<?php
	include("auth.php");
	include("is_admin.php");
	$user = (($_POST["login"] == null) ? null : $_POST["login"]);
	$password = (($_POST["passwd"] == null) ? null : $_POST["passwd"]);
	session_start();
	if (auth($user, $password))
	{
		$_SESSION["logged_on_user"] = $user;
		$_SESSION["is_admin"] = is_admin($user);
		header("Location:index.php?error=0");
		return ;
	}
	else
	{
		$_SESSION["logged_on_user"] = "";
		$_SESSION["is_admin"] = false;
		echo "ERROR:UNKNOWN_USER\n";
		header("Location:index.php?error=2");
		return ;
	}
?>