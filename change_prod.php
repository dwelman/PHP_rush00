<?php
	$mode = $_POST["mode"];
	$path = "data/products";
	$name = $_POST["name"];
	$desc = $_POST["desc"];
	$price = $_POST["price"];
	$categories = $_POST["categories"];
	$id = $_POST["id"];
	$rm_id = $_POST["remove"];
	$add_id = $_POST["add"];
	include("get_products.php");
	include("get_categories.php");
	$products = get_products();
	$all_cats = get_categories();
	session_start();
	if ($products == false || $all_cats == false)
	{
		echo "ERROR:FILE_NOT_EXISTS\n";
		header("Location:index.php?error=1");
		return ;
	}
	if ($mode === "DEL")
	{
		foreach ($products as $key => $field)
		{
			if ($field["id"] === $id)
			{
				unset($products[$key]);
				file_put_contents($path, serialize($products));
				echo "OK\n";
				header("Location:admin_prod.php?error=0");
				return ;
			}
		}
	}
	else if ($mode === "MOD" && $name != NULL && $desc != null && $price != null && $categories != NULL)
	{
		foreach ($products as $key => $field)
		{
			if ($field["id"] === $id)
			{
				$products[$key]["name"] = $name;
				$products[$key]["desc"] = $desc;
				$products[$key]["price"] = $price;
				file_put_contents($path, serialize($products));
				echo "OK\n";
				header("Location:admin_prod.php?error=0");
				return ;
			}
		}
	}
	else if ($mode == "RMV" && $rm_id != NULL)
	{
		if ($rm_id === $_SESSION["all_id"])
		{
			echo "ERROR:CANNOT_REMOVE_FROM_ALL\n";
			header("Location:admin_prod.php?error=8");
			return ;
		}
		foreach ($products as $key => $field)
		{
			if ($field["id"] === $id)
			{
				for ($i = 0; $i < count($field["categories"]); $i++)
				{
					if ($field["categories"][$i] === $rm_id)
					{
						unset($products[$key]["categories"][$i]);
					}
				}
				file_put_contents($path, serialize($products));
				echo "OK\n";
				header("Location:admin_prod.php?error=0");
				return ;
			}
		}
	}
	else if ($mode == "ADD" && $add_id != NULL)
	{
		$valid = false;
		foreach ($all_cats as $cats)
		{
			if ($cats["id"] === $add_id)
				$valid = true;
		}
		if ($valid == false)
		{
			echo "ERROR:INVALID_CATEGORY\n";
			header("Location:admin_prod.php?error=7");
			return ;
		}
		foreach ($products as $key => $field)
		{
			if ($field["id"] === $id)
			{
				for ($i = 0; $i < count($field["categories"]); $i++)
				{
					if ($field["categories"][$i] === $add_id)
					{
						echo "ERROR:DUPLICATE_ID\n";
						header("Location:admin_prod.php?error=6");
						return ;
					}
				}
				$products[$key]["categories"][] = $add_id;
				file_put_contents($path, serialize($products));
				echo "OK\n";
				header("Location:admin_prod.php?error=0");
				return ;
			}
		}
	}
	else
	{
		echo "ERROR:BLANK_FIELD\n";
		header("Location:admin_prod.php?error=5");
	}
?>