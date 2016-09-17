<?php
	$login = $_POST["login"];
	$password = $_POST["passwd"];
	$admin = ($_POST["admin"]);
	$status = $_POST["submit"];
	$user_path = "data/users";
	$admin_path = "data/admins";

	if ($status == "OK" && $login != null && $password != null)
	{
		if (file_exists($user_path) && file_exists($admin_path))
		{
			$users = unserialize(file_get_contents($user_path));
			$admins = unserialize(file_get_contents($admin_path));
			foreach ($users as $field)
			{
				if ($field["login"] == $login)
				{
					echo "ERROR:USER_EXISTS\n";
					header("Location:user_create.php?error=1");
					return ;
				}
			}
			foreach ($admins as $field)
			{
				if ($field["login"] == $login)
				{
					echo "ERROR:ADMIN_EXISTS\n";
					header("Location:user_create.php?error=1");
					return ;
				}
			}
		}
		else
		{
			echo "ERROR:FILE_NOT_EXISTS\n";
			header("Location:index.php?error=1");
			return ;
		}
		$hash = hash("whirlpool", $password);
		if ($admin === "true")
		{
			$admins[] = array("login" => $login, "passwd" => $hash);
			file_put_contents($admin_path, serialize($admins));
			echo "ADMIN_CREATED\n";
		}
		else
		{
			$users[] = array("login" => $login, "passwd" => $hash);
			file_put_contents($user_path, serialize($users));
			echo "USER_CREATED\n";
		}
	}
	else
	{
		echo "ERROR:FIELDS_EMPTY\n";
		header("Location:user_create.php?error=2");
		return ;
	}
	echo "OK\n";
	header("Location:index.php");
?>