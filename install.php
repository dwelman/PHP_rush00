#!/usr/bin/php
<?php
	$users_path = "data/users";
	$admins_path = "data/admins";
	$categories_path = "data/categories";
	$products_path = "data/products";
	$dir = "data";
	$admins = array();
	$categories = array();
	$products = array();

	if (!file_exists($dir))
	{
		mkdir($dir, 0777, true);
		$admins[] = array("login" => "daviwel", "passwd" => hash("whirlpool", "daviwel"));
		$admins[] = array("login" => "thumavu", "passwd" => hash("whirlpool", "thumavu"));
		file_put_contents($admins_path, serialize($admins));
		file_put_contents($users_path, null);
		$categories[] = array("id" => trim(uniqid("CAT-")), "name" => "Food");
		$categories[] = array("id" => trim(uniqid("CAT-")), "name" => "Furniture");
		$categories[] = array("id" => trim(uniqid("CAT-")), "name" => "Electronics");
		file_put_contents($categories_path, serialize($categories));
		$cat = array($categories[0]["id"]);
		$products[] = array("id" => trim(uniqid("PR-")), "name" => "Apples", "desc" => "They're apples bro", "price" => "14.99", "categories" => $cat);
		file_put_contents($products_path, serialize($products));
	}
	else
		echo "Error, please remove 'data' directory\n";
?>