<?php
	session_start();
	$array = $_SESSION["cart"];
	$new_item = true;
	for ($i = 0; $i < count($array); $i++)
	{
		if ($array[$i]["id"] === $_POST["id"])
		{
			$array[$i]["quantity"] += $_POST["quantity"];
			$new_item = false;
			break;
		}
	}
	if ($new_item == true)
	{
		$new = array("id" => $_POST["id"], "name" => $_POST["name"], "desc" => $_POST["desc"], "price" => $_POST["price"], "quantity" =>  $_POST["quantity"]);
		$array[] = $new;
	}
	$_SESSION["cart"] = $array;
	header("Location:load_prod.php?success=1");
	return ;
?>