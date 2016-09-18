<?php
	include("get_categories.php");
	$name = $_POST["name"];
	$submit = $_POST["submit"];
	if (($categories = get_categories()) == false)
	{
		echo "ERROR:FILE_NOT_EXISTS\n";
		header("Location:index.php?error=1");
		return ;
	}
	if ($submit == "OK" && $name != NULL)
	{
		$categories[] = array("id" => uniqid("CAT-"), "name" => $name);
		file_put_contents("data/categories", serialize($categories));
		echo "OK\n";
		header("Location:admin_cat.php?error=0");
		return ;
	}
	else
	{
		echo "ERROR:EMPTY_FIELD\n";
		header("Location:admin_cat.php?error=4");
		return ;
	}
?>