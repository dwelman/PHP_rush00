<?php
	include("get_products.php");
	include("get_categories.php");
	$name = $_POST["name"];
	$desc = $_POST["desc"];
	$price = $_POST["price"];
	$submit = $_POST["submit"];
	if (($categories = get_categories()) === false || ($products = get_products()) === false)
	{
		echo "ERROR:FILE_NOT_EXISTS\n";
		header("Location:index.php?error=1");
		return ;
	}
	if ($submit == "OK" && $name != NULL && $desc != NULL & $price != NULL)
	{
		$products[] = array("id" => uniqid("PR-"), "name" => $name, "desc" => $desc, "price" => $price, "categories" => array($categories[0]["id"]));
		file_put_contents("data/products", serialize($products));
		echo "OK\n";
		header("Location:admin_prod.php?error=0");
		return ;
	}
	else
	{
		echo "ERROR:EMPTY_FIELD\n";
		header("Location:admin_prod.php?error=5");
		return ;
	}
?>