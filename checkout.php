<?php
	include("get_orders.php");
	session_start();
	if (($orders = get_orders()) === "NOFILE")
	{
		echo "ERROR:FILE_NOT_EXISTS\n";
		header("Location:index.php?error=1");
		return ;
	}
	$order["id"] = uniqid("OR-");
	$order["customer"] = $_SESSION["logged_on_user"];
	foreach($_SESSION["cart"] as $item)
	{
		$items[] = $item["id"];	
	}
	$order["items"] = $items;
	$order["total"] = $_POST["total"];
	$orders[] = $order;
	file_put_contents("data/orders", serialize($orders));
	$_SESSION["cart"] = array();
	header("Location:success.php");
?>