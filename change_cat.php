<?php
	$mode = $_POST["mode"];
	$path = "data/categories";
	$to_change = $_POST["to_change"];
	$id = $_POST["id"];
	include("get_categories.php");
	include("get_products.php");
	$categories = get_categories();
	$products = get_products();
	if ($products == false || $categories == false)
	{
		echo "ERROR:FILE_NOT_EXISTS\n";
		header("Location:index.php?error=1");
		return ;
	}
	if ($mode === "DEL")
	{
		foreach ($categories as $key => $field)
		{
			if ($field["id"] === $id)
			{
				foreach ($products as $a_key => $a_field)
				{
					for ($i = 0; $i < count($categories); $i++)
					{
						if ($a_field["categories"][$i] === $id)
						{
							unset($products[$a_key]["categories"][$i]);
						}
					}
					$products = array_values($products);
					file_put_contents("data/products", serialize($products));
				}
				unset($categories[$key]);
				file_put_contents($path, serialize($categories));
				echo "OK\n";
				header("Location:admin_cat.php?error=0");
				return ;
			}
		}
	}
	else if ($mode === "MOD" && $to_change != NULL)
	{
		foreach ($categories as $key => $field)
		{
			if ($field["id"] === $id)
			{
				$categories[$key]["name"] = $to_change;
				file_put_contents($path, serialize($categories));
				echo "OK\n";
				header("Location:admin_cat.php?error=0");
				return ;
			}
		}
	}
	else
	{
		echo "ERROR:BLANK_FIELD\n";
		header("Location:admin_cat.php?error=4");
	}
?>