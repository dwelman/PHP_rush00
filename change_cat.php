<?php
	$mode = $_POST["mode"];
	$path = "data/categories";
	$to_change = $_POST["to_change"];
	$id = $_POST["id"];
	include("get_categories.php");
	$categories = get_categories();
	if ($mode === "DEL")
	{
		foreach ($categories as $key => $field)
		{
			if ($field["id"] === $id)
			{
				unset($categories[$key]);
				file_put_contents($path, serialize($categories));
				echo "OK\n";
				header("Location:admin.php?error=0");
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
				header("Location:admin.php?error=0");
				return ;
			}
		}
	}
	else
	{
		echo "ERROR:BLANK_FIELD\n";
		header("Location:admin.php?error=4");
	}
?>