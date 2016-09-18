#!/usr/bin/php
<?php
	$users_path = "data/users";
	$admins_path = "data/admins";
	$categories_path = "data/categories";
	$products_path = "data/products";
	$orders_path = "data/orders";
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
		$categories[] = array("id" => trim(uniqid("CAT-")), "name" => "All");
		$categories[] = array("id" => trim(uniqid("CAT-")), "name" => "Malware");
		$categories[] = array("id" => trim(uniqid("CAT-")), "name" => "Botnets");
		$categories[] = array("id" => trim(uniqid("CAT-")), "name" => "Trojans");
		file_put_contents($categories_path, serialize($categories));
		$cat = array($categories[0]["id"], $categories[1]["id"]);
		$products[] = array("id" => trim(uniqid("PR-")), "name" => "Spammer", "desc" => "A basic spammer bot", "price" => "2.49", "categories" => $cat);
		$cat = array($categories[0]["id"], $categories[1]["id"]);
		$products[] = array("id" => trim(uniqid("PR-")), "name" => "Virus Template", "desc" => "A basic virus template", "price" => "10.42", "categories" => $cat);
		$cat = array($categories[0]["id"], $categories[1]["id"], $categories[3]["id"]);
		$products[] = array("id" => trim(uniqid("PR-")), "name" => "Basic Trojan", "desc" => "A basic trojan package to deploy malware of your choice", "price" => "15.99", "categories" => $cat);
		$cat = array($categories[0]["id"], $categories[1]["id"]);
		$products[] = array("id" => trim(uniqid("PR-")), "name" => "Worm", "desc" => "A basic worm for creating a backdoor", "price" => "16.49", "categories" => $cat);
		$cat = array($categories[0]["id"], $categories[3]["id"]);
		$products[] = array("id" => trim(uniqid("PR-")), "name" => "Rent a botnet", "desc" => "Rent a botnet for the day", "price" => "10.72", "categories" => $cat);
		file_put_contents($products_path, serialize($products));
		file_put_contents($orders_path, null);
	}
	else
		echo "Error, please remove 'data' directory\n";
?>